<?php

namespace App\Http\Controllers;

use App\Models\CommandeLocation;
use App\Models\Compte;
use App\Models\LocationVehicule;
use App\Models\Marque;
use App\Models\ModePaiement;
use App\Models\SouscrireAbonnement;
use App\Models\TypeVehicule;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;

class LocationVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $locationList = LocationVehicule::where('masked', 'no')->simplePaginate(10);

        $type_vehicules = TypeVehicule::all();

        $marques = Marque::all();

        return view('location.location_list', compact('locationList', 'type_vehicules', 'marques'));
    }

    public function filter(Request $request)
    {

        if ($request->has('marque') == true && $request->has('categorie') == false && $request->has('prix_inferieur') == false && $request->has('prix_superieur') == false) {

            $vehicules = Vehicule::where('marque_id', $request->marque)->pluck('id');

            $results = LocationVehicule::whereIn('vehicule_id', $vehicules)->simplePaginate(15);

            $type_vehicules = TypeVehicule::all();

            $marques = Marque::all();

            return view('location.location_filter', compact('results', 'type_vehicules', 'marques'));
        } elseif ($request->has('marque') == false && $request->has('categorie') == true && $request->has('prix_inferieur') == false && $request->has('prix_superieur') == false) {

            $vehicules = Vehicule::where('type_vehicule_id', $request->categorie)->pluck('id');

            $results = LocationVehicule::whereIn('vehicule_id', $vehicules)->simplePaginate(15);

            $type_vehicules = TypeVehicule::all();

            $marques = Marque::all();

            return view('location.location_filter', compact('results', 'type_vehicules', 'marques'));
        } elseif ($request->has('marque') == false && $request->has('categorie') == false && $request->has('prix_inferieur') == true && $request->has('prix_superieur') == true) {

            $results = LocationVehicule::whereBetween('tarif', [$request->prix_inferieur, $request->prix_superieur])->simplePaginate(15);

            $type_vehicules = TypeVehicule::all();

            $marques = Marque::all();

            return view('location.location_filter', compact('results', 'type_vehicules', 'marques'));
        } elseif ($request->has('marque') == true && $request->has('categorie') == true && $request->has('prix_inferieur') == false && $request->has('prix_superieur') == false) {

            $vehicules = Vehicule::where('type_vehicule_id', $request->categorie)->where('marque_id', $request->marque)->pluck('id');

            $results = LocationVehicule::whereIn('vehicule_id', $vehicules)->simplePaginate(15);

            $type_vehicules = TypeVehicule::all();

            $marques = Marque::all();

            return view('location.location_filter', compact('results', 'type_vehicules', 'marques'));
        } elseif ($request->has('marque') == true && $request->has('categorie') == false && $request->has('prix_inferieur') == true && $request->has('prix_superieur') == true) {

            $vehicules = Vehicule::where('marque_id', $request->marque)->pluck('id');

            $results = LocationVehicule::whereIn('vehicule_id', $vehicules)->whereBetween('tarif', [$request->prix_inferieur, $request->prix_superieur])->simplePaginate(15);

            $type_vehicules = TypeVehicule::all();

            $marques = Marque::all();

            return view('location.location_filter', compact('results', 'type_vehicules', 'marques'));
        } elseif ($request->has('marque') == false && $request->has('categorie') == true && $request->has('prix_inferieur') == true && $request->has('prix_superieur') == true) {

            $vehicules = Vehicule::where('type_vehicule_id', $request->categorie)->pluck('id');

            $results = LocationVehicule::whereIn('vehicule_id', $vehicules)->whereBetween('tarif', [$request->prix_inferieur, $request->prix_superieur])->simplePaginate(15);

            $type_vehicules = TypeVehicule::all();

            $marques = Marque::all();

            return view('location.location_filter', compact('results', 'type_vehicules', 'marques'));
        } elseif ($request->has('marque') == true && $request->has('categorie') == true && $request->has('prix_inferieur') == true && $request->has('prix_superieur') == true) {

            $vehicules = Vehicule::where('type_vehicule_id', $request->categorie)->where('marque_id', $request->marque)->pluck('id');

            $results = LocationVehicule::whereIn('vehicule_id', $vehicules)->whereBetween('tarif', [$request->prix_inferieur, $request->prix_superieur])->simplePaginate(15);

            $type_vehicules = TypeVehicule::all();

            $marques = Marque::all();

            return view('location.location_filter', compact('results', 'type_vehicules', 'marques'));
        } else {

            return back()->with('error', 'Veuillez renseigner un des champs pour appliquer le filtre.');
        }
    }

    public function search(Request $request)
    {

        if ($request->search == null) {

            return back()->with('error', 'Veuillez renseigner le champs.');
        } else {

            $results = LocationVehicule::where('intitule', 'like', '%' . $request->search . '%')->simplePaginate(15);

            $type_vehicules = TypeVehicule::all();

            $marques = Marque::all();

            return view('location.location_search', compact('results', 'type_vehicules', 'marques'));
        }
    }

    function action(Request $request)
    {
        $data = $request->all();

        $query = $data['query'];

        $filter_data = LocationVehicule::select('intitule')
            ->where('intitule', 'LIKE', '%' . $query . '%')
            ->get();

        return response()->json($filter_data);
    }


    public function index()
    {
        $location = LocationVehicule::all();

        $vehicules = Vehicule::all();

        return view('admin_page.gestion_location.consulter_location', compact('location', 'vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $vehicules = Vehicule::all();

        return view('admin_page.gestion_location.ajouter_location', compact('vehicules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tarif' => 'required|numeric',
            'vehicule_id' => 'required',
        ]);

        $location = LocationVehicule::create([
            'tarif' => $request->tarif,
            'masked' => 'no',
            'vehicule_id' => $request->vehicule_id,
            'user_id' => Auth::user()->id,
        ]);

        return back()->with('success', 'Ajouté avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $locationShow = LocationVehicule::find($id);

        return view('location.location_details', compact('locationShow'));
    }

    public function verifierDispo(Request $request)
    {

        // Obtenir les modes de paiement
        $mode_paiement = ModePaiement::first();

        //Obtenir la location selectionnée
        $location = LocationVehicule::find($request->location_id);

        //Formatage de la date et heure de depart
        $date_heure_depart = date('Y-m-d', strtotime("$request->date_depart"));

        //Formatage de la date et heure d'arrivée
        $date_heure_arrivee = date('Y-m-d', strtotime("$request->date_arrivee"));

        $date = Carbon::parse($date_heure_depart);

        $diff = $date->diffInDays($date_heure_arrivee);

        // $commandeDispo = CommandeLocation::where('date_debut', '<=', $date_heure_depart)
        //     ->where('date_fin', '>=', $date_heure_arrivee)
        //     ->orWhere('date_debut', '>=', $date_heure_depart)->where('date_fin', '<=', $date_heure_arrivee)
        //     ->where('location_vehicule_id', $request->location_id)
        //     ->count();

        $abonnementDispo = SouscrireAbonnement::where('numero_abonnement', $request->abonnement)
            ->where('user_id', Auth::user()->id)
            ->where('is_expired', 'no')
            ->where('etat', 'yes')
            ->count();

        $abonnementDispo_other = SouscrireAbonnement::where('numero_abonnement', $request->abonnement)
            ->where('user_id', Auth::user()->id)
            ->where('is_expired', 'no')
            ->where('etat', 'yes')
            ->first();

        // Recuperation des infos du compte de l'utilisateur
        // $compte = Compte::where('user_id', Auth::user()->id)->first();

        // CommandeDispo == 0 => c'est dispo && AbonnementDispo == 1 c'est valable


        if ($request->filled('abonnement') == true) {

            if ($abonnementDispo != 1) {

                return back()->with('error', 'Numéro abonnement non valable! Essayez un autre.');
            } elseif ($abonnementDispo != 1) {

                return back()->with('error', 'Numéro abonnement non valable. Réessayez.');
            } elseif ($abonnementDispo == 1) {

                if ($diff == 0) {
                    $total_tarif = $location->tarif * (1 - ($abonnementDispo_other->abonnements->rabais / 100));
                } else {
                    $total_tarif_provisoire = ($location->tarif * $diff) + $location->tarif;

                    $total_tarif = $total_tarif_provisoire * (1 - ($abonnementDispo_other->abonnements->rabais / 100));
                }

                $abonnement = $request->abonnement;

                if ($request->filled('rabais') == true) {

                    $rabais = $request->rabais;

                    $montant_rabais = $total_tarif * (1 - ($rabais / 100));
                } else {

                    $rabais = 0;

                    $montant_rabais = 0;
                }

                return view('location.location_booking', compact('location', 'date_heure_depart', 'date_heure_arrivee', 'mode_paiement', 'total_tarif', 'diff', 'abonnement', 'rabais', 'montant_rabais'));
            } else {
                return back()->with('error', 'Location non disponible à ces dates renseignées.');
            }
        } else {

                if ($diff == 0) {
                    $total_tarif = $location->tarif;
                } else {
                    $total_tarif = ($location->tarif * $diff) + $location->tarif;
                }

                $abonnement = 'null';

                if ($request->filled('rabais') == true) {

                    $rabais = $request->rabais;

                    $montant_rabais = $total_tarif * (1 - ($rabais / 100));
                } else {

                    $rabais = 0;

                    $montant_rabais = 0;
                }

                return view('location.location_booking', compact('location', 'date_heure_depart', 'date_heure_arrivee', 'mode_paiement', 'total_tarif', 'diff', 'abonnement', 'rabais', 'montant_rabais'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $affected = LocationVehicule::where('id', $request->location_id)
            ->update([
                'intitule' => $request->intitule,
                'description' => $request->description,
                'tarif' => $request->tarif,
                'vehicule_id' => $request->vehicule_id,
                'user_id' => Auth::user()->id,
            ]);

        return back()->with('success', 'Modifié avec succès.');
    }

    public function masked(Request $request)
    {

        $affected = LocationVehicule::where('id', $request->location_id)
            ->update([
                'masked' => 'yes',
            ]);

        return back()->with('success', 'Masqué avec succès.');
    }

    public function demasked(Request $request)
    {

        $affected = LocationVehicule::where('id', $request->location_id)
            ->update([
                'masked' => 'no',
            ]);

        return back()->with('success', 'Démasqué avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LocationVehicule $locationVehicule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LocationVehicule $locationVehicule)
    {
        //
    }
}
