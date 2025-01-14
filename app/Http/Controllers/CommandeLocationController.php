<?php

namespace App\Http\Controllers;

use App\Mail\AnnulationCommandeLocation;
use App\Mail\AnnulationPaiementCommandeLocation;
use App\Mail\ModificationCommandeLocation;
use App\Mail\SuccessCommandeLocation;
use App\Mail\ValidationCommandeLocation;
use App\Mail\ValidationPaiementCommandeLocation;
use App\Models\CommandeFormation;
use App\Models\CommandeLocation;
use App\Models\CommandeMaintenanceAutomobile;
use App\Models\Compte;
use App\Models\ExpressionBesoinFormation;
use App\Models\LivraisonPanier;
use App\Models\LocationVehicule;
use App\Models\ModePaiement;
use App\Models\SouscrireAbonnement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CommandeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $commade_attente = CommandeLocation::where('etat_commande', 'attente')->get();

        return view('admin_page.gestion_commande_location.attente_validation', compact('commade_attente'));
    }

    public function paiement_non_soumis()
    {

        $paiement_non_soumis = CommandeLocation::where('etat_commande', 'yes')
            ->where('photo', null)
            ->get();

        return view('admin_page.gestion_commande_location.commande_paiement_non_soumis', compact('paiement_non_soumis'));
    }

    public function confirmation_paiement()
    {

        $mode_paiement = ModePaiement::all();

        $commande = CommandeLocation::where('user_id', Auth::user()->id)
            ->where('etat_commande', 'yes')
            ->where('photo', null)->simplePaginate(15);

        $achat_livraison = LivraisonPanier::where('user_id', Auth::user()->id)
            ->where('type_prestation', 'achat')
            ->where('etat_commande', 'yes')
            ->where('image', null)->simplePaginate(15);

        $commande_maintenance = CommandeMaintenanceAutomobile::where('user_id', Auth::user()->id)
            ->where('etat_commande', 'yes')
            ->where('image', null)->simplePaginate(15);

        $commande_formation = CommandeFormation::where('user_id', Auth::user()->id)
            ->where('etat_commande', 'yes')
            ->where('photo', null)->simplePaginate(15);

        $expression_besoin_formation = ExpressionBesoinFormation::where('user_id', Auth::user()->id)
            ->where('etat_commande', 'yes')
            ->where('photo_paiement', null)->simplePaginate(15);

        return view('profile.confirmation_paiement', compact('commande', 'achat_livraison', 'commande_maintenance', 'mode_paiement', 'commande_formation', 'expression_besoin_formation'));
    }

    public function success()
    {
        return view('location.success_commande');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($location_id, $date_heure_depart, $date_heure_arrivee, $total_tarif, $diff, $abonnement, $rabais, $montant_rabais)
    {

        $location = LocationVehicule::find($location_id);

        $numero_commande = 'CL' . Carbon::now()->format('YmdHms');

        // Enregistrement de la commande
        $commande = new CommandeLocation();

        $commande->date_debut = $date_heure_depart;

        $commande->date_fin = $date_heure_arrivee;

        $commande->tarif = $total_tarif;

        $commande->nombre_jours = $diff + 1;

        $commande->etat_paiement = 'no';

        $commande->etat_commande = 'attente';

        $commande->numero_commande = $numero_commande;

        $commande->numero_abonnement_souscris = $abonnement;

        $commande->rabais = $rabais;

        $commande->tarif_rabais = $montant_rabais;

        $commande->location_vehicule_id = $location_id;

        $commande->user_id = Auth::user()->id;

        $commande->save();

        $commande_location = CommandeLocation::where('numero_commande', $numero_commande)->first();

        Mail::to(Auth::user()->email)->send(new SuccessCommandeLocation($commande_location));

        return redirect()->route('success');
    }

    public function validation_commande(Request $request)
    {

        if ($request->etat == 'yes') {

            if ($request->has('rabais') == true) {

                $new_tarif = $request->tarif * (1 - ($request->rabais / 100));

                $affected = CommandeLocation::where('id', $request->commande_id)
                    ->update([
                        'etat_commande' => $request->etat,
                        'tarif_rabais' => $new_tarif,
                        'rabais' => $request->rabais,
                    ]);
            } else {

                $affected = CommandeLocation::where('id', $request->commande_id)
                    ->update([
                        'etat_commande' => $request->etat,
                    ]);
            }

            $commande_validation = CommandeLocation::find($request->commande_id);

            Mail::to($commande_validation->users->email)->send(new ValidationCommandeLocation($commande_validation));

            return back()->with('success', 'Validé avec succès. Email de notification envoyé au client.');
        } else {
            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'etat_commande' => $request->etat,
                ]);
            $commande_location_annulee = CommandeLocation::find($request->commande_id);

            Mail::to($commande_location_annulee->users->email)->send(new AnnulationCommandeLocation($commande_location_annulee));

            return back()->with('success', 'Commande annulée avec succès. Email de notification envoyé au client.');
        }
    }

    public function modifier_commande(Request $request)
    {

        $abonnement_numero = CommandeLocation::where('id', $request->commande_id)->pluck('numero_abonnement_souscris');

        $abonnementDispo_other = SouscrireAbonnement::where('numero_abonnement', $abonnement_numero)
            ->where('user_id', Auth::user()->id)
            ->where('is_expired', 'no')
            ->where('etat', 'yes')
            ->first();

        $location_id = CommandeLocation::where('id', $request->commande_id)->pluck('location_vehicule_id');

        $location = LocationVehicule::where('id', $location_id)->first();

        //Formatage de la date et heure de depart
        $date_heure_depart = date('Y-m-d', strtotime("$request->date_depart"));

        //Formatage de la date et heure d'arrivée
        $date_heure_arrivee = date('Y-m-d', strtotime("$request->date_arrivee"));

        $date = Carbon::parse($date_heure_depart);

        $diff = $date->diffInDays($date_heure_arrivee);

        $commande = CommandeLocation::find($request->commande_id);

        if ($commande->numero_abonnement_souscris == 'null' && $commande->rabais == 0) {

            if ($diff == 0) {
                $total_tarif = $location->tarif;
            } else {
                $total_tarif = ($location->tarif * $diff) + $location->tarif;
            }

            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'date_debut' => $date_heure_depart,
                    'date_fin' => $date_heure_arrivee,
                    'nombre_jours' => $diff + 1,
                    'tarif' => $total_tarif,
                ]);

            Mail::to($commande->users->email)->send(new ModificationCommandeLocation($commande));

            return back()->with('success', 'Modifié avec succès.');
        } elseif ($commande->numero_abonnement_souscris == 'null' && $commande->rabais != 0) {

            if ($diff == 0) {
                $total_tarif = $location->tarif;
            } else {
                $total_tarif = ($location->tarif * $diff) + $location->tarif;
            }

            $montant_rabais = $total_tarif * (1 - ($commande->rabais / 100));

            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'date_debut' => $date_heure_depart,
                    'date_fin' => $date_heure_arrivee,
                    'nombre_jours' => $diff + 1,
                    'tarif' => $total_tarif,
                    'tarif_rabais' => $montant_rabais,
                ]);

            Mail::to($commande->users->email)->send(new ModificationCommandeLocation($commande));

            return back()->with('success', 'Modifié avec succès.');
        } elseif ($commande->numero_abonnement_souscris != 'null' && $commande->rabais == 0) {

            if ($diff == 0) {
                $total_tarif = $location->tarif * (1 - ($abonnementDispo_other->abonnements->rabais / 100));
            } else {
                $total_tarif_provisoire = ($location->tarif * $diff) + $location->tarif;

                $total_tarif = $total_tarif_provisoire * (1 - ($abonnementDispo_other->abonnements->rabais / 100));
            }

            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'date_debut' => $date_heure_depart,
                    'date_fin' => $date_heure_arrivee,
                    'nombre_jours' => $diff + 1,
                    'tarif' => $total_tarif,
                ]);

            Mail::to($commande->users->email)->send(new ModificationCommandeLocation($commande));

            return back()->with('success', 'Modifié avec succès.');
        } else {

            if ($diff == 0) {
                $total_tarif = $location->tarif * (1 - ($abonnementDispo_other->abonnements->rabais / 100));
            } else {
                $total_tarif_provisoire = ($location->tarif * $diff) + $location->tarif;

                $total_tarif = $total_tarif_provisoire * (1 - ($abonnementDispo_other->abonnements->rabais / 100));
            }

            $montant_rabais = $total_tarif * (1 - ($commande->rabais / 100));

            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'date_debut' => $date_heure_depart,
                    'date_fin' => $date_heure_arrivee,
                    'nombre_jours' => $diff + 1,
                    'tarif' => $total_tarif,
                    'tarif_rabais' => $montant_rabais,
                ]);

            Mail::to($commande->users->email)->send(new ModificationCommandeLocation($commande));

            return back()->with('success', 'Modifié avec succès.');
        }
    }

    public function commande_annulee()
    {

        $commade_annulee = CommandeLocation::where('etat_commande', 'canceled')->get();

        return view('admin_page.gestion_commande_location.commande_annulee', compact('commade_annulee'));
    }

    public function soumission_paiement(Request $request)
    {

        if ($request->has('file')) {

            $request->validate([
                'file' => 'required|mimes:jpeg,png,jpg',
            ]);

            $filename = time() . '.' . $request->file->extension();

            $path = $request->file('file')->storeAs('images', $filename, 'public');

            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'photo' => $path,
                    'mode_paiement_id' => $request->mode_paiement,
                    'type_location' => $request->type_location,
                    'zone_location' => $request->zone_location,
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

        if ($request->etat == 'yes') {
            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'etat_paiement' => $request->etat,
                ]);

            $commande_validation_paiement = CommandeLocation::find($request->commande_id);

            Mail::to($commande_validation_paiement->users->email)->send(new ValidationPaiementCommandeLocation($commande_validation_paiement));

            return back()->with('success', 'Paiement validé avec succès. Email de notification envoyé au client. ');
        } else {
            $affected = CommandeLocation::where('id', $request->commande_id)
                ->update([
                    'photo' => null,
                ]);

            $paiement_commande_location_annule = CommandeLocation::find($request->commande_id);

            Mail::to($paiement_commande_location_annule->users->email)->send(new AnnulationPaiementCommandeLocation($paiement_commande_location_annule));

            return back()->with('success', 'Commande non payée. Le commande est retournée à Paiement non soumis. Email de notification envoyé au client.');
        }
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
