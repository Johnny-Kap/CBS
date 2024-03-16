<?php

namespace App\Http\Controllers;

use App\Models\ModePaiement;
use Illuminate\Http\Request;

class ModePaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mode_paiement_show = ModePaiement::all();

        return view('admin_page.gestion_recharge.mode_paiement_consulter', compact('mode_paiement_show'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_page.gestion_recharge.mode_paiement_ajouter');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = new ModePaiement();

        $add->intitule = $request->intitule;

        $add->description = $request->description;

        $add->save();

        return back()->with('success', 'Ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModePaiement $modePaiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $affected = ModePaiement::where('id', $request->mode_paiement_id)
            ->update([
                'intitule' => $request->intitule,
                'description' => $request->description,
            ]);

        return back()->with('success', 'Modifié avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModePaiement $modePaiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModePaiement $modePaiement)
    {
        //
    }
}
