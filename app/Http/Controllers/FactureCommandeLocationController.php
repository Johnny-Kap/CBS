<?php

namespace App\Http\Controllers;

use App\Models\FactureCommandeLocation;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FactureCommandeLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $facture_commande_location = FactureCommandeLocation::all();

        return view('admin_page.gestion_facture.facture_commande_location.consulter_facture', compact('facture_commande_location'));
    }

    public function generer(Request $request)
    {

        $facture = FactureCommandeLocation::find($request->facture_id);

        if ($facture->commande_locations->users->type_user == 'particulier') {
            $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_location.generer_facture_particulier', compact('facture'));

            return $pdf->download('facture_#CL' . $facture->id . '.pdf');
        } else {
            $pdf = Pdf::loadView('admin_page.gestion_facture.facture_commande_location.generer_facture_entreprise', compact('facture'));

            return $pdf->download('facture_#CL' . $facture->id . '.pdf');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $facture = new FactureCommandeLocation();

        $facture->commande_location_id  = $request->commande_id;

        $facture->save();

        return back()->with('success', 'Facture créé avec succès.');
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
    public function show(FactureCommandeLocation $factureCommandeLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FactureCommandeLocation $factureCommandeLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FactureCommandeLocation $factureCommandeLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FactureCommandeLocation $factureCommandeLocation)
    {
        //
    }
}
