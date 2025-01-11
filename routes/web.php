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

    $location = LocationVehicule::take(3)->get();

    return view('welcome', compact('location'));
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/propos', [App\Http\Controllers\HomeController::class, 'propos'])->name('propos');
Route::get('/term-conditions', [App\Http\Controllers\HomeController::class, 'term_condition'])->name('term_condition');
Route::get('/term-conditions/abonnement', [App\Http\Controllers\HomeController::class, 'term_condition_abonnement'])->name('term_condition.abonnement');

// Gestion des locations
Route::get('/location-list', [App\Http\Controllers\LocationVehiculeController::class, 'list'])->name('location.list');
Route::get('/location-detail/{id}/{name}', [App\Http\Controllers\LocationVehiculeController::class, 'show'])->name('location.details');
Route::get('/paiement-location', [App\Http\Controllers\LocationVehiculeController::class, 'verifierDispo'])->name('verifier.location')->middleware('auth');
Route::get('/comande/location/{location_id}/{date_heure_depart}/{date_heure_arrivee}/{total_tarif}/{diff}/{abonnement}/{rabais}/{montant_rabais}', [App\Http\Controllers\CommandeLocationController::class, 'create'])->middleware('auth')->name('location.paiement');
Route::get('/successfully-commande', [App\Http\Controllers\CommandeLocationController::class, 'success'])->name('success');
Route::get('/location_list/action', [App\Http\Controllers\LocationVehiculeController::class, 'action'])->name('location_list.action');
Route::get('/location-list/filter', [App\Http\Controllers\LocationVehiculeController::class, 'filter'])->name('location.filter');
Route::get('/location-list/search', [App\Http\Controllers\LocationVehiculeController::class, 'search'])->name('location.search');

// Mon profil utilisateur
Route::get('/myprofile', [App\Http\Controllers\HomeController::class, 'myprofile'])->name('myprofile')->middleware('auth');
Route::get('/myprofile/parametres', [App\Http\Controllers\HomeController::class, 'mes_parametres'])->name('myprofile.modifier')->middleware('auth');
Route::get('/myprofile/confirmation-paiement', [App\Http\Controllers\CommandeLocationController::class, 'confirmation_paiement'])->name('myprofile.confirmation_paiement')->middleware('auth');
Route::post('/myprofile/soumission-paiement', [App\Http\Controllers\CommandeLocationController::class, 'soumission_paiement'])->name('soumission_paiement')->middleware('auth');
Route::post('/myprofile/soumission-paiement/achat_livraison', [App\Http\Controllers\LivraisonPanierController::class, 'soumission_paiement_achat_livraison'])->name('soumission_paiement.achat_livraison')->middleware('auth');
Route::post('/myprofile/soumission-paiement/commande_maintenance', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'soumission_paiement_commande_maintenance'])->name('soumission_paiement.commande_maintenance')->middleware('auth');
Route::post('/myprofile/soumission-paiement/commande_formation', [App\Http\Controllers\CommandeFormationController::class, 'soumission_paiement_commande_formation'])->name('soumission_paiement.commande_formation')->middleware('auth');
Route::post('/myprofile/soumission-paiement/expression-besoin-formation', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'soumission_paiement_expression_besoin'])->name('soumission_paiement_expression_besoin')->middleware('auth');
Route::get('/myprofile/confirmation-abonnement', [App\Http\Controllers\AbonnementController::class, 'confirmation_abonnement'])->name('myprofile.confirmation_abonnement')->middleware('auth');
Route::post('/myprofile/abonnement/soumission-paiement', [App\Http\Controllers\AbonnementController::class, 'soumission_paiement'])->name('abonnement.soumission_paiement')->middleware('auth');
Route::get('/myprofile/mes-abonnements', [App\Http\Controllers\SouscrireAbonnementController::class, 'index'])->name('myprofile.abonnements')->middleware('auth');
Route::get('/myprofile/historique-commande', [App\Http\Controllers\HomeController::class, 'mon_historique_commande'])->name('myprofile.historique.commande')->middleware('auth');
Route::post('/myprofile/parametres/photo-change', [App\Http\Controllers\HomeController::class, 'photoEdited'])->name('myprofile.parametres.photo.change')->middleware('auth');
Route::post('/myprofile/parametres/update-profil', [App\Http\Controllers\HomeController::class, 'updateProfil'])->name('myprofile.parametres.update.profil')->middleware('auth');
Route::post('/myprofile/parametres/update-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('myprofile.parametres.update.password')->middleware('auth');
Route::post('/myprofile/parametres/update-email', [App\Http\Controllers\HomeController::class, 'updateEmail'])->name('myprofile.parametres.update.email')->middleware('auth');


// Les abonnements
Route::get('/abonnement-list', [App\Http\Controllers\AbonnementController::class, 'index'])->name('abonnement.index');
Route::get('/abonnement-confirm', [App\Http\Controllers\AbonnementController::class, 'SouscrireConfirm'])->name('abonnement.confirm')->middleware('auth');
Route::post('/souscription-abonnement', [App\Http\Controllers\AbonnementController::class, 'souscrire'])->name('souscrire.abonnement')->middleware('auth');
Route::get('/successfully-souscription-abonnement', [App\Http\Controllers\AbonnementController::class, 'success'])->name('success.abonnement');


// Gestion des maintenances
Route::get('/commande-maintenance-automobile', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'index'])->name('commande.maintenance.auto');
Route::get('/commande-maintenance-automobile/verification', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'create'])->name('commande.maintenance.auto.verify')->middleware('auth');
Route::post('/commande-maintenance-automobile/add', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'store'])->name('commande.maintenance.auto.add')->middleware('auth');
Route::get('/commande-maintenance-automobile/successfully-commande-maintenance', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'success'])->name('success.commande.maintenance');


