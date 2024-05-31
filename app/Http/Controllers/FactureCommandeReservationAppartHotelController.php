<?php

namespace App\Http\Controllers;

use App\Models\FactureCommandeReservationAppartHotel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureCommandeReservationAppartHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $facture_commande_reservation_appart_hotel = FactureCommandeReservationAppartHotel::all();

        return view('admin_page.gestion_facture.facture_commande_reservation_appart_hotel.consulter_facture', compact('facture_commande_reservation_appart_hotel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $facture = new FactureCommandeReservationAppartHotel();

        $facture->commande_reservation_appartement_hotels_id  = $request->reservation_id;

        $facture->save();

        return back()->with('success','Facture créée avec succès.');
    }

    public function generer(Request $request){

        $facture = FactureCommandeReservationAppartHotel::find($request->facture_id);

        $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_reservation_appart_hotel.generer_facture', compact('facture'));

        return $pdf->download('facture_#CRAH'. $facture->id .'.pdf');
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
    public function show(FactureCommandeReservationAppartHotel $factureCommandeReservationAppartHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureCommandeReservationAppartHotel $factureCommandeReservationAppartHotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactureCommandeReservationAppartHotel $factureCommandeReservationAppartHotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureCommandeReservationAppartHotel $factureCommandeReservationAppartHotel)
    {
        //
    }
}
