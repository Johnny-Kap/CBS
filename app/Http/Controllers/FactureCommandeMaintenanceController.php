<?php

namespace App\Http\Controllers;

use App\Models\FactureCommandeMaintenance;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureCommandeMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $facture_commande_maintenance = FactureCommandeMaintenance::all();

        return view('admin_page.gestion_facture.facture_commande_maintenance.consulter_facture', compact('facture_commande_maintenance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $facture = new FactureCommandeMaintenance();

        $facture->commande_maintenance_automobile_id  = $request->commande_id;

        $facture->save();

        return back()->with('success', 'Facture créée avec succès.');
    }

    public function generer(Request $request)
    {

        $facture = FactureCommandeMaintenance::find($request->facture_id);

        if ($facture->commande_maintenance->users->type_user == 'particulier') {
            $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_maintenance.generer_facture_particulier', compact('facture'));

            return $pdf->download('facture_#CM' . $facture->id . '.pdf');
        } else {
            $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_maintenance.generer_facture_entreprise', compact('facture'));

            return $pdf->download('facture_#CM' . $facture->id . '.pdf');
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
    public function show(FactureCommandeMaintenance $factureCommandeMaintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureCommandeMaintenance $factureCommandeMaintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactureCommandeMaintenance $factureCommandeMaintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureCommandeMaintenance $factureCommandeMaintenance)
    {
        //
    }
}