// Gestion des réservations des appartements / hotels
Route::get('/commande-reservation-appartement-hotel', [App\Http\Controllers\CommandeReservationAppartementHotelController::class, 'index'])->name('commande.reservation.appart.hotel');
Route::get('/commande-reservation-appartement-hotel/formulaire', [App\Http\Controllers\CommandeReservationAppartementHotelController::class, 'create'])->name('commande.reservation.appart.hotel.verify')->middleware('auth');
Route::post('/commande-reservation-appartement-hotel/add', [App\Http\Controllers\CommandeReservationAppartementHotelController::class, 'store'])->name('commande.reservation.appart.hotel.add')->middleware('auth');
Route::get('/commande-reservation-appartement-hotel/successfully-commande', [App\Http\Controllers\CommandeReservationAppartementHotelController::class, 'success'])->name('success.commande.reservation');


// Gestion de la gestion bibliothèques
Route::get('/bibliotheque/entrer-abonnement', [App\Http\Controllers\BibliothequeController::class, 'verifier'])->name('bibliotheque.verifier');
Route::get('/bibliotheque/access', [App\Http\Controllers\BibliothequeController::class, 'show'])->name('bibliotheque.show')->middleware('auth');

// Gestion de la livraison / Achat des paniers
Route::get('/livraison-panier', [App\Http\Controllers\LivraisonPanierController::class, 'index'])->name('livraison.panier');
Route::get('/livraison-panier/formulaire', [App\Http\Controllers\LivraisonPanierController::class, 'create'])->name('livraison.panier.verify')->middleware('auth');
Route::post('/livraison-panier/add', [App\Http\Controllers\LivraisonPanierController::class, 'store'])->name('livraison.panier.add')->middleware('auth');
Route::get('/livraison-panier/successfully-commande/achat_livraison', [App\Http\Controllers\LivraisonPanierController::class, 'success_achat_livraison'])->name('success.achat.livraison.panier');
Route::get('/livraison-panier/successfully-commande/livraison', [App\Http\Controllers\LivraisonPanierController::class, 'success_livraison'])->name('success.livraison.panier');


