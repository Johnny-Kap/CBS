<?php

namespace App\Http\Controllers;

use App\Mail\SuccessExpressionBesoinFormation;
use App\Mail\ValidationExpressionBesoinFormation;
use App\Mail\ValidationPaiementExpressionBesoinFormation;
use App\Models\ExpressionBesoinFormation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Expr\FuncCall;

class ExpressionBesoinFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $expression_besoin_attente = ExpressionBesoinFormation::where('etat_commande', 'attente')->simplePaginate(15);

        return view('admin_page.gestion_expression_besoin_formation.attente_validation', compact('expression_besoin_attente'));
    }

    public function validation_commande(Request $request)
    {

        if ($request->etat == 'yes') {
            $affected = ExpressionBesoinFormation::where('id', $request->expression_id)
                ->update([
                    'etat_commande' => $request->etat,
                    'montant' => $request->montant
                ]);

            $validation_expression_besoin = ExpressionBesoinFormation::find($request->expression_id);

            Mail::to($validation_expression_besoin->users->email)->send(new ValidationExpressionBesoinFormation($validation_expression_besoin));

            return back()->with('success', 'Validé avec succès. Email de notification envoyé au client.');
        } else {
            $affected = ExpressionBesoinFormation::where('id', $request->expression_id)
                ->update([
                    'etat_commande' => $request->etat,
                ]);

            return back()->with('success', 'Mise en attente avec succès.');
        }
    }

    public function soumission_paiement_expression_besoin(Request $request)
    {

        if ($request->has('file')) {

            $request->validate([
                'file' => 'required|mimes:jpeg,png,jpg',
            ]);

            $filename = time() . '.' . $request->file->extension();

            $path = $request->file('file')->storeAs('images', $filename, 'public');

            $affected = ExpressionBesoinFormation::where('id', $request->expression_id)
                ->update([
                    'photo_paiement' => $path,
                    'mode_paiement_id' => $request->mode_paiement,
                ]);

            return back()->with('success', 'Preuve de paiement soumis avec succès! Vous serez contacté après validation.');
        } else {
            return back()->with('error', 'Veuillez ajouté votre capture d\'écran.');
        }
    }

    public function paiement_non_soumis()
    {

        $paiement_non_soumis = ExpressionBesoinFormation::where('etat_commande', 'yes')
            ->where('photo_paiement', null)
            ->simplePaginate(15);

        return view('admin_page.gestion_expression_besoin_formation.paiement_non_soumis', compact('paiement_non_soumis'));
    }

    public function validation_paiement()
    {

        $expression_besoin_validation_paiement = ExpressionBesoinFormation::where('etat_commande', 'yes')
            ->where('etat_paiement', 'no')
            ->whereNotNull('photo_paiement')->simplePaginate(15);

        return view('admin_page.gestion_expression_besoin_formation.validation_paiement', compact('expression_besoin_validation_paiement'));
    }

    public function paiement_valide(Request $request)
    {

        if ($request->etat == 'yes') {
            $affected = ExpressionBesoinFormation::where('id', $request->expression_id)
                ->update([
                    'etat_paiement' => $request->etat,
                ]);

            $validation_paiement_expression_besoin = ExpressionBesoinFormation::find($request->expression_id);

            Mail::to($validation_paiement_expression_besoin->users->email)->send(new ValidationPaiementExpressionBesoinFormation($validation_paiement_expression_besoin));

            return back()->with('success', 'Paiement validé avec succès. Email de notification envoyé au client.');
        } else {
            $affected = ExpressionBesoinFormation::where('id', $request->expression_id)
                ->update([
                    'etat_paiement' => $request->etat,
                ]);

            return back()->with('success', 'Commande non payée.');
        }
    }

    public function commande_confirmees()
    {

        $expression_besoin_confirmees = ExpressionBesoinFormation::where('etat_commande', 'yes')
            ->where('etat_paiement', 'yes')
            ->whereNotNull('photo_paiement')->simplePaginate(15);

        return view('admin_page.gestion_expression_besoin_formation.expression_besoin_confirmees', compact('expression_besoin_confirmees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('formation.formulaire_expression_besoin_formation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $numero_commande = 'EBF' . Carbon::now()->format('YmdHms');

        $expression_create = ExpressionBesoinFormation::create([
            'numero_commande' => $numero_commande,
            'theme' => $request->theme,
            'categorie' => $request->categorie,
            'description' => $request->description,
            'duree' => $request->duree,
            'date_formation' => $request->date_formation,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'nb_place' => $request->nb_place,
            'lieu' => $request->lieu,
            'type_cours' => $request->type_cours,
            'etat_commande' => 'attente',
            'etat_paiement' => 'no',
            'nom_formateur' => $request->nom_formateur,
            'prenom_formateur' => $request->prenom_formateur,
            'tel_formateur' => $request->tel_formateur,
            'email_formateur' => $request->email_formateur,
            'user_id' => Auth::user()->id,
        ]);

        $expression_besoin = ExpressionBesoinFormation::where('numero_commande', $numero_commande)->first();

        Mail::to(Auth::user()->email)->send(new SuccessExpressionBesoinFormation($expression_besoin));

        return redirect()->route('success.besoin.formation');
    }

    public function success()
    {

        return view('formation.success_expression_besoin_formation');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpressionBesoinFormation $expressionBesoinFormation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpressionBesoinFormation $expressionBesoinFormation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpressionBesoinFormation $expressionBesoinFormation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpressionBesoinFormation $expressionBesoinFormation)
    {
        //
    }
}
