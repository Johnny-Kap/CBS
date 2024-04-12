<?php

namespace App\Http\Controllers;

use App\Models\CommandeFormation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeFormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg',
        ]);

        $filename = time() . '.' . $request->file->extension();

        $path = $request->file('file')->storeAs('images', $filename, 'public');
        
        $numero_commande = 'CF' . Carbon::now()->format('YmdHm');

        $add = new CommandeFormation();

        $add->numero_commande = $numero_commande;

        $add->montant_total = $request->montant_total;

        $add->nb_place_commande = $request->nb_place_commande;

        $add->etat_commande = 'yes';

        $add->etat_paiement = 'no';

        $add->photo = $path;

        $add->type_cours = $request->type_cours;

        $add->mode_paiement_id = $request->mode_paiement_id;

        $add->formation_id = $request->formation_id;

        $add->user_id = Auth::user()->id;

        $add->save();

        return redirect()->route('success.formation');
    }

    public function success(){

        return view('formation.success_commande_formation');
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
    public function show(CommandeFormation $commandeFormation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommandeFormation $commandeFormation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommandeFormation $commandeFormation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommandeFormation $commandeFormation)
    {
        //
    }
}
