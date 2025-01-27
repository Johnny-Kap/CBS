<?php

namespace App\Http\Controllers;

use App\Models\FactureCommandeAchatLivraisonPanier;
use App\Models\FactureCommandeLivraisonPanier;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureCommandeLivraisonPanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $facture_commande_livraison = FactureCommandeLivraisonPanier::all();

        return view('admin_page.gestion_facture.facture_commande_livraison.consulter_facture', compact('facture_commande_livraison'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $facture = new FactureCommandeLivraisonPanier();

        $facture->livraison_panier_id = $request->livraison_id;

        $facture->save();

        return back()->with('success', 'Facture créée avec succès.');
    }

    public function generer(Request $request)
    {

        $facture = FactureCommandeLivraisonPanier::find($request->facture_id);

        if ($facture->livraisons->users->type_user == 'particulier') {
            $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_livraison.generer_facture_particulier', compact('facture'));

            return $pdf->download('facture_#CLP' . $facture->id . '.pdf');
        }else{
            $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_livraison.generer_facture_entreprise', compact('facture'));

            return $pdf->download('facture_#CLP' . $facture->id . '.pdf');
        }
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
    public function show(FactureCommandeLivraisonPanier $factureCommandeLivraisonPanier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureCommandeLivraisonPanier $factureCommandeLivraisonPanier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactureCommandeLivraisonPanier $factureCommandeLivraisonPanier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureCommandeLivraisonPanier $factureCommandeLivraisonPanier)
    {
        //
    }
}
