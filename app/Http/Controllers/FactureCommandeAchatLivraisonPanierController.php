<?php

namespace App\Http\Controllers;

use App\Models\FactureCommandeAchatLivraisonPanier;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureCommandeAchatLivraisonPanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $facture_commande_achat_livraison = FactureCommandeAchatLivraisonPanier::all();

        return view('admin_page.gestion_facture.facture_commande_achat_livraison.consulter_facture', compact('facture_commande_achat_livraison'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $facture = new FactureCommandeAchatLivraisonPanier();

        $facture->livraison_panier_id  = $request->achat_livraison_id;

        $facture->save();

        return back()->with('success','Facture créée avec succès.');
    }

    public function generer(Request $request){

        $facture = FactureCommandeAchatLivraisonPanier::find($request->facture_id);

        $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_achat_livraison.generer_facture', compact('facture'));

        return $pdf->download('facture_#CALP'. $facture->id .'.pdf');
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
    public function show(FactureCommandeAchatLivraisonPanier $factureCommandeAchatLivraisonPanier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureCommandeAchatLivraisonPanier $factureCommandeAchatLivraisonPanier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactureCommandeAchatLivraisonPanier $factureCommandeAchatLivraisonPanier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureCommandeAchatLivraisonPanier $factureCommandeAchatLivraisonPanier)
    {
        //
    }
}
