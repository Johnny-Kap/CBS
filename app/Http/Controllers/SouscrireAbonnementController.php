<?php

namespace App\Http\Controllers;

use App\Mail\SuccessSouscriptionAbonnement;
use App\Models\Abonnement;
use App\Models\SouscrireAbonnement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SouscrireAbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mes_abonnements = SouscrireAbonnement::where('user_id', Auth::user()->id)->simplePaginate(10);

        return view('profile.mes-abonnements', compact('mes_abonnements'));
    }

    public function souscrire_formulaire(){

        $abonnements = Abonnement::all();

        $users = User::all();

        return view('admin_page.gestion_abonnement.creer_souscription', compact('abonnements','users'));
    }

    public function souscrire_new(Request $request){

            $abonnement = Abonnement::find($request->abonnement_id);

            $numero_abonnement = $abonnement->code . Carbon::now()->format('dmYHms');

            //Enregistrement

            $add = new SouscrireAbonnement();

            $add->numero_abonnement = $numero_abonnement;

            $add->etat = 'yes';

            $add->date_expiration = Carbon::now()->addMonth()->format('d-m-Y');

            $add->is_expired = 'no';

            $add->is_buy = 'yes';

            $add->montant = $abonnement->montant;

            $add->abonnement_id = $request->abonnement_id;

            $add->user_id = $request->user_id;

            $add->save();

            // $souscription_abonnement = SouscrireAbonnement::where('numero_abonnement', $numero_abonnement)->first();

            // Mail::to(Auth::user()->email)->send(new SuccessSouscriptionAbonnement($souscription_abonnement));

            return back()->with('success','Abonnement créé avec succès!');

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SouscrireAbonnement $souscrireAbonnement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SouscrireAbonnement $souscrireAbonnement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SouscrireAbonnement $souscrireAbonnement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SouscrireAbonnement $souscrireAbonnement)
    {
        //
    }
}
