@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Gestion des commandes confirmées<br><small>Consulter les ici !</small>
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
                        <th>N° abonnement soumis</th>
                        <th>Date de départ</th>
                        <th>Date d'arrivée</th>
                        <th>Tarif net</th>
                        <th>Nombe de jours</th>
                        <th>Type de location</th>
                        <th>Zone déplacement</th>
                        <th>Etat de la commande</th>
                        <th>Etat du paiement</th>
                        <th>Commandé par</th>
                        <th>Intitule de la location</th>
                        <th>Commandé le</th>
                        <th style="width: 150px;" class="text-center">Créer facture</th>
                        <th style="width: 150px;" class="text-center">Créer attestation service</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commande_confirmees as $item)
                    <tr>
                        <td>{{$item->numero_commande}}</td>
                        <td>@if($item->numero_abonnement_souscris != 'null') {{$item->numero_abonnement_souscris}} @else Non renseigné @endif</td>
                        <td>{{$item->date_debut}}</td>
                        <td>{{$item->date_fin}}</td>
                        <td><b>@if($item->rabais == 0) {{$item->tarif}} FCFA @else {{$item->tarif_rabais}} FCFA @endif</b></td>
                        <td>{{$item->nombre_jours}}</td>
                        <td>{{$item->type_location}}</td>
                        <td>{{$item->zone_location}}</td>
                        <td>@if($item->etat_commande == 'attente') <span class="badge bg-secondary">En attente</span> @elseif($item->etat_commande == 'canceled') <span class="label label-danger">Annulé</span> @else <span class="label label-success">Validé</span> @endif</td>
                        <td>@if($item->etat_paiement == 'yes') <span class="label label-success">Payé</span> @else <span class="label label-danger">Non payé</span> @endif</td>
                        <td><a href="{{ route('user.profile.details', ['id' => $item->users->id, 'name' => str_slug($item->users->name)]) }}">
                                {{$item->users->name}} {{$item->users->prenom}}
                            </a></td>
                        <td>{{$item->locations->vehicules->intitule}}</td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit_{{$item->id}}"><i class="fa fa-file-text"></i></button>
                            </div>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_attestation_{{$item->id}}"><i class="fa fa-check"></i></button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="pages_edit_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Créer la facture de la commande N° {{$item->numero_commande}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('facture.commande_location.add')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <h3>Voulez-vous vraiment créer la facture de cette commande ?</h3>
                                                    <input type="hidden" name="commande_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Créer <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="pages_attestation_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Créer l'attestation de service de la commande N° {{$item->numero_commande}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('commande_location.attestation_service.store')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <h3>Voulez-vous vraiment créer l'attestation de service de cette commande ?</h3>
                                                    <input type="hidden" name="commande_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Créer <i class="fa fa-arrow-right"></i></button>
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
                        title: 'Liste des commandes de location confirmées',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Liste des commandes de location confirmées',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        title: 'Liste des commandes de location confirmées',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Liste des commandes de location confirmées',
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