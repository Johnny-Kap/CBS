<?php

namespace App\Http\Controllers;

use App\Models\BonLivraisonMaintenance;
use App\Models\BonMaintenance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BonMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = BonMaintenance::all();

        return view('admin_page.gestion_bon_livraison.commande_maintenance.consulter_bon_livraison', compact('show'));
    }

    public function generer(Request $request)
    {

        // Définir la locale en français
        Carbon::setLocale('fr');

        // Obtenir la date formatée
        $date = Carbon::now()->translatedFormat('d F Y');

        $bon_livraison = BonMaintenance::find($request->bon_livraison_id);

        if ($bon_livraison->commandes->users->type_user == 'particulier') {

            $pdf = Pdf::loadView('admin_page.gestion_bon_livraison.commande_maintenance.generer_bon_livraison_particulier', compact('bon_livraison', 'date'));

            return $pdf->download('Bon_livraison_#BLM' . $bon_livraison->id . '.pdf');

            //return view('admin_page.gestion_bon_livraison.commande_maintenance.generer_bon_livraison_particulier', compact('bon_livraison', 'date'));
        }else{

            $pdf = Pdf::loadView('admin_page.gestion_bon_livraison.commande_maintenance.generer_bon_livraison_entreprise', compact('bon_livraison', 'date'));

            return $pdf->download('Bon_livraison_#BLM' . $bon_livraison->id . '.pdf');

            // return view('admin_page.gestion_bon_livraison.commande_maintenance.generer_bon_livraison_entreprise', compact('bon_livraison', 'date'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bon = new BonMaintenance();

        $bon->commande_maintenance_automobile_id = $request->command_id;

        $bon->save();

        return back()->with('success', 'Bon de livraison créé avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(BonMaintenance $bonMaintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BonMaintenance $bonMaintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BonMaintenance $bonMaintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BonMaintenance $bonMaintenance)
    {
        //
    }
}
