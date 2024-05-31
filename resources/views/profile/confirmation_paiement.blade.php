@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Confirmer mes paiements</h2>
            </div>
        </div>
    </div>
</div>

<div class="invoice-section">
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body text-center">
                    <h5>Commande de locations de véhicule</h5><br>
                    <h5>Veuillez effectuer vos paiments en transferant de l'argent sur ces numéros : OM - +237 659826528 / MOMO - +237 653100205</h5><br>
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover" id="table-location">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° commande</th>
                                                <th>Date depart</th>
                                                <th>Date retour</th>
                                                <th>Etat paiement</th>
                                                <th>Location</th>
                                                <th>Tarif</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commande as $item)
                                            <tr>
                                                <td>{{$item->numero_commande}}</td>
                                                <td>{{$item->date_debut}}</td>
                                                <td>{{$item->date_fin}}</td>
                                                <td>@if($item->etat_paiement == 'no') <span class="badge bg-danger">Non payé</span> @else <span class="badge bg-success">Payé</span> @endif</td>
                                                <td>{{$item->locations->vehicules->intitule}}</td>
                                                <td>{{$item->tarif}} FCFA</td>
                                                <td><button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_loc_{{$item->id}}">
                                                        Télécharger image ici <i class="fa fa-upload"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal custom-modal fade check-availability-modal" id="pages_loc_{{$item->id}}" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <form action="{{route('soumission_paiement')}}" enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <h5>Commande de locations de véhicule - Paiement de la commande : {{$item->numero_commande}}</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Téléverser la capture d'ecran de votre paiement ici !</h6>
                                                                            <div class="radio">
                                                                                <input type="file" class="form-control" name="file">
                                                                                <input type="hidden" value="{{$item->id}}" name="commande_id">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Choisir le mode de paiement :</h6>
                                                                            <div class="">
                                                                                <select name="mode_paiement" class="form-control" id="">
                                                                                    @foreach($mode_paiement as $item)
                                                                                    <option value="{{$item->id}}">{{$item->intitule}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Envoyer <i class="fa-solid fa-arrow-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body text-center">
                    <h5>Achat et livraison de panier</h5><br>
                    <h5>Veuillez effectuer vos paiments en transferant de l'argent sur ces numéros : OM - +237 659826528 / MOMO - +237 653100205</h5><br>
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover" id="table-achat">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° commande</th>
                                                <th>Type de prestation</th>
                                                <th>Date de livraison</th>
                                                <th>Adresse recupération</th>
                                                <th>Adresse de livraison</th>
                                                <th>Etat paiement</th>
                                                <th>Montant</th>
                                                <th>Mode paiement</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($achat_livraison as $item)
                                            <tr>
                                                <td>{{$item->numero_commande}}</td>
                                                <td>{{$item->type_prestation}}</td>
                                                <td>{{$item->date_livraison}}</td>
                                                <td>{{$item->adresse_recuperation}}</td>
                                                <td>{{$item->adresse_livraison}}</td>
                                                <td>@if($item->etat_paiement == 'no') <span class="badge bg-danger">Non payé</span> @else <span class="badge bg-success">Payé</span> @endif</td>
                                                <td>{{$item->montant}} FCFA</td>
                                                <td>{{$item->mode_paiements->intitule}}</td>
                                                <td><button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_liv_{{$item->id}}">
                                                        Télécharger image ici <i class="fa fa-upload"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal custom-modal fade check-availability-modal" id="pages_liv_{{$item->id}}" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <form action="{{route('soumission_paiement.achat_livraison')}}" enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <h5>Achat et livraison de panier - Paiement de la commande : {{$item->numero_commande}}</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Téléverser la capture d'ecran de votre paiement ici !</h6>
                                                                            <div class="radio">
                                                                                <input type="file" class="form-control" name="file">
                                                                                <input type="hidden" value="{{$item->id}}" name="commande_id">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Choisir le mode de paiement :</h6>
                                                                            <div class="">
                                                                                <select name="mode_paiement" class="form-control" id="">
                                                                                    @foreach($mode_paiement as $item)
                                                                                    <option value="{{$item->id}}">{{$item->intitule}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Envoyer <i class="fa-solid fa-arrow-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body text-center">
                    <h5>Maintenance automobile</h5><br>
                    <h5>Veuillez effectuer vos paiments en transferant de l'argent sur ces numéros : OM - +237 659826528 / MOMO - +237 653100205</h5><br>
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover" id="table-maintenance">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° Commande main.</th>
                                                <th>Intitulé de la panne</th>
                                                <th>Description de la panne</th>
                                                <th>Date de main. souhaitée</th>
                                                <th>Situation du véhicule</th>
                                                <th>Marque du véhicule</th>
                                                <th>Etat de paiement</th>
                                                <th>Montant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commande_maintenance as $item)
                                            <tr>
                                                <td>{{$item->numero_commande}}</td>
                                                <td>{{$item->intitule}}</td>
                                                <td>{{$item->debrief}}</td>
                                                <td>{{$item->date_maintenance}}</td>
                                                <td>{{$item->situation_vehicule}}</td>
                                                <td>{{$item->marque_vehicule}}</td>
                                                <td>@if($item->etat_paiement == 'no') <span class="badge bg-danger">Non payé</span> @else <span class="badge bg-success">Payé</span> @endif</td>
                                                <td><b>{{$item->montant}} FCFA</b></td>
                                                <td><button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_main_{{$item->id}}">
                                                        Télécharger image ici <i class="fa fa-upload"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal custom-modal fade check-availability-modal" id="pages_main_{{$item->id}}" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <form action="{{route('soumission_paiement.commande_maintenance')}}" enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <h5>Maintenance automobile - Paiement de la commande : {{$item->numero_commande}}</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Téléverser la capture d'ecran de votre paiement ici !</h6>
                                                                            <div class="radio">
                                                                                <input type="file" class="form-control" name="file">
                                                                                <input type="hidden" value="{{$item->id}}" name="commande_id">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Choisir le mode de paiement :</h6>
                                                                            <div class="">
                                                                                <select name="mode_paiement" class="form-control" id="">
                                                                                    @foreach($mode_paiement as $item)
                                                                                    <option value="{{$item->id}}">{{$item->intitule}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Envoyer <i class="fa-solid fa-arrow-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body text-center">
                    <h5>Commande de formation</h5><br>
                    <h5>Veuillez effectuer vos paiments en transferant de l'argent sur ces numéros : OM - +237 659826528 / MOMO - +237 653100205</h5><br>
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover" id="table-formation">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° commande</th>
                                                <th>Date de formation</th>
                                                <th>Heure de début</th>
                                                <th>Heure de fin</th>
                                                <th>Nombre de place</th>
                                                <th>Etat paiement</th>
                                                <th>Intitulé de formation</th>
                                                <th>Montant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commande_formation as $item)
                                            <tr>
                                                <td>{{$item->numero_commande}}</td>
                                                <td>{{$item->formations->date_formation}}</td>
                                                <td>{{$item->formations->heure_debut}}</td>
                                                <td>{{$item->formations->heure_fin}}</td>
                                                <td>{{$item->nb_place_commande}}</td>
                                                <td>@if($item->etat_paiement == 'no') <span class="badge bg-danger">Non payé</span> @else <span class="badge bg-success">Payé</span> @endif</td>
                                                <td>{{$item->formations->theme}}</td>
                                                <td>{{$item->montant_total}} FCFA</td>
                                                <td><button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_loc_{{$item->id}}">
                                                        Télécharger image ici <i class="fa fa-upload"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal custom-modal fade check-availability-modal" id="pages_loc_{{$item->id}}" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <form action="{{route('soumission_paiement.commande_formation')}}" enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <h5>Commande de formation - Paiement de la commande : {{$item->numero_commande}}</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Téléverser la capture d'ecran de votre paiement ici !</h6>
                                                                            <div class="radio">
                                                                                <input type="file" class="form-control" name="file">
                                                                                <input type="hidden" value="{{$item->id}}" name="formation_id">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Choisir le mode de paiement :</h6>
                                                                            <div class="">
                                                                                <select name="mode_paiement" class="form-control" id="">
                                                                                    @foreach($mode_paiement as $item)
                                                                                    <option value="{{$item->id}}">{{$item->intitule}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Envoyer <i class="fa-solid fa-arrow-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body text-center">
                    <h5>Commande d'expression du besoin de formation</h5><br>
                    <h5>Veuillez effectuer vos paiments en transferant de l'argent sur ces numéros : OM - +237 659826528 / MOMO - +237 653100205</h5><br>
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover" id="table-besoin">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° commande</th>
                                                <th>Date de formation</th>
                                                <th>Heure de début</th>
                                                <th>Heure de fin</th>
                                                <th>Nombre de place</th>
                                                <th>Etat paiement</th>
                                                <th>Intitulé de formation</th>
                                                <th>Montant</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($expression_besoin_formation as $item)
                                            <tr>
                                                <td>{{$item->numero_commande}}</td>
                                                <td>{{$item->date_formation}}</td>
                                                <td>{{$item->heure_debut}}</td>
                                                <td>{{$item->heure_fin}}</td>
                                                <td>{{$item->nb_place}}</td>
                                                <td>@if($item->etat_paiement == 'no') <span class="badge bg-danger">Non payé</span> @else <span class="badge bg-success">Payé</span> @endif</td>
                                                <td>{{$item->theme}}</td>
                                                <td>{{$item->montant}} FCFA</td>
                                                <td><button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_loc_{{$item->id}}">
                                                        Télécharger image ici <i class="fa fa-upload"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal custom-modal fade check-availability-modal" id="pages_loc_{{$item->id}}" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <form action="{{route('soumission_paiement_expression_besoin')}}" enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <h5>Commande de locations de véhicule - Paiement de la commande : {{$item->numero_commande}}</h5>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Téléverser la capture d'ecran de votre paiement ici !</h6>
                                                                            <div class="radio">
                                                                                <input type="file" class="form-control" name="file">
                                                                                <input type="hidden" value="{{$item->id}}" name="expression_id">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Choisir le mode de paiement :</h6>
                                                                            <div class="">
                                                                                <select name="mode_paiement" class="form-control" id="">
                                                                                    @foreach($mode_paiement as $item)
                                                                                    <option value="{{$item->id}}">{{$item->intitule}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Envoyer <i class="fa-solid fa-arrow-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    let table_location = new DataTable('#table-location', {
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix: "",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable: "Aucune donnée disponible dans le tableau",
            paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
    let table_achat = new DataTable('#table-achat', {
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix: "",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable: "Aucune donnée disponible dans le tableau",
            paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
    let table_maitnenance = new DataTable('#table-maintenance', {
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix: "",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable: "Aucune donnée disponible dans le tableau",
            paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
    let table_formation = new DataTable('#table-formation', {
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix: "",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable: "Aucune donnée disponible dans le tableau",
            paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
    let table_besoin = new DataTable('#table-besoin', {
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix: "",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable: "Aucune donnée disponible dans le tableau",
            paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
</script>

@endpush