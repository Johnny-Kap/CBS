<?php

namespace App\Http\Controllers;

use App\Models\BonLivraisonMaintenance;
use App\Models\CommandeMaintenanceAutomobile;
use Illuminate\Http\Request;

class BonLivraisonMaintenanceController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $bon = new BonLivraisonMaintenance();

        $bon->commande_maintenance_automobile_id = $request->command_id;

        $bon->save();

        return back()->with('success', 'Bon de livraison créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(BonLivraisonMaintenance $bonLivraisonMaintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BonLivraisonMaintenance $bonLivraisonMaintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BonLivraisonMaintenance $bonLivraisonMaintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BonLivraisonMaintenance $bonLivraisonMaintenance)
    {
        //
    }
}