// Gestion des formations
Route::get('/formation-list', [App\Http\Controllers\FormationController::class, 'list'])->name('formation.list');
Route::get('/formation-detail/{id}/{name}', [App\Http\Controllers\FormationController::class, 'show'])->name('formation.details');
Route::get('/formation-detail-confirm', [App\Http\Controllers\FormationController::class, 'PasserCommande'])->name('passer.commande.formation')->middleware('auth');
Route::post('/formation/commander', [App\Http\Controllers\CommandeFormationController::class, 'create'])->name('commande.formation.add')->middleware('auth');
Route::get('/successfully-commande-formation', [App\Http\Controllers\CommandeFormationController::class, 'success'])->name('success.formation');

// Gestion des expressions de besoin des formations
Route::get('/expression-besoin-formation/commander', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'create'])->name('besoin.formation.create')->middleware('auth');
Route::post('/expression-besoin-formation/add', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'store'])->name('besoin.formation.store')->middleware('auth');
Route::get('/successfully-expression-besoin-formation', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'success'])->name('success.besoin.formation');



/* ------------- Routes de l'Admin --------------*/


Route::get('/admin/login', [App\Http\Controllers\HomeController::class, 'login_admin'])->name('login.admin');
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index_admin'])->name('home.admin');

    //Gestion du dashboard
    Route::get('/admin/dashboard/clients', [App\Http\Controllers\HomeController::class, 'clients'])->name('admin.dashboard.clients');
    Route::get('/admin/dashboard/chiffres-affaires/location', [App\Http\Controllers\HomeController::class, 'ca_location'])->name('admin.dashboard.ca_location');
    Route::get('/admin/dashboard/chiffres-affaires/maintenance-automobile', [App\Http\Controllers\HomeController::class, 'ca_maintenance'])->name('admin.dashboard.ca_maintenance');
    Route::get('/admin/dashboard/chiffres-affaires/formation', [App\Http\Controllers\HomeController::class, 'ca_formation'])->name('admin.dashboard.ca_formation');
    Route::get('/admin/dashboard/chiffres-affaires/expression-besoin-formation', [App\Http\Controllers\HomeController::class, 'ca_expression_besoin_formation'])->name('admin.dashboard.ca_expression_besoin_formation');
    Route::get('/admin/dashboard/chiffres-affaires/achat-livraison', [App\Http\Controllers\HomeController::class, 'ca_achat_livraison'])->name('admin.dashboard.ca_achat_livraison');
    Route::get('/admin/dashboard/chiffres-affaires/livraison', [App\Http\Controllers\HomeController::class, 'ca_livraison'])->name('admin.dashboard.ca_livraison');
    Route::get('/admin/dashboard/chiffres-affaires/assistance-reservation-hotel-appart', [App\Http\Controllers\HomeController::class, 'ca_assistance_reservation'])->name('admin.dashboard.ca_assistance_reservation');
    Route::get('/admin/dashboard/centre-controle', [App\Http\Controllers\UserSessionController::class, 'index'])->name('admin.dashboard.centre_controle');

    //Gestion du profil
    Route::get('/admin/user-profile/details/{id}/{name}', [App\Http\Controllers\HomeController::class, 'user_profile'])->name('user.profile.details');
    Route::get('/admin/myprofile', [App\Http\Controllers\HomeController::class, 'profile_admin'])->name('admin.profile');

    //Gestion type de vehicule
    Route::get('/admin/type_vehicule/consulter', [App\Http\Controllers\TypeVehiculeController::class, 'index'])->name('type_vehicule.consulter');
    Route::get('/admin/type_vehicule/ajouter', [App\Http\Controllers\TypeVehiculeController::class, 'create'])->name('type_vehicule.ajouter');
    Route::post('/admin/type_vehicule/add', [App\Http\Controllers\TypeVehiculeController::class, 'store'])->name('type_vehicule.add');
    Route::post('/admin/type_vehicule/edit', [App\Http\Controllers\TypeVehiculeController::class, 'edit'])->name('type_vehicule.edit');

    // Gestion des marques de véhicule
    Route::get('/admin/marque/consulter', [App\Http\Controllers\MarqueController::class, 'index'])->name('marque.consulter');
    Route::get('/admin/marque/ajouter', [App\Http\Controllers\MarqueController::class, 'create'])->name('marque.ajouter');
    Route::post('/admin/marque/add', [App\Http\Controllers\MarqueController::class, 'store'])->name('marque.add');
    Route::post('/admin/marque/edit', [App\Http\Controllers\MarqueController::class, 'edit'])->name('marque.edit');

    //Gestion des vehicules
    Route::get('/admin/vehicule/consulter', [App\Http\Controllers\VehiculeController::class, 'index'])->name('vehicule.consulter');
    Route::get('/admin/vehicule/ajouter', [App\Http\Controllers\VehiculeController::class, 'create'])->name('vehicule.ajouter');
    Route::post('/admin/vehicule/add', [App\Http\Controllers\VehiculeController::class, 'store'])->name('vehicule.add');
    Route::post('/admin/vehicule/edit', [App\Http\Controllers\VehiculeController::class, 'edit'])->name('vehicule.edit');
    Route::post('/admin/vehicule/edit/images', [App\Http\Controllers\VehiculeController::class, 'edit_images'])->name('vehicule.edit.images');

    //Gestion location
    Route::get('/admin/location/consulter', [App\Http\Controllers\LocationVehiculeController::class, 'index'])->name('location.consulter');
    Route::get('/admin/location/ajouter', [App\Http\Controllers\LocationVehiculeController::class, 'create'])->name('location.ajouter');
    Route::post('/admin/location/add', [App\Http\Controllers\LocationVehiculeController::class, 'store'])->name('location.add');
    Route::post('/admin/location/edit', [App\Http\Controllers\LocationVehiculeController::class, 'edit'])->name('location.edit');
    Route::post('/admin/location/masked', [App\Http\Controllers\LocationVehiculeController::class, 'masked'])->name('location.masked');
    Route::post('/admin/location/demasked', [App\Http\Controllers\LocationVehiculeController::class, 'demasked'])->name('location.demasked');

    //Gestion des modes de paiement
    Route::get('/admin/mode_paiement/consulter', [App\Http\Controllers\ModePaiementController::class, 'index'])->name('mode_paiement.consulter');
    Route::get('/admin/mode_paiement/ajouter', [App\Http\Controllers\ModePaiementController::class, 'create'])->name('mode_paiement.ajouter');
    Route::post('/admin/mode_paiement/add', [App\Http\Controllers\ModePaiementController::class, 'store'])->name('mode_paiement.add');
    Route::post('/admin/mode_paiement/edit', [App\Http\Controllers\ModePaiementController::class, 'edit'])->name('mode_paiement.edit');

    // Gestion des commandes de location
    Route::get('/admin/commande_location/attente', [App\Http\Controllers\CommandeLocationController::class, 'index'])->name('commande_location.attente');
    Route::post('/admin/commande_location/change/etat', [App\Http\Controllers\CommandeLocationController::class, 'validation_commande'])->name('commande_location.validation.etat');
    Route::post('/admin/commande_location/modifier', [App\Http\Controllers\CommandeLocationController::class, 'modifier_commande'])->name('commande_location.modifier');
    Route::get('/admin/commande_location/annulee', [App\Http\Controllers\CommandeLocationController::class, 'commande_annulee'])->name('commande_location.annulee');
    Route::get('/admin/commande_location/paiement-non-soumis', [App\Http\Controllers\CommandeLocationController::class, 'paiement_non_soumis'])->name('commande_location.commande_paiement_non_soumis');
    Route::get('/admin/commande_location/validation-paiement', [App\Http\Controllers\CommandeLocationController::class, 'validation_paiement'])->name('commande_location.validation_paiement');
    Route::post('/admin/commande_location/paiement/validee', [App\Http\Controllers\CommandeLocationController::class, 'paiement_valide'])->name('commande_location.paiement.valide');
    Route::get('/admin/commande_location/commande-confirmees', [App\Http\Controllers\CommandeLocationController::class, 'commande_confirmees'])->name('commande_location.commande_confirmees');

    // Gestion des abonnements
    Route::get('/admin/abonnement/type/ajouter', [App\Http\Controllers\TypeAbonnementController::class, 'create'])->name('type_abonnement.ajouter');
    Route::post('/admin/abonnement/type/add', [App\Http\Controllers\TypeAbonnementController::class, 'store'])->name('type_abonnement.add');
    Route::post('/admin/abonnement/type/edit', [App\Http\Controllers\TypeAbonnementController::class, 'edit'])->name('type_abonnement.edit');
    Route::get('/admin/abonnement/type/consulter', [App\Http\Controllers\TypeAbonnementController::class, 'index'])->name('type_abonnement.consulter');
    Route::get('/admin/abonnement/ajouter', [App\Http\Controllers\AbonnementController::class, 'create'])->name('abonnement.ajouter');
    Route::post('/admin/abonnement/add', [App\Http\Controllers\AbonnementController::class, 'store'])->name('abonnement.add');
    Route::post('/admin/abonnement/edit', [App\Http\Controllers\AbonnementController::class, 'edit'])->name('abonnement.edit');
    Route::post('/admin/abonnement/masked', [App\Http\Controllers\AbonnementController::class, 'masked'])->name('abonnement.masked');
    Route::post('/admin/abonnement/demasked', [App\Http\Controllers\AbonnementController::class, 'demasked'])->name('abonnement.demasked');
    Route::get('/admin/abonnement/consulter', [App\Http\Controllers\AbonnementController::class, 'show'])->name('abonnement.consulter');
    Route::get('/admin/abonnement/ajouter', [App\Http\Controllers\AbonnementController::class, 'create'])->name('abonnement.ajouter');

    //Gestion de la souscription des abonnements
    Route::get('/admin/souscrire-abonnement/attente-paiement', [App\Http\Controllers\AbonnementController::class, 'attente_paiement'])->name('abonnement.attente.paiement');
    Route::get('/admin/souscrire-abonnement/attente', [App\Http\Controllers\AbonnementController::class, 'attente'])->name('abonnement.attente');
    Route::get('/admin/souscrire-abonnement/confirmes', [App\Http\Controllers\AbonnementController::class, 'confirmes'])->name('abonnement.confirmes');
    Route::post('/admin/souscrire-abonnement/paiement/validee', [App\Http\Controllers\AbonnementController::class, 'confirmer_souscription'])->name('abonnement.paiement.valide');
    Route::get('/admin/souscrire-abonnement/expires', [App\Http\Controllers\AbonnementController::class, 'expires'])->name('abonnement.expires');
    Route::get('/admin/souscrire-abonnement/list/abonnes', [App\Http\Controllers\AbonnementController::class, 'list_abonnes'])->name('abonnement.user.list');
    Route::get('/admin/souscrire-abonnement/new', [App\Http\Controllers\SouscrireAbonnementController::class, 'souscrire_formulaire'])->name('abonnement.formulaire');
    Route::post('/admin/souscrire-abonnement/new/add', [App\Http\Controllers\SouscrireAbonnementController::class, 'souscrire_new'])->name('abonnement.souscrire.new');

    // Gestion des commande de maintenance
    Route::get('/admin/commande_maintenance/attente', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'attente'])->name('commande_maintenance.attente');
    Route::post('/admin/commande_maintenance/validation/change/etat', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'validation_commande'])->name('commande_maintenance.validation.etat');
    Route::get('/admin/commande_maintenance/commande_paiement_non_soumis', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'paiement_non_soumis'])->name('commande_maintenance.paiement_non_soumis');
    Route::get('/admin/commande_maintenance/paiement/validation_attente', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'validation_paiement'])->name('commande_maintenance.validation_paiement');
    Route::post('/admin/commande_maintenance/paiement/validee', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'paiement_valide'])->name('commande_maintenance.paiement.valide');
    Route::get('/admin/commande_maintenance/commande-confirmees', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'commande_confirmees'])->name('commande_maintenance.commande_confirmees');
    Route::get('/admin/commande_maintenance/annulee', [App\Http\Controllers\CommandeMaintenanceAutomobileController::class, 'annulee'])->name('commande_maintenance.annulee');

    // Gestion des commandes de réservation des appartements / hotel
    Route::get('/admin/commande_reservation/attente', [App\Http\Controllers\CommandeReservationAppartementHotelController::class, 'attente'])->name('commande_reservation.attente');
    Route::get('/admin/commande_reservation/annulee', [App\Http\Controllers\CommandeReservationAppartementHotelController::class, 'annulee'])->name('commande_reservation.annulee');
    Route::post('/admin/commande_reservation/validation/change/etat', [App\Http\Controllers\CommandeReservationAppartementHotelController::class, 'validation_commande'])->name('commande_reservation.validation.etat');
    Route::get('/admin/commande_reservation/commande_validee', [App\Http\Controllers\CommandeReservationAppartementHotelController::class, 'commande_validee'])->name('commande_reservation.commande_validee');


    // Gestion de la bibliothèque
    Route::get('/admin/bibliotheque/ajouter', [App\Http\Controllers\BibliothequeController::class, 'create'])->name('admin.bibliotheque.ajouter');
    Route::post('/admin/bibliotheque/add', [App\Http\Controllers\BibliothequeController::class, 'store'])->name('admin.bibliotheque.add');
    Route::post('/admin/bibliotheque/edit', [App\Http\Controllers\BibliothequeController::class, 'edit'])->name('admin.bibliotheque.edit');
    Route::post('/admin/bibliotheque/masked', [App\Http\Controllers\BibliothequeController::class, 'masked'])->name('admin.bibliotheque.masked');
    Route::post('/admin/bibliotheque/demasked', [App\Http\Controllers\BibliothequeController::class, 'demasked'])->name('admin.bibliotheque.demasked');
    Route::post('/admin/bibliotheque/edit/file', [App\Http\Controllers\BibliothequeController::class, 'edit_file'])->name('admin.bibliotheque.edit.file');
    Route::get('/admin/bibliotheque/consulter', [App\Http\Controllers\BibliothequeController::class, 'index'])->name('admin.bibliotheque.consulter');


    // Gestion de livraison / achat des paniers
    Route::get('/admin/achat-livraison/attente', [App\Http\Controllers\LivraisonPanierController::class, 'attente_achat_livraison'])->name('achat_livraison.attente');
    Route::post('/admin/achat-livraison/change/etat', [App\Http\Controllers\LivraisonPanierController::class, 'validation_achat_livraison'])->name('achat_livraison.validation.etat');
    Route::get('/admin/achat-livraison/commande_paiement_non_soumis', [App\Http\Controllers\LivraisonPanierController::class, 'achat_livraison_paiement_non_soumis'])->name('achat_livraison.paiement_non_soumis');
    Route::get('/admin/achat-livraison/validation-paiement', [App\Http\Controllers\LivraisonPanierController::class, 'validation_paiement_achat_livraison'])->name('achat_livraison.validation_paiement');
    Route::post('/admin/achat-livraison/paiement/validee', [App\Http\Controllers\LivraisonPanierController::class, 'paiement_achat_livraison_valide'])->name('achat_livraison.paiement.valide');
    Route::get('/admin/achat-livraison/commande-confirmees', [App\Http\Controllers\LivraisonPanierController::class, 'achat_livraison_confirmees'])->name('achat_livraison.confirmees');
    Route::get('/admin/achat-livraison/annulee', [App\Http\Controllers\LivraisonPanierController::class, 'annulee_achat_livraison'])->name('achat_livraison.annulee');

    Route::get('/admin/livraison/attente', [App\Http\Controllers\LivraisonPanierController::class, 'attente_livraison'])->name('livraison.attente');
    Route::post('/admin/livraison/change/etat', [App\Http\Controllers\LivraisonPanierController::class, 'validation_livraison'])->name('livraison.validation.etat');
    Route::get('/admin/livraison/commande_validee', [App\Http\Controllers\LivraisonPanierController::class, 'livraison_validee'])->name('livraison.validee');
    Route::get('/admin/livraison/annulee', [App\Http\Controllers\LivraisonPanierController::class, 'annulee'])->name('livraison.annulee');


    // Gestion des utilisateurs
    Route::get('/admin/consulter/utilisateurs', [App\Http\Controllers\UserController::class, 'show'])->name('utilisateurs.show');
    Route::get('/admin/ajouter/utilisateurs', [App\Http\Controllers\UserController::class, 'create'])->name('utilisateurs.create');
    Route::post('/admin/add/utilisateurs', [App\Http\Controllers\UserController::class, 'store'])->name('utilisateurs.store');
    Route::post('/admin/edit/utilisateurs', [App\Http\Controllers\UserController::class, 'edit'])->name('utilisateurs.edit');
    Route::post('/admin/change/role/utilisateurs', [App\Http\Controllers\UserController::class, 'change_role'])->name('utilisateurs.change.role');


    // Gestion de la formation
    Route::get('/admin/formation/ajouter', [App\Http\Controllers\FormationController::class, 'create'])->name('admin.formation.ajouter');
    Route::post('/admin/formation/add', [App\Http\Controllers\FormationController::class, 'store'])->name('admin.formation.add');
    Route::post('/admin/formation/edit', [App\Http\Controllers\FormationController::class, 'edit'])->name('admin.formation.edit');
    Route::post('/admin/formation/masked', [App\Http\Controllers\FormationController::class, 'masked'])->name('admin.formation.masked');
    Route::post('/admin/formation/demasked', [App\Http\Controllers\FormationController::class, 'demasked'])->name('admin.formation.demasked');
    Route::get('admin/formation/consulter', [App\Http\Controllers\FormationController::class, 'index'])->name('admin.formation.consulter');

    // Gestion des commande de formation
    Route::get('/admin/commande_formation/paiement/validation_attente', [App\Http\Controllers\CommandeFormationController::class, 'validation_paiement'])->name('commande_formation.validation_paiement');
    Route::get('/admin/commande_formation/paiement_non_soumis', [App\Http\Controllers\CommandeFormationController::class, 'paiement_non_soumis'])->name('commande_formation.paiement_non_soumis');
    Route::post('/admin/commande_formation/paiement/validee', [App\Http\Controllers\CommandeFormationController::class, 'paiement_valide'])->name('commande_formation.paiement.valide');
    Route::get('/admin/commande_formation/commande-confirmees', [App\Http\Controllers\CommandeFormationController::class, 'commande_confirmees'])->name('commande_formation.commande_confirmees');

    // Gestion des expressions de besoin de formation
    Route::get('/admin/expression-besoin-formation/attente', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'index'])->name('expression.besoin.attente');
    Route::post('/admin/expression-besoin-formation/change/etat', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'validation_commande'])->name('expression.besoin.validation.etat');
    Route::get('/admin/expression-besoin-formation/paiement-non-soumis', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'paiement_non_soumis'])->name('expression.besoin.commande_paiement_non_soumis');
    Route::get('/admin/expression-besoin-formation/validation-paiement', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'validation_paiement'])->name('expression.besoin.validation_paiement');
    Route::post('/admin/expression-besoin-formation/paiement/validee', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'paiement_valide'])->name('expression.besoin.paiement.valide');
    Route::get('/admin/expression-besoin-formation/commande-confirmees', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'commande_confirmees'])->name('expression.besoin.commande_confirmees');
    Route::get('/admin/expression-besoin-formation/annulee', [App\Http\Controllers\ExpressionBesoinFormationController::class, 'annulee'])->name('expression.besoin.annulee');


    // Gestion de la facturation des services

    Route::post('/admin/facture/commande-location/add', [App\Http\Controllers\FactureCommandeLocationController::class, 'create'])->name('facture.commande_location.add');
    Route::get('/admin/facture/commande-location/consulter', [App\Http\Controllers\FactureCommandeLocationController::class, 'index'])->name('facture.commande_location.consulter');
    Route::get('/admin/facture/commande-location/generer', [App\Http\Controllers\FactureCommandeLocationController::class, 'generer'])->name('facture.commande_location.generer');

    Route::post('/admin/facture/commande-formation/add', [App\Http\Controllers\FactureCommandeFormationController::class, 'create'])->name('facture.commande_formation.add');
    Route::get('/admin/facture/commande-formation/consulter', [App\Http\Controllers\FactureCommandeFormationController::class, 'index'])->name('facture.commande_formation.consulter');
    Route::get('/admin/facture/commande-formation/generer', [App\Http\Controllers\FactureCommandeFormationController::class, 'generer'])->name('facture.commande_formation.generer');

    Route::post('/admin/facture/expression-besoin-formation/add', [App\Http\Controllers\FactureCommandeExpressionBesoinFormationController::class, 'create'])->name('facture.expression_besoin_formation.add');
    Route::get('/admin/facture/expression-besoin-formation/consulter', [App\Http\Controllers\FactureCommandeExpressionBesoinFormationController::class, 'index'])->name('facture.expression_besoin_formation.consulter');
    Route::get('/admin/facture/expression-besoin-formation/generer', [App\Http\Controllers\FactureCommandeExpressionBesoinFormationController::class, 'generer'])->name('facture.expression_besoin_formation.generer');

    Route::post('/admin/facture/commande-maintenance-automobile/add', [App\Http\Controllers\FactureCommandeMaintenanceController::class, 'create'])->name('facture.commande_maintenance.add');
    Route::get('/admin/facture/commande-maintenance-automobile/consulter', [App\Http\Controllers\FactureCommandeMaintenanceController::class, 'index'])->name('facture.commande_maintenance.consulter');
    Route::get('/admin/facture/commande-maintenance-automobile/generer', [App\Http\Controllers\FactureCommandeMaintenanceController::class, 'generer'])->name('facture.commande_maintenance.generer');

    Route::post('/admin/facture/commande-reservation-appart-ou-hotel/add', [App\Http\Controllers\FactureCommandeReservationAppartHotelController::class, 'create'])->name('facture.commande_reservation_appart_hotel.add');
    Route::get('/admin/facture/commande-reservation-appart-ou-hotel/consulter', [App\Http\Controllers\FactureCommandeReservationAppartHotelController::class, 'index'])->name('facture.commande_reservation_appart_hotel.consulter');
    Route::get('/admin/facture/commande-reservation-appart-ou-hotel/generer', [App\Http\Controllers\FactureCommandeReservationAppartHotelController::class, 'generer'])->name('facture.commande_reservation_appart_hotel.generer');

    Route::post('/admin/facture/commande-achat-livraison-panier/add', [App\Http\Controllers\FactureCommandeAchatLivraisonPanierController::class, 'create'])->name('facture.commande_achat_livraison_panier.add');
    Route::get('/admin/facture/commande-achat-livraison-panier/consulter', [App\Http\Controllers\FactureCommandeAchatLivraisonPanierController::class, 'index'])->name('facture.commande_achat_livraison_panier.consulter');
    Route::get('/admin/facture/commande-achat-livraison-panier/generer', [App\Http\Controllers\FactureCommandeAchatLivraisonPanierController::class, 'generer'])->name('facture.commande_achat_livraison_panier.generer');

    Route::post('/admin/facture/commande-livraison-panier/add', [App\Http\Controllers\FactureCommandeLivraisonPanierController::class, 'create'])->name('facture.commande_livraison_panier.add');
    Route::get('/admin/facture/commande-livraison-panier/consulter', [App\Http\Controllers\FactureCommandeLivraisonPanierController::class, 'index'])->name('facture.commande_livraison_panier.consulter');
    Route::get('/admin/facture/commande-livraison-panier/generer', [App\Http\Controllers\FactureCommandeLivraisonPanierController::class, 'generer'])->name('facture.commande_livraison_panier.generer');

    Route::post('/admin/facture/souscription-abonnement/add', [App\Http\Controllers\FactureSouscrireAbonnementController::class, 'create'])->name('facture.souscription_abonnement.add');
    Route::get('/admin/facture/souscription-abonnement/consulter', [App\Http\Controllers\FactureSouscrireAbonnementController::class, 'index'])->name('facture.souscription_abonnement.consulter');
    Route::get('/admin/facture/souscription-abonnement/generer', [App\Http\Controllers\FactureSouscrireAbonnementController::class, 'generer'])->name('facture.souscription_abonnement.generer');

});
