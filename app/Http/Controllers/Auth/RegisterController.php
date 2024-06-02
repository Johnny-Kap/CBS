<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profession' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'adresse' => ['required', 'string'],
            'niu' => ['string'],
            'residence' => ['required','string'],
            'numero_cni',
            'date_delivrance_cni',
            'numero_passport',
            'date_delivrance_passport',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'profession' => $data['profession'],
            'tel' => $data['tel'],
            'adresse' => $data['adresse'],
            'niu' => $data['niu'],
            'residence' => $data['residence'],
            'numero_cni' => $data['numero_cni'],
            'date_delivrance_cni' => $data['date_delivrance_cni'],
            'numero_passport' => $data['numero_passport'],
            'date_delivrance_passport' => $data['date_delivrance_passport'],
            'password' => Hash::make($data['password']),
        ]);
    }
}