<?php

namespace App\Http\Controllers;

use App\Models\TypeVehicule;
use App\Models\Vehicule;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showVehicule = Vehicule::all();

        return view('admin_page.gestion_vehicule.consulter_vehicule', compact('showVehicule'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $type_vehicule = TypeVehicule::all();

        return view('admin_page.gestion_vehicule.ajouter_vehicule', compact('type_vehicule'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'intitule' => 'required|string|max:255',
            'immatriculation' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'couleur' => 'required|string|max:255',
            'annee_fabrication' => 'string|max:255',
            'description',
            'etat' => 'string|max:255',
            'transmission',
            'type_moteur',
            'air_conditionne',
            'nombre_kilometrage' => 'numeric',
            'nombre_portieres' => 'numeric',
            'type_vehicule_id' => 'required|string|max:255',
            'images' => 'array',
        ]);

        $images = [];

        foreach ($data['images'] as $image) {
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path =  $image->storeAs('images', $fileName, 'public');

            array_push($images, $image_path);
        }

        $data['images'] = $images;

        // $fonctionnalites = [];

        // foreach($request->fonctionnalites as $item){
        //     $fonctionnalites[] = $item;
        // }

        // dd($fonctionnalites);

        // Ajouter image illustrative
        $filename_illustrative = time() . '.' . $request->image_illustrative->extension();

        $path = $request->file('image_illustrative')->storeAs('images', $filename_illustrative, 'public');

        $vehicule = Vehicule::create([
            'intitule' => $request->intitule,
            'numero_immatriculation' => $request->immatriculation,
            'modele' => $request->modele,
            'couleur' => $request->couleur,
            'annee_fabrication' => $request->annee_fabrication,
            'description' => $request->description,
            'etat' => $request->etat,
            'transmission' => $request->transmission,
            'type_moteur' => $request->moteur,
            'nombre_kilometrage' => $request->kilometrage,
            'air_conditionne' => $request->air_conditionne,
            'nombre_portieres' => $request->nombre_portieres,
            'fonctionnalites' => $request->fonctionnalites,
            'type_vehicule_id' => $request->type_vehicule_id,
            'images' => $images,
            'image_illustrative' => $path
        ]);

        return back()->with('success', 'Ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicule $vehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicule $vehicule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehicule $vehicule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicule $vehicule)
    {
        //
    }
}
