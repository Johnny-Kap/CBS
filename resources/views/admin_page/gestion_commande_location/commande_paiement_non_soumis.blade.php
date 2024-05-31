@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Gestion des locations n'ayant pas recu de paiement<br><small>Consulter les ici !</small>
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
                        <th>N° Commande</th>
                        <th>Date de départ</th>
                        <th>Date d'arrivée</th>
                        <th>Tarif total</th>
                        <th>Nombe de jours</th>
                        <th>Etat de la commande</th>
                        <th>Commandé par</th>
                        <th>Intitule de la location</th>
                        <th>Commandé le</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paiement_non_soumis as $item)
                    <tr>
                        <td>{{$item->numero_commande}}</td>
                        <td>{{$item->date_debut}}</td>
                        <td>{{$item->date_fin}}</td>
                        <td>{{$item->tarif}}</td>
                        <td>{{$item->nombre_jours}}</td>
                        <td>@if($item->etat_commande == 'attente') <span class="badge bg-secondary">En attente</span> @elseif($item->etat_commande == 'canceled') <span class="label label-danger">Annulé</span> @else <span class="label label-success">Validé</span> @endif</td>
                        <td><a href="{{ route('user.profile.details', ['id' => $item->users->id, 'name' => str_slug($item->users->name)]) }}">
                                {{$item->users->name}} {{$item->users->prenom}}
                            </a></td>
                        <td>{{$item->locations->intitule}}</td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit_{{$item->id}}"><i class="fa fa-pencil"></i></button>
                                <!-- <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#pages_delete"><i class="fa fa-times"></i></button> -->
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="pages_edit_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Effectuer la validation de commande</h4>
                                    </div>
                                </div>
                                <form action="{{route('commande_location.validation.etat')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Choisir l'option :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <select name="etat">
                                                        <option value="yes">Valider</option>
                                                        <option value="attente">Mettre en attente</option>
                                                    </select>
                                                    <input type="hidden" name="commande_id" value="{{$item->id}}" />
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
                        title: 'Liste des commandes de location paiement non soumis',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Liste des commandes de location paiement non soumis',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        title: 'Liste des commandes de location paiement non soumis',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Liste des commandes de location paiement non soumis',
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