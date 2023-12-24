<?php

use App\Models\LocationVehicule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $location = LocationVehicule::all();

    return view('welcome', compact('location'));
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/propos', [App\Http\Controllers\HomeController::class, 'propos'])->name('propos');

// Gestion des locations
Route::get('/location-list', [App\Http\Controllers\LocationVehiculeController::class, 'list'])->name('location.list');
Route::get('/location-detail/{id}/{name}', [App\Http\Controllers\LocationVehiculeController::class, 'show'])->name('location.details');
Route::get('/paiement-location', [App\Http\Controllers\LocationVehiculeController::class, 'verifierDispo'])->name('verifier.location')->middleware('auth');
Route::get('/comande/location/{location_id}/{compte_id}/{date_heure_depart}/{date_heure_arrivee}/{mode_paiement}/{total_tarif}/{diff}', [App\Http\Controllers\CommandeLocationController::class, 'create'])->middleware('auth')->name('location.paiement');
Route::get('/successfully-commande', [App\Http\Controllers\CommandeLocationController::class, 'success'])->name('sucess');


/* ------------- Routes de l'Admin --------------*/


Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'login_admin'])->name('login.admin');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index_admin'])->name('home.admin');

    //Gestion type de vehicule
    Route::get('/admin/type_vehicule/consulter', [App\Http\Controllers\TypeVehiculeController::class, 'index'])->name('type_vehicule.consulter');
    Route::get('/admin/type_vehicule/ajouter', [App\Http\Controllers\TypeVehiculeController::class, 'create'])->name('type_vehicule.ajouter');
    Route::post('/admin/type_vehicule/add', [App\Http\Controllers\TypeVehiculeController::class, 'store'])->name('type_vehicule.add');

    //Gestion des vehicules
    Route::get('/admin/vehicule/consulter', [App\Http\Controllers\VehiculeController::class, 'index'])->name('vehicule.consulter');
    Route::get('/admin/vehicule/ajouter', [App\Http\Controllers\VehiculeController::class, 'create'])->name('vehicule.ajouter');
    Route::post('/admin/vehicule/add', [App\Http\Controllers\VehiculeController::class, 'store'])->name('vehicule.add');

    //Gestion location
    Route::get('/admin/location/consulter', [App\Http\Controllers\LocationVehiculeController::class, 'index'])->name('location.consulter');
    Route::get('/admin/location/ajouter', [App\Http\Controllers\LocationVehiculeController::class, 'create'])->name('location.ajouter');
    Route::post('/admin/location/add', [App\Http\Controllers\LocationVehiculeController::class, 'store'])->name('location.add');

    //Gestion de recharge
    Route::get('/admin/mode_paiement/consulter', [App\Http\Controllers\ModePaiementController::class, 'index'])->name('mode_paiement.consulter');
    Route::get('/admin/mode_paiement/ajouter', [App\Http\Controllers\ModePaiementController::class, 'create'])->name('mode_paiement.ajouter');
    Route::post('/admin/mode_paiement/add', [App\Http\Controllers\ModePaiementController::class, 'store'])->name('mode_paiement.add');
});
