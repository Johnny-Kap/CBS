<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $showMarque = Marque::all();

        return view('admin_page.gestion_marque_vehicule.consulter_marque', compact('showMarque'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_page.gestion_marque_vehicule.ajouter_marque');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $add = new Marque();

        $add->intitule = $request->intitule;

        $add->description = $request->description;

        $add->save();

        return back()->with('success', 'Ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marque $marque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        
        $affected = Marque::where('id', $request->marque_id)
            ->update([
                'intitule' => $request->intitule,
                'description' => $request->description,
            ]);

        return back()->with('success', 'Modifié avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marque $marque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marque $marque)
    {
        //
    }
}
