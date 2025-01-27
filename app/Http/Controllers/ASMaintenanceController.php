<?php

namespace App\Http\Controllers;

use App\Models\ASMaintenance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ASMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $show = ASMaintenance::all();

        return view('admin_page.gestion_attestation.commande_maintenance.consulter_attestation', compact('show'));
    }

    public function generer(Request $request)
    {

        // Définir la locale en français
        Carbon::setLocale('fr');

        // Obtenir la date formatée
        $date = Carbon::now()->translatedFormat('d F Y');

        $attestation = ASMaintenance::find($request->attestation_id);

        if ($attestation->commandes->users->type_user == 'particulier') {
            $pdf = Pdf::loadView('admin_page.gestion_attestation.commande_maintenance.generer_attestation_particulier', compact('attestation', 'date'));

            return $pdf->download('Attestation_service_#ATTM' . $attestation->id . '.pdf');

            // return view('admin_page.gestion_attestation.commande_maintenance.generer_attestation_particulier', compact('attestation', 'date'));
        } else {
            $pdf = Pdf::loadView('admin_page.gestion_attestation.commande_maintenance.generer_attestation_entreprise', compact('attestation', 'date'));

            return $pdf->download('Attestation_service_#ATTM' . $attestation->id . '.pdf');

            // return view('admin_page.gestion_attestation.commande_maintenance.generer_attestation_entreprise', compact('attestation', 'date'));
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
        $attestion = new ASMaintenance();

        $attestion->commande_maintenance_automobile_id  = $request->numero_commande;

        $attestion->save();

        return back()->with('success', 'Attestation de service créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ASMaintenance $aSMaintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ASMaintenance $aSMaintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ASMaintenance $aSMaintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ASMaintenance $aSMaintenance)
    {
        //
    }
}
