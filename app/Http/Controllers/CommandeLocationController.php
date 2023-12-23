<?php

namespace App\Http\Controllers;

use App\Models\CommandeLocation;
use App\Models\Compte;
use App\Models\LocationVehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function success(){
        return view('location.success_commande');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($location_id, $compte_id, $date_heure_depart, $date_heure_arrivee, $mode_paiement, $total_tarif, $diff)
    {

        $location = LocationVehicule::find($location_id);

        $compte = Compte::find($compte_id);

        if ($compte_id == '') {

            return back()->with('error', 'Veuillez créer un compte de paiement dans les paramètres.');
        } else {
            if ($compte->solde < $total_tarif) {

                return back()->with('error', 'Solde insuffisant. Veuillez recharger votre compte de paiement dans les paramètres.');
            } else {

                // Calcul du nouveau solde apres débit du tarif de la location
                $restant_compte = $compte->solde - $total_tarif;

                // Nouveau solde affecté
                $new_solde = Compte::where('id', $compte_id)
                    ->update([
                        'solde' => $restant_compte,
                    ]);

                // Enregistrement de la commande
                $commande = new CommandeLocation();

                $commande->date_debut = $date_heure_depart;

                $commande->date_fin = $date_heure_arrivee;

                $commande->tarif = $total_tarif;

                $commande->nombre_jours = $diff + 1;

                $commande->etat_paiement = 'Payé';

                $commande->etat_commande = 'En attente de confirmation';

                $commande->mode_paiement_id = $mode_paiement;

                $commande->location_vehicule_id = $location_id;

                $commande->user_id = Auth::user()->id;

                $commande->save();

                return redirect()->route('sucess');
            }
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
    public function show(CommandeLocation $commandeLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeLocation $commandeLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeLocation $commandeLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeLocation $commandeLocation)
    {
        //
    }
}
