<?php

namespace App\Http\Controllers;

use App\Models\SouscrireAbonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
