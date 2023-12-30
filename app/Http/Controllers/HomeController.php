<?php

namespace App\Http\Controllers;

use App\Models\LocationVehicule;
use Illuminate\Http\Request;

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

    public function login_admin(){
        return view('admin_page.auth_admin.login_admin');
    }

    public function index_admin(){
        return view('admin_page.home_admin');
    }

    public function contact(){
        return view('contact');
    }

    public function propos(){
        return view('propos');
    }

    public function myprofile(){
        return view('profile.myprofile');
    }

}