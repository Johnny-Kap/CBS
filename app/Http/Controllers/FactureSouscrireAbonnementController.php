<?php

namespace App\Http\Controllers;

use App\Models\FactureSouscrireAbonnement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureSouscrireAbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $facture_souscription_abonnement = FactureSouscrireAbonnement::all();

        return view('admin_page.gestion_facture.facture_souscription_abonnement.consulter_facture', compact('facture_souscription_abonnement'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $facture = new FactureSouscrireAbonnement();

        $facture->souscrire_abonnement_id = $request->sous_abonnement_id;

        $facture->save();

        return back()->with('success','Facture créée avec succès.');
    }

    public function generer(Request $request){

        $facture = FactureSouscrireAbonnement::find($request->facture_id);

        $pdf = Pdf::loadView('admin_page.gestion_facture.facture_souscription_abonnement.generer_facture', compact('facture'));

        return $pdf->download('facture_#SA'. $facture->id .'.pdf');
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
    public function show(FactureSouscrireAbonnement $factureSouscrireAbonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureSouscrireAbonnement $factureSouscrireAbonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactureSouscrireAbonnement $factureSouscrireAbonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureSouscrireAbonnement $factureSouscrireAbonnement)
    {
        //
    }
}
