@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Gestion des commandes de maintenance validées<br><small>Consulter les ici !</small>
            </h1>
        </div>
    </div>
    <!-- <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('location.ajouter')}}"><b>AJOUTER UNE LOCATION</b></a></li>
    </ul> -->
    <!-- END Table Styles Header -->

    <!-- Table Styles Block -->
    <div class="block">
        <!-- Table Styles Title -->
        <div class="block-title">
            <h2><strong>Table</strong> Styles</h2>
        </div>
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
        
        <div class="table-responsive">
            <!--
                                Available Table Classes:
                                    'table'             - basic table
                                    'table-bordered'    - table with full borders
                                    'table-borderless'  - table with no borders
                                    'table-striped'     - striped table
                                    'table-condensed'   - table with smaller top and bottom cell padding
                                    'table-hover'       - rows highlighted on mouse hover
                                    'table-vcenter'     - middle align content vertically
                                -->
            <table id="general-table" class="table table-striped table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>N° Commande main.</th>
                        <th>N° abonnement soumis</th>
                        <th>Intitulé de la panne</th>
                        <th>Description de la panne</th>
                        <th>Date de main. souhaitée</th>
                        <th>Immatriculation véhicule</th>
                        <th>Situation du véhicule</th>
                        <th>Marque du véhicule</th>
                        <th>Année du véhicule</th>
                        <th>Kilometrage</th>
                        <th>N° de série</th>
                        <th>Montant prestation</th>
                        <th>Etat de la commande</th>
                        <th>Etat de paiement</th>
                        <th>Commandé par</th>
                        <th>Commandé le</th>
                        <!-- <th style="width: 150px;" class="text-center">Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($commande_paiement_non_soumis as $item)
                    <tr>
                        <td>{{$item->numero_commande}}</td>
                        <td>{{$item->numero_abonnement_souscris}}</td>
                        <td>{{$item->intitule}}</td>
                        <td>{{$item->debrief}}</td>
                        <td>{{$item->date_maintenance}}</td>
                        <td>{{$item->immatriculation}}</td>
                        <td>{{$item->situation_vehicule}}</td>
                        <td>{{$item->marque_vehicule}}</td>
                        <td>{{$item->annee_vehicule}}</td>
                        <td>{{$item->Kilometrage}}</td>
                        <td>{{$item->numero_serie}}</td>
                        <td>{{$item->montant}}</td>
                        <td>@if($item->etat_commande == 'attente') <span class="badge bg-secondary">En attente</span> @elseif($item->etat_commande == 'canceled') <span class="label label-danger">Annulé</span> @else <span class="label label-success">Validé</span> @endif</td>
                        <td>@if($item->etat_paiement == 'no') <span class="label label-danger">Non payé</span> @else <span class="label label-success">Payé</span> @endif</td>
                        <td><a href="{{ route('user.profile.details', ['id' => $item->users->id, 'name' => str_slug($item->users->name)]) }}">
                                {{$item->users->name}} {{$item->users->prenom}}
                            </a></td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <!-- <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit_{{$item->id}}"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#pages_delete"><i class="fa fa-times"></i></button>
                            </div>
                        </td> -->
                    </tr>

                    <div class="modal fade" id="pages_edit_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Effectuer le paiement de la commande</h4>
                                    </div>
                                </div>
                                <form action="{{route('commande_maintenance.paiement.valide')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Choisir l'option :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="booking-info pay-amount">
                                                    <select name="etat_paiement">
                                                        <option value="yes">Payé</option>
                                                        <option value="no">Non payé</option>
                                                    </select>
                                                    <input type="hidden" name="commande_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Entrer le montant :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="booking-info pay-amount">
                                                    <input type="number" name="montant">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Choisir le mode de paiement :
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-back">Valider <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END Table Styles Content -->
    </div>
    <!-- END Table Styles Block -->
</div>

@endsection

@push('scripts')

<script>
    let table = new DataTable('#general-table', {
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
        },
        layout: {
            topStart: {
                buttons: [{
                        extend: 'pdf',
                        title: 'Liste des commandes de maintenance avec non paiement soumis',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Liste des commandes de maintenance avec non paiement soumis',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        title: 'Liste des commandes de maintenance avec non paiement soumis',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Liste des commandes de maintenance avec non paiement soumis',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            }
        }
    });
</script>

@endpush