<?php

namespace App\Http\Controllers;

use App\Models\CommandeFormation;
use App\Models\CommandeLocation;
use App\Models\CommandeMaintenanceAutomobile;
use App\Models\LivraisonPanier;
use App\Models\LocationVehicule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $location = LocationVehicule::all();

        return view('home', compact('location'));
    }

    public function login_admin()
    {
        return view('admin_page.auth_admin.login_admin');
    }

    public function index_admin()
    {
        return view('admin_page.home_admin');
    }

    public function contact()
    {
        return view('contact');
    }

    public function propos()
    {
        return view('propos');
    }

    public function myprofile()
    {
        return view('profile.myprofile');
    }

    public function mes_parametres()
    {
        return view('profile.mysetting');
    }

    public function term_condition()
    {
        return view('term_condition');
    }

    public function term_condition_abonnement(){

        return view('term_condition_abonnement');
    }

    public function mon_historique_commande(){

        $commande_location = CommandeLocation::where('user_id', Auth::user()->id)->simplePaginate(15);

        $achat_livraison = LivraisonPanier::where('user_id', Auth::user()->id)->simplePaginate(15);

        $commande_maintenance = CommandeMaintenanceAutomobile::where('user_id', Auth::user()->id)->simplePaginate(15);

        $commande_formation = CommandeFormation::where('user_id', Auth::user()->id)->simplePaginate(15);

        return view('profile.historique_commande', compact('commande_location','achat_livraison','commande_maintenance','commande_formation'));

    }

    public function photoEdited(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('file')) {

            $filename = time() . '.' . $request->file->extension();

            $path = $request->file('file')->storeAs('avatars', $filename, 'public');

            $ids = Auth::user()->id;

            $affected = User::where('id', $ids)
                ->update([
                    'image' => $path,
                ]);

            return back()->with('success', 'Photo de profil ajouté avec succès!');
        } else {

            return back()->with('error', 'Veuillez selectionner une photo de profil!');
        }
    }

    public function updateProfil(Request $request)
    {

        $affected = User::where('id', Auth::user()->id)
            ->update([
                'name' => $request->name,
                'prenom' => $request->prenom,
                'profession' => $request->profession,
                'date_naiss' => $request->date_naiss,
                'tel' => $request->tel,
                'adresse' => $request->adresse,
                'numero_cni' => $request->numero_cni,
                'date_delivrance_cni' => $request->date_delivrance_cni,
                'numero_passport' => $request->numero_passport,
                'date_delivrance_passport' => $request->date_delivrance_passport,
                'bio' => $request->bio,
            ]);

        return back()->with('success', 'Modification éffectuée avec succès!');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'old_password' => 'required|min:8|max:100',
            'new_password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:new_password'
        ]);

        $current_user = Auth::user();

        if (Hash::check($request->old_password, $current_user->password)) {

            $change = User::where('id', $current_user->id)->update([
                'password' => bcrypt($request->new_password)
            ]);

            return back()->with('success', 'Mot de passe modifié avec succès!');
        } else {

            return back()->with('error', 'Ancien mot de passe incorrecte.');
        }
    }

    public function updateEmail(Request $request)
    {

        $my_id = Auth::user()->id;

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $my_id = Auth::user()->id;

        if (Auth::user()->email != $request->email) {

            $change = User::where('id', $my_id)
                ->update([
                    'email' => $request->email,
                    'email_verified_at' => NULL,
                ]);

            // $newEmailAddress = User::select('email')->where('id', '=', $my_id)->first();

            // $newEmailAddress->sendEmailVerificationNotification();

            return back()->with('success', 'Email modifié avec succès! Vous recevrez un courriel de confirmation de votre email.');
        } else {

            return back()->with('error', 'Insérer un email différent de celui actuel.');
        }
    }

    public function user_profile($id){

        $user = User::find($id);

        return view('admin_page.client_profile.client_profile', compact('user'));
    }
}
