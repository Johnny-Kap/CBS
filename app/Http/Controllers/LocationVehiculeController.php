<?php

namespace App\Http\Controllers;

use App\Models\CommandeLocation;
use App\Models\Compte;
use App\Models\LocationVehicule;
use App\Models\ModePaiement;
use App\Models\SouscrireAbonnement;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LocationVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $locationList = LocationVehicule::simplePaginate(10);

        return view('location.location_list', compact('locationList'));
    }


    public function index()
    {
        $location = LocationVehicule::all();

        return view('admin_page.gestion_location.consulter_location', compact('location'));
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
            'intitule' => 'required|string|max:255',
            'description' => 'required|string',
            'tarif' => 'required|numeric',
            'vehicule_id' => 'required',
        ]);

        $location = LocationVehicule::create([
            'intitule' => $request->intitule,
            'description' => $request->description,
            'tarif' => $request->tarif,
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
        $date_heure_depart = date('Y-m-d H:i', strtotime("$request->date_depart $request->heure_depart"));

        //Formatage de la date et heure d'arrivée
        $date_heure_arrivee = date('Y-m-d H:i', strtotime("$request->date_arrivee $request->heure_arrivee"));

        $date = Carbon::parse($date_heure_depart);

        $diff = $date->diffInDays($date_heure_arrivee);

        $commandeDispo = CommandeLocation::where('date_debut', '<=', $date_heure_depart)
            ->where('date_fin', '>=', $date_heure_arrivee)
            ->where('location_vehicule_id', $request->location_id)
            ->where('etat_commande', 'yes')
            ->count();

        $abonnementDispo = SouscrireAbonnement::where('numero_abonnement', $request->abonnement)
            ->where('user_id', Auth::user()->id)
            ->where('is_expired', 'no')
            ->where('etat', 'confirmee')
            ->count();

        $abonnementDispo_other = SouscrireAbonnement::where('numero_abonnement', $request->abonnement)
            ->where('user_id', Auth::user()->id)
            ->where('is_expired', 'no')
            ->where('etat', 'confirmee')
            ->first();

        // Recuperation des infos du compte de l'utilisateur
        // $compte = Compte::where('user_id', Auth::user()->id)->first();

        // CommandeDispo == 0 => c'est dispo && AbonnementDispo == 1 c'est valable


        if ($request->filled('abonnement') == true) {

            if ($commandeDispo == 0 && $abonnementDispo == 0) {

                return back()->with('error', 'Numéro abonnement non valable! Essayez un autre.');
            } elseif ($commandeDispo == 1 && $abonnementDispo == 0) {

                return back()->with('error', 'Numéro abonnement non valable et Location non disponible. Réessayez.');
            } elseif ($commandeDispo == 0 && $abonnementDispo == 1) {

                if ($diff == 0) {
                    $total_tarif = $location->tarif * (1 - ($abonnementDispo_other->abonnements->rabais / 100));
                } else {
                    $total_tarif_provisoire = ($location->tarif * $diff) + $location->tarif;

                    $total_tarif = $total_tarif_provisoire * (1 - ($abonnementDispo_other->abonnements->rabais / 100));
                }

                return view('location.location_booking', compact('location', 'date_heure_depart', 'date_heure_arrivee', 'mode_paiement', 'total_tarif', 'diff'));
            } else {
                return back()->with('error', 'Location non disponible à ces dates renseignées.');
            }
        } else {

            if ($commandeDispo == 1) {

                return back()->with('error', 'Location non disponible. Réessayez une autre date.');
            } elseif ($commandeDispo == 0) {

                if ($diff == 0) {
                    $total_tarif = $location->tarif;
                } else {
                    $total_tarif = ($location->tarif * $diff) + $location->tarif;
                }

                return view('location.location_booking', compact('location', 'date_heure_depart', 'date_heure_arrivee', 'mode_paiement', 'total_tarif', 'diff'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LocationVehicule $locationVehicule)
    {
        //
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
