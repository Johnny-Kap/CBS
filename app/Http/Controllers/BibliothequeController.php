<?php

namespace App\Http\Controllers;

use App\Models\Bibliotheque;
use App\Models\SouscrireAbonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BibliothequeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $bibliotheque_show = Bibliotheque::get();

        return view('admin_page.gestion_bibliotheque.consulter_document', compact('bibliotheque_show'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin_page.gestion_bibliotheque.ajouter_document');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ]);

        $filename = time() . '.' . $request->pdf->extension();

        $path = $request->file('pdf')->storeAs('documents', $filename, 'public');

        $bibliotheque = new Bibliotheque();

        $bibliotheque->titre = $request->titre;

        $bibliotheque->description = $request->description;

        $bibliotheque->pdf = $path;

        $bibliotheque->masked = 'no';

        $bibliotheque->user_id = Auth::user()->id;

        $bibliotheque->save();

        return back()->with('success', 'Document ajouté avec succès!');
    }

    public function verifier()
    {

        return view('bibliotheque.demande_document');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        $abonnementDispo = SouscrireAbonnement::where('numero_abonnement', $request->abonnement)
            ->where('user_id', Auth::user()->id)
            ->where('is_expired', 'no')
            ->where('etat', 'yes')
            ->count();

        $bibliotheque_display = Bibliotheque::where('masked', 'no')->simplePaginate(10);

        if ($abonnementDispo == 1) {

            return view('bibliotheque.bibliotheque_display', compact('bibliotheque_display'));
        } else {
            return back()->with('error', 'N° abonnement invalide ou non valable.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $affected = Bibliotheque::where('id', $request->bibliotheque_id)
            ->update([
                'titre' => $request->titre,
                'description' => $request->description,
            ]);

        return back()->with('success', 'Information(s) modifiée(s) avec succès.');
    }

    public function masked(Request $request)
    {

        $affected = Bibliotheque::where('id', $request->bibliotheque_id)
            ->update([
                'masked' => 'yes',
            ]);

        return back()->with('success', 'Masqué avec succès.');
    }

    public function demasked(Request $request)
    {

        $affected = Bibliotheque::where('id', $request->bibliotheque_id)
            ->update([
                'masked' => 'no',
            ]);

        return back()->with('success', 'Démasqué avec succès.');
    }

    public function edit_file(Request $request)
    {

        $request->validate([
            'pdf' => 'required|mimes:pdf',
        ]);

        $filename = time() . '.' . $request->pdf->extension();

        $path = $request->file('pdf')->storeAs('documents', $filename, 'public');

        $affected = Bibliotheque::where('id', $request->bibliotheque_id)
            ->update([
                'pdf' => $path,
            ]);

        return back()->with('success', 'Document modifié avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bibliotheque $bibliotheque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bibliotheque $bibliotheque)
    {
        //
    }
}
