@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Mes historiques de commande</h2>
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
                                                <th>Etat commande</th>
                                                <th>Etat paiement</th>
                                                <th>Location</th>
                                                <th>Tarif</th>
                                                <th>Mode paiement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commande_location as $item)
                                            <tr>
                                                <td>{{$item->numero_commande}}</td>
                                                <td>{{$item->date_debut}}</td>
                                                <td>{{$item->date_fin}}</td>
                                                <td>@if($item->etat_commande == 'attente') <span class="badge bg-secondary">En attente</span> @elseif($item->etat_commande == 'canceled') <span class="badge bg-danger">Annulé</span> @else <span class="badge bg-success">Validé</span> @endif</td>
                                                <td>@if($item->etat_paiement == 'no') <span class="badge bg-danger">Non payé</span> @else <span class="badge bg-success">Payé</span> @endif</td>
                                                <td>{{$item->locations->intitule}}</td>
                                                <td>{{$item->tarif}} FCFA</td>
                                                <td>@if($item->mode_paiement_id == null) N/A @else {{$item->mode_paiements->intitule}} @endif</td>
                                            </tr>
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
                                                <td>@if($item->etat_paiement == 'no') Non payé @else Payé @endif</td>
                                                <td>{{$item->montant}} FCFA</td>
                                                <td>@if($item->mode_paiement_id == null) N/A @else {{$item->mode_paiements->intitule}} @endif</td>
                                            </tr>
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
                                                <th>Etat commande</th>
                                                <th>Etat paiement</th>
                                                <th>Montant</th>
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
                                                <td>@if($item->etat_commande == 'attente') <span class="badge bg-secondary">En attente</span> @elseif($item->etat_commande == 'canceled') <span class="badge bg-danger">Annulé</span> @else <span class="badge bg-success">Validé</span> @endif</td>
                                                <td>@if($item->etat_paiement == 'no') <span class="badge bg-danger">Non payé</span> @else <span class="badge bg-success">Payé</span> @endif</td>
                                                <td><b>{{$item->montant}} FCFA</b></td>
                                            </tr>
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
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover" id="table-formation">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° commande</th>
                                                <th>Heure début</th>
                                                <th>Heure fin</th>
                                                <th>Etat commande</th>
                                                <th>Etat paiement</th>
                                                <th>Location</th>
                                                <th>Tarif</th>
                                                <th>Mode paiement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($commande_formation as $item)
                                            <tr>
                                                <td>{{$item->numero_commande}}</td>
                                                <td>{{$item->formations->heure_debut}}</td>
                                                <td>{{$item->formations->heure_fin}}</td>
                                                <td>@if($item->etat_commande == 'attente') <span class="badge bg-secondary">En attente</span> @elseif($item->etat_commande == 'canceled') <span class="badge bg-danger">Annulé</span> @else <span class="badge bg-success">Validé</span> @endif</td>
                                                <td>@if($item->etat_paiement == 'no') <span class="badge bg-danger">En confirmation</span> @else <span class="badge bg-success">Payé</span> @endif</td>
                                                <td>{{$item->formations->theme}}</td>
                                                <td>{{$item->montant_total}} FCFA</td>
                                                <td>@if($item->mode_paiement_id == null) N/A @else {{$item->mode_paiements->intitule}} @endif</td>
                                            </tr>
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