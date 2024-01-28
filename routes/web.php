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
Route::get('/term-conditions', [App\Http\Controllers\HomeController::class, 'term_condition'])->name('term_condition');

// Gestion des locations
Route::get('/location-list', [App\Http\Controllers\LocationVehiculeController::class, 'list'])->name('location.list');
Route::get('/location-detail/{id}/{name}', [App\Http\Controllers\LocationVehiculeController::class, 'show'])->name('location.details');
Route::get('/paiement-location', [App\Http\Controllers\LocationVehiculeController::class, 'verifierDispo'])->name('verifier.location')->middleware('auth');
Route::get('/comande/location/{location_id}/{date_heure_depart}/{date_heure_arrivee}/{mode_paiement}/{total_tarif}/{diff}', [App\Http\Controllers\CommandeLocationController::class, 'create'])->middleware('auth')->name('location.paiement');
Route::get('/successfully-commande', [App\Http\Controllers\CommandeLocationController::class, 'success'])->name('success');

// Mon profil utilisateur
Route::get('/myprofile', [App\Http\Controllers\HomeController::class, 'myprofile'])->name('myprofile')->middleware('auth');
Route::get('/myprofile/confirmation-paiement', [App\Http\Controllers\CommandeLocationController::class, 'confirmation_paiement'])->name('myprofile.confirmation_paiement')->middleware('auth');
Route::post('/myprofile/soumission-paiement', [App\Http\Controllers\CommandeLocationController::class, 'soumission_paiement'])->name('soumission_paiement')->middleware('auth');
Route::get('/myprofile/confirmation-abonnement', [App\Http\Controllers\AbonnementController::class, 'confirmation_abonnement'])->name('myprofile.confirmation_abonnement')->middleware('auth');
Route::post('/myprofile/abonnement/soumission-paiement', [App\Http\Controllers\AbonnementController::class, 'soumission_paiement'])->name('abonnement.soumission_paiement')->middleware('auth');
Route::get('/myprofile/mes-abonnements', [App\Http\Controllers\SouscrireAbonnementController::class, 'index'])->name('myprofile.abonnements')->middleware('auth');


// Les abonnements
Route::get('/abonnement-list', [App\Http\Controllers\AbonnementController::class, 'index'])->name('abonnement.index');
Route::post('/souscription-abonnement', [App\Http\Controllers\AbonnementController::class, 'souscrire'])->name('souscrire.abonnement')->middleware('auth');
Route::get('/successfully-souscription-abonnement', [App\Http\Controllers\AbonnementController::class, 'success'])->name('success.abonnement');


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

    // Gestion des commandes de location
    Route::get('/admin/commande_location/attente', [App\Http\Controllers\CommandeLocationController::class, 'index'])->name('commande_location.attente');
    Route::post('/admin/commande_location/change/etat', [App\Http\Controllers\CommandeLocationController::class, 'validation_commande'])->name('commande_location.validation.etat');
    Route::get('/admin/commande_location/commande_validee', [App\Http\Controllers\CommandeLocationController::class, 'commande_validee'])->name('commande_location.commande_validee');
    Route::get('/admin/commande_location/validation-paiement', [App\Http\Controllers\CommandeLocationController::class, 'validation_paiement'])->name('commande_location.validation_paiement');
    Route::post('/admin/commande_location/paiement/validee', [App\Http\Controllers\CommandeLocationController::class, 'paiement_valide'])->name('commande_location.paiement.valide');
    Route::get('/admin/commande_location/commande-confirmees', [App\Http\Controllers\CommandeLocationController::class, 'commande_confirmees'])->name('commande_location.commande_confirmees');

    // Gestion des abonnements
    Route::get('/admin/abonnement/type/ajouter', [App\Http\Controllers\TypeAbonnementController::class, 'create'])->name('type_abonnement.ajouter');
    Route::post('/admin/abonnement/type/add', [App\Http\Controllers\TypeAbonnementController::class, 'store'])->name('type_abonnement.add');
    Route::get('/admin/abonnement/type/consulter', [App\Http\Controllers\TypeAbonnementController::class, 'index'])->name('type_abonnement.consulter');
    Route::get('/admin/abonnement/ajouter', [App\Http\Controllers\AbonnementController::class, 'create'])->name('abonnement.ajouter');
    Route::post('/admin/abonnement/add', [App\Http\Controllers\AbonnementController::class, 'store'])->name('abonnement.add');
    Route::get('/admin/abonnement/consulter', [App\Http\Controllers\AbonnementController::class, 'show'])->name('abonnement.consulter');
    Route::get('/admin/abonnement/ajouter', [App\Http\Controllers\AbonnementController::class, 'create'])->name('abonnement.ajouter');

    //Gestion de la souscription des abonnements
    Route::get('/admin/souscrire-abonnement/attente-paiement', [App\Http\Controllers\AbonnementController::class, 'attente_paiement'])->name('abonnement.attente.paiement');
    Route::get('/admin/souscrire-abonnement/attente', [App\Http\Controllers\AbonnementController::class, 'attente'])->name('abonnement.attente');
    Route::get('/admin/souscrire-abonnement/confirmes', [App\Http\Controllers\AbonnementController::class, 'confirmes'])->name('abonnement.confirmes');
    Route::post('/admin/souscrire-abonnement/paiement/validee', [App\Http\Controllers\AbonnementController::class, 'confirmer_souscription'])->name('abonnement.paiement.valide');
    Route::get('/admin/souscrire-abonnement/expires', [App\Http\Controllers\AbonnementController::class, 'expires'])->name('abonnement.expires');

});
