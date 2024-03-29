<?php

namespace App\Http\Controllers;

use App\Models\LivraisonPanier;
use App\Models\ModePaiement;
use App\Models\SouscrireAbonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Laravel\Ui\Presets\React;
use PHPUnit\Metadata\RequiresPhp;

class LivraisonPanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('livraison_panier.demande_livraison');
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

            $mode_paiement = ModePaiement::all();

            return view('livraison_panier.formulaire_livraison', compact('numero_abonnement_valide', 'mode_paiement'));
        } else {
            return back()->with('error', 'N° abonnement invalide ou non valable.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $abonnement_valide = SouscrireAbonnement::where('numero_abonnement', $request->numero_abonnement_valide)->first();

        $commande_count = LivraisonPanier::where('numero_abonnement_valide', $request->numero_abonnement_valide)
            ->where('etat_commande', 'yes')
            ->where('user_id', Auth::user()->id)
            ->count();

        if ($commande_count <= $abonnement_valide->abonnements->nombre_livraison_panier) {

            if ($request->type_prestation == 'achat') {

                $numero_commande = 'ALP' . Carbon::now()->format('YmdHms');

                $commande = new LivraisonPanier();

                $commande->numero_commande = $numero_commande;

                $commande->type_prestation = $request->type_prestation;

                $commande->contenu_panier = $request->contenu_panier;

                $commande->date_livraison = $request->date_livraison;

                $commande->adresse_recuperation = $request->adresse_recuperation;

                $commande->adresse_livraison = $request->adresse_livraison;

                $commande->montant = $request->montant;

                $commande->mode_paiement = $request->mode_paiement;

                $commande->etat_commande = 'attente';

                $commande->etat_paiement = 'no';

                $commande->numero_abonnement_valide = $request->numero_abonnement_valide;

                $commande->user_id = Auth::user()->id;

                $commande->save();

                return redirect()->route('success.achat.livraison.panier');
            } elseif ($request->type_prestation == 'livraison') {

                $numero_commande = 'ALP' . Carbon::now()->format('YmdHms');

                $commande = new LivraisonPanier();

                $commande->numero_commande = $numero_commande;

                $commande->type_prestation = $request->type_prestation;

                $commande->contenu_panier = $request->contenu_panier;

                $commande->date_livraison = $request->date_livraison;

                $commande->adresse_recuperation = $request->adresse_recuperation;

                $commande->adresse_livraison = $request->adresse_livraison;

                $commande->etat_commande = 'attente';

                $commande->numero_abonnement_valide = $request->numero_abonnement_valide;

                $commande->user_id = Auth::user()->id;

                $commande->save();

                return redirect()->route('success.livraison.panier');
            }
        } else {

            return back()->with('error', 'Vous avez atteint la limite d\'offre de ce service avec votre abonnement');
        }
    }

    public function success_achat_livraison()
    {

        return view('livraison_panier.success_achat_livraison');
    }

    public function success_livraison()
    {

        return view('livraison_panier.success_livraison');
    }

    public function attente_achat_livraison()
    {

        $achat_livraison_attente = LivraisonPanier::where('etat_commande', 'attente')
            ->where('type_prestation', 'achat')
            ->simplePaginate(15);

        return view('admin_page.gestion_livraison_panier.attente_validation_achat_livraison', compact('achat_livraison_attente'));
    }

    public function validation_achat_livraison(Request $request)
    {

        $affected = LivraisonPanier::where('id', $request->commande_id)
            ->update([
                'etat_commande' => $request->etat,
            ]);

        return back()->with('success', 'Validé avec succès');
    }

    public function achat_livraison_paiement_non_soumis()
    {

        $achat_livraison_paiement_non_soumis = LivraisonPanier::where('etat_commande', 'yes')
            ->where('type_prestation', 'achat')
            ->where('image', null)
            ->simplePaginate(15);

        return view('admin_page.gestion_livraison_panier.achat_livraison_paiement_non_soumis', compact('achat_livraison_paiement_non_soumis'));
    }

    public function soumission_paiement_achat_livraison(Request $request)
    {

        if ($request->has('file')) {

            $request->validate([
                'file' => 'required|mimes:jpeg,png,jpg',
            ]);

            $filename = time() . '.' . $request->file->extension();

            $path = $request->file('file')->storeAs('images', $filename, 'public');

            $affected = LivraisonPanier::where('id', $request->commande_id)
                ->update([
                    'image' => $path,
                ]);

            return back()->with('success', 'Preuve de paiement soumis avec succès! Vous serez contacté après validation du paiement.');
        } else {
            return back()->with('error', 'Veuillez ajouté votre capture d\'écran.');
        }
    }

    public function validation_paiement_achat_livraison()
    {

        $achat_livraison_validation_paiement = LivraisonPanier::where('etat_commande', 'yes')
            ->where('type_prestation', 'achat')
            ->where('etat_paiement', 'no')
            ->whereNotNull('image')->simplePaginate(15);

        return view('admin_page.gestion_livraison_panier.achat_livraison_validation_paiement', compact('achat_livraison_validation_paiement'));
    }

    public function paiement_achat_livraison_valide(Request $request)
    {

        $affected = LivraisonPanier::where('id', $request->commande_id)
            ->update([
                'etat_paiement' => $request->etat,
            ]);

        return back()->with('success', 'Paiement validé avec succès');
    }

    public function achat_livraison_confirmees()
    {

        $achat_livraison_confirmees = LivraisonPanier::where('etat_commande', 'yes')
            ->where('etat_paiement', 'yes')
            ->whereNotNull('image')->simplePaginate(15);

        return view('admin_page.gestion_livraison_panier.achat_livraison_confirmees', compact('achat_livraison_confirmees'));
    }


    public function attente_livraison()
    {

        $livraison_attente = LivraisonPanier::where('etat_commande', 'attente')
            ->where('type_prestation', 'livraison')
            ->simplePaginate(15);

        return view('admin_page.gestion_livraison_panier.attente_validation_livraison', compact('livraison_attente'));
    }

    public function validation_livraison(Request $request)
    {

        $affected = LivraisonPanier::where('id', $request->commande_id)
            ->update([
                'etat_commande' => $request->etat,
            ]);

        return back()->with('success', 'Validé avec succès');
    }

    public function livraison_validee()
    {

        $livraison_validee = LivraisonPanier::where('etat_commande', 'yes')
            ->where('type_prestation', 'livraison')
            ->simplePaginate(15);

        return view('admin_page.gestion_livraison_panier.livraison_validee', compact('livraison_validee'));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $achat_livraison = LivraisonPanier::where('etat_commande', 'yes')
            ->where('type_prestation', 'achat')
            ->where('etat_paiement', 'no')
            ->where('user_id', Auth::user()->id)
            ->whereNotNull('image')->simplePaginate(15);


        return view('profile.confirmation_paiement', compact('achat_livraison'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LivraisonPanier $livraisonPanier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LivraisonPanier $livraisonPanier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LivraisonPanier $livraisonPanier)
    {
        //
    }
}
