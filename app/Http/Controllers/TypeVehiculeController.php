<?php

namespace App\Http\Controllers;

use App\Models\TypeVehicule;
use Illuminate\Http\Request;

class TypeVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $showTypeVehicule = TypeVehicule::all();

        return view('admin_page.gestion_vehicule.consulter_type_vehicule', compact('showTypeVehicule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_page.gestion_vehicule.ajouter_type_vehicule');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $add = new TypeVehicule();

        $add->intitule = $request->intitule;

        $add->description = $request->description;

        $add->save();

        return back()->with('success', 'Ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeVehicule $typeVehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeVehicule $typeVehicule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TypeVehicule $typeVehicule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TypeVehicule $typeVehicule)
    {
        //
    }
}
