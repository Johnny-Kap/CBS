<?php

namespace App\Http\Controllers;

use App\Mail\AnnulationPaiementAbonnement;
use App\Mail\SuccessSouscriptionAbonnement;
use App\Mail\ValidationPaiementAbonnement;
use App\Models\Abonnement;
use App\Models\ModePaiement;
use App\Models\SouscrireAbonnement;
use App\Models\TypeAbonnement;
use App\Models\TypeVehicule;
use Carbon\Carbon;
use Hamcrest\Core\IsNot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $abonnements = Abonnement::where('masked', 'no')->get();

        return view('abonnements.pricing', compact('abonnements'));
    }

    public function SouscrireConfirm(Request $request)
    {

        $abonnement = Abonnement::find($request->abonnement_id);

        $mode_paiements = ModePaiement::all();

        $verify = SouscrireAbonnement::where('abonnement_id', $request->abonnement_id)
            ->where('date_expiration', '>', Carbon::now()->format('d-m-Y'))
            ->where('user_id', Auth::user()->id)
            ->exists();

        if ($verify == false) {

            return view('abonnements.abonnement_booking', compact('abonnement', 'mode_paiements'));
        } else {
            return back()->with('warning', 'Vous avez déja souscrit à cet abonnement étant toujours valable');
        }
    }

    public function souscrire(Request $request)
    {

        $filename = time() . '.' . $request->file->extension();

        $path = $request->file('file')->storeAs('images', $filename, 'public');

        $abonnement = Abonnement::find($request->abonnement_id);

        $numero_abonnement = $abonnement->code . Carbon::now()->format('dmYHms');

        //Enregistrement

        $add = new SouscrireAbonnement();

        $add->numero_abonnement = $numero_abonnement;

        $add->etat = 'yes';

        $add->date_expiration = Carbon::now()->addMonth()->format('d-m-Y');

        $add->is_expired = 'no';

        $add->is_buy = 'no';

        $add->montant = $abonnement->montant;

        $add->image = $path;

        $add->abonnement_id = $request->abonnement_id;

        $add->mode_paiement_id = $request->mode_paiement_id;

        $add->user_id = Auth::user()->id;

        $add->save();

        $souscription_abonnement = SouscrireAbonnement::where('numero_abonnement', $numero_abonnement)->first();

        Mail::to(Auth::user()->email)->send(new SuccessSouscriptionAbonnement($souscription_abonnement));

        return redirect()->route('success.abonnement');
    }

    public function success()
    {
        return view('abonnements.success_abonnement');
    }

    public function confirmation_abonnement()
    {

        $abonnement_souscrits = SouscrireAbonnement::where('etat', 'yes')
            ->where('image', null)
            ->where('is_buy', 'no')
            ->simplePaginate(15);

        return view('profile.confirmation_abonnement', compact('abonnement_souscrits'));
    }

    public function soumission_paiement(Request $request)
    {

        if ($request->has('file')) {

            $filename = time() . '.' . $request->file->extension();

            $path = $request->file('file')->storeAs('images', $filename, 'public');

            $affected = SouscrireAbonnement::where('id', $request->souscription_abonnement_id)
                ->update([
                    'image' => $path,
                ]);

            return back()->with('success', 'Preuve de paiement soumis avec succès! Vous serez contacté après validation.');
        } else {
            return back()->with('error', 'Veuillez ajouté votre capture d\'écran.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $type_abonnements = TypeAbonnement::all();

        return view('admin_page.gestion_abonnement.ajouter_abonnement', compact('type_abonnements'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = new Abonnement();

        $add->intitule = $request->intitule;

        $add->code = $request->code;

        $add->montant = $request->montant;

        $add->rabais = $request->rabais;

        $add->nombre_livraison_panier = $request->nombre_livraison_panier;

        $add->packages = $request->packages;

        $add->masked = 'no';

        $add->type_abonnement_id = $request->type_abonnement_id;

        $add->save();

        return back()->with('success', 'Ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $abonnements = Abonnement::all();

        $type_abonnement = TypeAbonnement::all();

        return view('admin_page.gestion_abonnement.consulter_abonnement', compact('abonnements', 'type_abonnement'));
    }

    public function attente()
    {

        $abonnement_attente = SouscrireAbonnement::where('etat', 'yes')->where('is_buy', 'no')
            ->whereNotNull('image')->get();

        return view('admin_page.gestion_abonnement.attente_abonnement', compact('abonnement_attente'));
    }

    public function attente_paiement()
    {

        $abonnement_paiement_attente = SouscrireAbonnement::where('etat', 'yes')->where('is_buy', 'no')
            ->where('image', null)->get();

        return view('admin_page.gestion_abonnement.attente_paiement_abonnement', compact('abonnement_paiement_attente'));
    }

    public function confirmer_souscription(Request $request)
    {

        if ($request->is_buy == 'no') {
            $affected = SouscrireAbonnement::where('id', $request->souscrire_abonnement_id)
                ->update([
                    'is_buy' => $request->is_buy,
                ]);

            $paiement_abonnement_annule = SouscrireAbonnement::find($request->souscrire_abonnement_id);

            Mail::to($paiement_abonnement_annule->users->email)->send(new AnnulationPaiementAbonnement($paiement_abonnement_annule));

            return back()->with('success', 'Paiement non validé. De nouveau à Paiement non soumis. Email envoyé au client.');
        } else {

            $affected = SouscrireAbonnement::where('id', $request->souscrire_abonnement_id)
                ->update([
                    'is_buy' => $request->is_buy,
                ]);

            $validation_paiement_abo = SouscrireAbonnement::find($request->souscrire_abonnement_id);

            Mail::to($validation_paiement_abo->users->email)->send(new ValidationPaiementAbonnement($validation_paiement_abo));

            return back()->with('success', 'Paiement validé avec succès. Email de notification envoyé au client');
        }
    }

    public function confirmes()
    {

        $abonnement_confirmee = SouscrireAbonnement::where('etat', 'yes')
            ->where('is_buy', 'yes')
            ->get();

        return view('admin_page.gestion_abonnement.confirmes_abonnement', compact('abonnement_confirmee'));
    }

    public function expires()
    {

        $abonnement_expires = SouscrireAbonnement::where('is_expired', 'yes')->get();

        return view('admin_page.gestion_abonnement.expires_abonnement', compact('abonnement_expires'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $affected = Abonnement::where('id', $request->abonnement_id)
            ->update([
                'intitule' => $request->intitule,
                'code' => $request->code,
                'montant' => $request->montant,
                'rabais' => $request->rabais,
                'nombre_livraison_panier' => $request->nombre_livraison_panier,
                'packages' => $request->packages,
                'type_abonnement_id' => $request->type_abonnement_id,
            ]);

        return back()->with('success', 'Modifié avec succès.');
    }

    public function masked(Request $request)
    {

        $affected = Abonnement::where('id', $request->abonnement_id)
            ->update([
                'masked' => 'yes',
            ]);

        return back()->with('success', 'Masqué avec succès.');
    }

    public function demasked(Request $request)
    {

        $affected = Abonnement::where('id', $request->abonnement_id)
            ->update([
                'masked' => 'no',
            ]);

        return back()->with('success', 'Démasqué avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Abonnement $abonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Abonnement $abonnement)
    {
        //
    }
}
