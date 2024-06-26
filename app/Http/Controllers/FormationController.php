<?php

namespace App\Http\Controllers;

use App\Models\CommandeFormation;
use App\Models\Formation;
use App\Models\ModePaiement;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $formations = Formation::all();

        return view('admin_page.gestion_formation.consulter_formation', compact('formations'));
    }

    public function list()
    {

        $formations_list = Formation::where('is_masked', 'no')
            ->where('is_expired', 'no')
            ->simplePaginate(10);

        return view('formation.formation_list', compact('formations_list'));
    }

    public function PasserCommande(Request $request){

        $formations_place_count = CommandeFormation::where('formation_id', $request->formation_id)->sum('nb_place_commande');

        $formation = Formation::find($request->formation_id);

        $nb_place_restant = $formation->nb_place - $formations_place_count;

        if($request->nb_place_commande < $nb_place_restant){

            $montant_total = $formation->montant * $request->nb_place_commande;

            $nb_place_commande = $request->nb_place_commande;

            $type_cours = $request->moyen_diffusion;

            $mode_paiements = ModePaiement::all();

            return view('formation.formation_booking', compact('formation','montant_total','nb_place_commande','mode_paiements','type_cours'));

        }else{

            return back()->with('error','Nombre de place indisponible.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin_page.gestion_formation.ajouter_formation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $data = $request->validate([
        //     'email_formateur' => ['string', 'email', 'max:255'],
        //     // 'file' => 'mimes:jpeg,png,jpg'
        // ]);

        // Ajouter image illustrative
        // $file = time() . '.' . $request->file->extension();

        // $path = $request->file('file')->storeAs('images', $file, 'public');

        $users_create = Formation::create([
            'theme' => $request->theme,
            'description' => $request->description,
            'duree' => $request->duree,
            'date_formation' => $request->date_formation,
            'heure_debut' => $request->heure_debut,
            'heure_fin' => $request->heure_fin,
            'nb_place' => $request->nb_place,
            'lieu' => $request->lieu,
            'moyen_diffusion' => $request->moyen_diffusion,
            'montant' => $request->montant,
            'is_expired' => 'no',
            'is_masked' => 'no',
            'nom_formateur' => $request->nom_formateur,
            'prenom_formateur' => $request->prenom_formateur,
            'tel_formateur' => $request->tel_formateur,
            'email_formateur' => $request->email_formateur,
        ]);

        return back()->with('success', 'Ajouté avec succès');
    }

    public function masked(Request $request)
    {

        $affected = Formation::where('id', $request->formation_id)
            ->update([
                'is_masked' => 'yes',
            ]);

        return back()->with('success', 'Masqué avec succès.');
    }

    public function demasked(Request $request)
    {

        $affected = Formation::where('id', $request->formation_id)
            ->update([
                'is_masked' => 'no',
            ]);

        return back()->with('success', 'Démasqué avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $formationShow = Formation::find($id);

        $formations_place_count = CommandeFormation::where('formation_id', $formationShow->id)->sum('nb_place_commande');

        $nb_place_restant = $formationShow->nb_place - $formations_place_count;

        return view('formation.formation_details', compact('formationShow','nb_place_restant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $affected = Formation::where('id', $request->formation_id)
            ->update([
                'theme' => $request->theme,
                'description' => $request->description,
                'duree' => $request->duree,
                'date_formation' => $request->date_formation,
                'heure_debut' => $request->heure_debut,
                'heure_fin' => $request->heure_fin,
                'nb_place' => $request->nb_place,
                'lieu' => $request->lieu,
                'moyen_diffusion' => $request->moyen_diffusion,
                'montant' => $request->montant,
                'nom_formateur' => $request->nom_formateur,
                'prenom_formateur' => $request->prenom_formateur,
                'tel_formateur' => $request->tel_formateur,
                'email_formateur' => $request->email_formateur,
            ]);

        return back()->with('success', 'Information(s) modifiée(s) avec succès.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        //
    }
}
