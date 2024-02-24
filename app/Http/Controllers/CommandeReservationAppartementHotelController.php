<?php

namespace App\Http\Controllers;

use App\Models\CommandeReservationAppartementHotel;
use App\Models\SouscrireAbonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CommandeReservationAppartementHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('assistance_reservation_appart_hotel.demande_reservation');
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

            $numero_abonnement_valide = $request->abonnement;

            return view('assistance_reservation_appart_hotel.formulaire_reservation', compact('numero_abonnement_valide'));
        } else {
            return back()->with('error', 'N° abonnement invalide ou non valable.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $numero_commande = 'R' . Carbon::now()->format('YmdHms') . Str::padLeft(Auth::user()->id, 3, 0);

        $commande = new CommandeReservationAppartementHotel();

        $commande->numero_commande = $numero_commande;

        $commande->type_resevation = $request->type_resevation;

        $commande->date_reservation = $request->date_reservation;

        $commande->ville = $request->ville;

        $commande->localite = $request->localite;

        $commande->prix_inferieur = $request->prix_inferieur;

        $commande->prix_superieur = $request->prix_superieur;

        $commande->etat_commande = 'attente';

        $commande->numero_abonnement_valide = $request->numero_abonnement_valide;

        $commande->user_id = Auth::user()->id;

        $commande->save();

        return redirect()->route('success.commande.reservation');
    }

    public function success()
    {

        return view('assistance_reservation_appart_hotel.success_commande_reservation');
    }

    public function attente()
    {

        $commade_attente = CommandeReservationAppartementHotel::where('etat_commande', 'attente')->simplePaginate(15);

        return view('admin_page.gestion_reservation_appart_hotel.attente_validation', compact('commade_attente'));
    }

    public function validation_commande(Request $request)
    {

        $affected = CommandeReservationAppartementHotel::where('id', $request->commande_id)
            ->update([
                'etat_commande' => $request->etat,
            ]);

        return back()->with('success', 'Validé avec succès');
    }

    public function commande_validee(Request $request){

        $commande_validee = CommandeReservationAppartementHotel::where('etat_commande', 'yes')
        ->simplePaginate(15);

        return view('admin_page.gestion_reservation_appart_hotel.commande_validee', compact('commande_validee'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CommandeReservationAppartementHotel $commandeReservationAppartementHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeReservationAppartementHotel $commandeReservationAppartementHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeReservationAppartementHotel $commandeReservationAppartementHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeReservationAppartementHotel $commandeReservationAppartementHotel)
    {
        //
    }
}
