<?php

namespace App\Http\Controllers;

use App\Models\CommandeLocation;
use App\Models\Compte;
use App\Models\LocationVehicule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommandeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $commade_attente = CommandeLocation::where('etat_commande', 'attente')->simplePaginate(15);

        return view('admin_page.gestion_commande_location.attente_validation', compact('commade_attente'));
    }

    public function commande_validee()
    {

        $commande_validee = CommandeLocation::where('etat_commande', 'yes')->simplePaginate(15);

        return view('admin_page.gestion_commande_location.commande_validee', compact('commande_validee'));
    }

    public function confirmation_paiement()
    {

        $commande = CommandeLocation::where('user_id', Auth::user()->id)
            ->where('etat_commande', 'yes')
            ->where('photo', null)->simplePaginate(15);

        return view('profile.confirmation_paiement', compact('commande'));
    }

    public function success()
    {
        return view('location.success_commande');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($location_id, $date_heure_depart, $date_heure_arrivee, $mode_paiement, $total_tarif, $diff)
    {

        $location = LocationVehicule::find($location_id);

        $numero_commande = 'CL' . Carbon::now()->format('YmdHms') . Str::padLeft(Auth::user()->id, 3, 0);

        // Enregistrement de la commande
        $commande = new CommandeLocation();

        $commande->date_debut = $date_heure_depart;

        $commande->date_fin = $date_heure_arrivee;

        $commande->tarif = $total_tarif;

        $commande->nombre_jours = $diff + 1;

        $commande->etat_paiement = 'no';

        $commande->etat_commande = 'attente';

        $commande->numero_commande = $numero_commande;

        $commande->mode_paiement_id = $mode_paiement;

        $commande->location_vehicule_id = $location_id;

        $commande->user_id = Auth::user()->id;

        $commande->save();

        return redirect()->route('success');
    }

    public function validation_commande(Request $request)
    {

        $affected = CommandeLocation::where('id', $request->commande_id)
            ->update([
                'etat_commande' => $request->etat,
            ]);

        return back()->with('success', 'Validé avec succès');
    }

    public function soumission_paiement(Request $request)
    {

        if ($request->has('file')) {

            $filename = time() . '.' . $request->file->extension();

            $path = $request->file('file')->storeAs('images', $filename, 'public');

            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'photo' => $path,
                ]);

            return back()->with('success', 'Preuve de paiement soumis avec succès! Vous serez contacté après validation.');
        } else {
            return back()->with('error', 'Veuillez ajouté votre capture d\'écran.');
        }
    }

    public function validation_paiement(Request $request)
    {

        $commande_validation_paiement = CommandeLocation::where('etat_commande', 'yes')
            ->where('etat_paiement', 'no')
            ->whereNotNull('photo')->simplePaginate(15);

        return view('admin_page.gestion_commande_location.validation_paiement', compact('commande_validation_paiement'));
    }

    public function paiement_valide(Request $request)
    {

        $affected = CommandeLocation::where('id', $request->commande_id)
            ->update([
                'etat_paiement' => $request->etat,
            ]);

        return back()->with('success', 'Paiement validé avec succès');
    }

    public function commande_confirmees(Request $request)
    {

        $commande_confirmees = CommandeLocation::where('etat_commande', 'yes')
            ->where('etat_paiement', 'yes')
            ->whereNotNull('photo')->simplePaginate(15);

        return view('admin_page.gestion_commande_location.commande_confirmees', compact('commande_confirmees'));
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
