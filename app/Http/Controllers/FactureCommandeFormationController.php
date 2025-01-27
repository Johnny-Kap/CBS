<?php

namespace App\Http\Controllers;

use App\Models\FactureCommandeFormation;
use App\Models\FactureCommandeLocation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureCommandeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $facture_commande_formation = FactureCommandeFormation::all();

        return view('admin_page.gestion_facture.facture_commande_formation.consulter_facture', compact('facture_commande_formation'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $facture = new FactureCommandeFormation();

        $facture->commande_formation_id  = $request->formation_id;

        $facture->save();

        return back()->with('success', 'Facture créé avec succès.');
    }

    public function generer(Request $request)
    {

        $facture = FactureCommandeFormation::find($request->facture_id);

        if ($facture->commande_formations->users->type_user == 'particulier') {
            $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_formation.generer_facture_particulier', compact('facture'));

            return $pdf->download('facture_#CF' . $facture->id . '.pdf');
        } else {
            $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_formation.generer_facture_entreprise', compact('facture'));

            return $pdf->download('facture_#CF' . $facture->id . '.pdf');
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
    public function show(FactureCommandeFormation $factureCommandeFormation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureCommandeFormation $factureCommandeFormation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactureCommandeFormation $factureCommandeFormation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureCommandeFormation $factureCommandeFormation)
    {
        //
    }
}
