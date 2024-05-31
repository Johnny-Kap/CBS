<?php

namespace App\Http\Controllers;

use App\Models\FactureCommandeExpressionBesoinFormation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureCommandeExpressionBesoinFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $facture_expression_besoin_formation = FactureCommandeExpressionBesoinFormation::all();

        return view('admin_page.gestion_facture.facture_expression_besoin_formation.consulter_facture', compact('facture_expression_besoin_formation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $facture = new FactureCommandeExpressionBesoinFormation();

        $facture->expression_besoin_formation_id  = $request->expression_id;

        $facture->save();

        return back()->with('success','Facture créée avec succès.');
    }

    public function generer(Request $request){

        $facture = FactureCommandeExpressionBesoinFormation::find($request->facture_id);

        $pdf = Pdf::loadView('admin_page.gestion_facture.facture_expression_besoin_formation.generer_facture', compact('facture'));

        return $pdf->download('facture_#CEBF'. $facture->id .'.pdf');
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
    public function show(FactureCommandeExpressionBesoinFormation $factureCommandeExpressionBesoinFormation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureCommandeExpressionBesoinFormation $factureCommandeExpressionBesoinFormation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactureCommandeExpressionBesoinFormation $factureCommandeExpressionBesoinFormation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureCommandeExpressionBesoinFormation $factureCommandeExpressionBesoinFormation)
    {
        //
    }
}
