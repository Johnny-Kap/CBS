<?php

namespace App\Http\Controllers;

use App\Models\CommandeMaintenanceAutomobile;
use App\Models\ModePaiement;
use App\Models\SouscrireAbonnement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CommandeMaintenanceAutomobileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('maintenance_automobile.demande_maintenance');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $abonnementDispo = SouscrireAbonnement::where('numero_abonnement', $request->abonnement)
            ->where('user_id', Auth::user()->id)
            ->where('is_expired', 'no')
            ->where('etat', 'confirmee')
            ->count();

            if ($abonnementDispo == 1) {

                return view('maintenance_automobile.formulaire_maintenance');
            }else{
                return back()->with('error', 'N° abonnement invalide ou non valable.');
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $numero_commande = 'CM' . Carbon::now()->format('YmdHms') . Str::padLeft(Auth::user()->id, 3, 0);
        
        $commande = new CommandeMaintenanceAutomobile();

        $commande->numero_commande = $numero_commande; 

        $commande->intitule = $request->intitule;

        $commande->debrief = $request->debrief;

        $commande->date_maintenance = $request->date_maintenance;

        $commande->debrief = $request->debrief;

        $commande->situation_vehicule = $request->situation_vehicule;

        $commande->marque_vehicule = $request->marque_vehicule;

        $commande->modele_vehicule = $request->modele_vehicule;

        $commande->type_moteur = $request->type_moteur;

        $commande->etat_commande = 'attente';

        $commande->etat_paiement = 'no';

        $commande->user_id = Auth::user()->id;

        $commande->mode_paiement_id = $request->mode_paiement;

        $commande->save();

        return redirect()->route('success.commande.maintenance');
    }

    public function success(){

        return view('maintenance_automobile.success_commande_maintenance');
    }

    public function attente(){

        $commade_attente = CommandeMaintenanceAutomobile::where('etat_commande', 'attente')->simplePaginate(15);

        return view('admin_page.gestion_commande_maintenance.attente_validation', compact('commade_attente'));
    }

    public function validation_commande(Request $request)
    {

        $affected = CommandeMaintenanceAutomobile::where('id', $request->commande_id)
            ->update([
                'etat_commande' => $request->etat,
            ]);

        return back()->with('success', 'Validé avec succès');
    }

    public function commande_validee()
    {

        $mode_paiement = ModePaiement::all();

        $commande_validee = CommandeMaintenanceAutomobile::where('etat_commande', 'yes')
        ->where('etat_paiement', 'no')
        ->simplePaginate(15);

        return view('admin_page.gestion_commande_maintenance.commande_validee', compact('commande_validee', 'mode_paiement'));
    }

    public function paiement_valide(Request $request)
    {

        $affected = CommandeMaintenanceAutomobile::where('id', $request->commande_id)
            ->update([
                'etat_paiement' => $request->etat_paiement,
                'montant' => $request->montant,
                'mode_paiement_id' => $request->mode_paiement,
            ]);

        return back()->with('success', 'Paiement validé avec succès');
    }

    public function commande_confirmees()
    {

        $commande_confirmees = CommandeMaintenanceAutomobile::where('etat_commande', 'yes')
            ->where('etat_paiement', 'yes')->simplePaginate(15);

        return view('admin_page.gestion_commande_maintenance.commande_confirmees', compact('commande_confirmees'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CommandeMaintenanceAutomobile $commandeMaintenanceAutomobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeMaintenanceAutomobile $commandeMaintenanceAutomobile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeMaintenanceAutomobile $commandeMaintenanceAutomobile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeMaintenanceAutomobile $commandeMaintenanceAutomobile)
    {
        //
    }
}
