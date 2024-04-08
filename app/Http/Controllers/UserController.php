<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function show()
    {

        $users = User::simplePaginate();

        return view('admin_page.gestion_utilisateurs.consulter_utilisateurs', compact('users'));
    }

    public function create()
    {

        return view('admin_page.gestion_utilisateurs.ajouter_utilisateurs');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profession' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'adresse' => ['required', 'string'],
            'cni' => ['required', 'string'],
            'date_delivrance_cni' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            // 'file' => 'mimes:jpeg,png,jpg'
        ]);

            // Ajouter image illustrative
            // $file = time() . '.' . $request->file->extension();

            // $path = $request->file('file')->storeAs('images', $file, 'public');

            $users_create = User::create([
                'name' => $request->name,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'password' => Hash::make($data['password']),
                'profession' => $request->profession,
                'date_naiss' => $request->date_naiss,
                'tel' => $request->tel,
                'adresse' => $request->adresse,
                'numero_cni' => $request->cni,
                'date_delivrance_cni' => $request->date_delivrance_cni,
                'numero_passport' => $request->numero_passport,
                'date_delivrance_passport' => $request->date_delivrance_passport,
                'bio' => $request->bio,
                'role' => $request->role,
            ]);

            return back()->with('success', 'Ajouté avec succès');
    }

    public function change_role(Request $request){

        $affected = User::where('id', $request->user_id)
            ->update([
                'role' => $request->role,
            ]);

        return back()->with('success', 'Rôle modifié avec succès.');

    }
}
