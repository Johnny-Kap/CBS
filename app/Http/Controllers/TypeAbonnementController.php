<?php

namespace App\Http\Controllers;

use App\Models\TypeAbonnement;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class TypeAbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_abonnements = TypeAbonnement::all();

        return view('admin_page.gestion_abonnement.consulter_type_abonnement', compact('type_abonnements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_page.gestion_abonnement.ajouter_type_abonnement');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = new TypeAbonnement();

        $add->intitule = $request->intitule;

        $add->code = $request->code;

        $add->save();

        return back()->with('success', 'Ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeAbonnement $typeAbonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $affected = TypeAbonnement::where('id', $request->type_abonnement_id)
            ->update([
                'intitule' => $request->intitule,
                'code' => $request->code,
            ]);

        return back()->with('success', 'Modifié avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeAbonnement $typeAbonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeAbonnement $typeAbonnement)
    {
        //
    }
}
