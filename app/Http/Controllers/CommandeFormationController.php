<?php

namespace App\Http\Controllers;

use App\Mail\SuccessCommandeFormation;
use App\Mail\ValidationPaiementCommandeFormation;
use App\Models\CommandeFormation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommandeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg',
        ]);

        $filename = time() . '.' . $request->file->extension();

        $path = $request->file('file')->storeAs('images', $filename, 'public');

        $numero_commande = 'CF' . Carbon::now()->format('YmdHms');

        $add = new CommandeFormation();

        $add->numero_commande = $numero_commande;

        $add->montant_total = $request->montant_total;

        $add->nb_place_commande = $request->nb_place_commande;

        $add->etat_commande = 'yes';

        $add->etat_paiement = 'no';

        $add->photo = $path;

        $add->type_cours = $request->type_cours;

        $add->mode_paiement_id = $request->mode_paiement_id;

        $add->formation_id = $request->formation_id;

        $add->user_id = Auth::user()->id;

        $add->save();

        $commande_formation = CommandeFormation::where('numero_commande', $numero_commande)->first();

        Mail::to(Auth::user()->email)->send(new SuccessCommandeFormation($commande_formation));

        return redirect()->route('success.formation');
    }

    public function success()
    {

        return view('formation.success_commande_formation');
    }

    public function validation_paiement(Request $request)
    {

        $commande_validation_paiement = CommandeFormation::where('etat_commande', 'yes')
            ->where('etat_paiement', 'no')
            ->whereNotNull('photo')->simplePaginate(15);

        return view('admin_page.gestion_commande_formation.validation_paiement', compact('commande_validation_paiement'));
    }

    public function paiement_valide(Request $request)
    {

        if ($request->etat == 'yes') {
            $affected = CommandeFormation::where('id', $request->commande_id)
                ->update([
                    'etat_paiement' => $request->etat,
                ]);

            $commande_validation_paiement = CommandeFormation::find($request->commande_id);

            Mail::to($commande_validation_paiement->users->email)->send(new ValidationPaiementCommandeFormation($commande_validation_paiement));

            return back()->with('success', 'Paiement validé avec succès. Email de notification envoyé au client.');
        } else {
            $affected = CommandeFormation::where('id', $request->commande_id)
                ->update([
                    'etat_paiement' => $request->etat,
                ]);

            return back()->with('success', 'Paiement non validé avec succès');
        }
    }

    public function commande_confirmees()
    {

        $commande_confirmees = CommandeFormation::where('etat_commande', 'yes')
            ->where('etat_paiement', 'yes')
            ->whereNotNull('photo')->simplePaginate(15);

        return view('admin_page.gestion_commande_formation.commande_confirmees', compact('commande_confirmees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CommandeFormation $commandeFormation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeFormation $commandeFormation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeFormation $commandeFormation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeFormation $commandeFormation)
    {
        //
    }
}
