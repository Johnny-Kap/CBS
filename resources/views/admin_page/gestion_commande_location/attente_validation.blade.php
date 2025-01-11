@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Gestion des locations en attente de validation<br><small>Consulter les ici !</small>
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
                        <th>Rabais souhaité</th>
                        <th>Montant avec rabais</th>
                        <th>Montant hors rabais</th>
                        <th>Nombe de jours</th>
                        <th>Etat de la commande</th>
                        <th>Commandé par</th>
                        <th>Intitule de la location</th>
                        <th>Commandé le</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commade_attente as $item)
                    <tr>
                        <td>{{$item->numero_commande}}</td>
                        <td>@if($item->numero_abonnement_souscris != 'null') {{$item->numero_abonnement_souscris}} @else Non renseigné @endif</td>
                        <td>{{$item->date_debut}}</td>
                        <td>{{$item->date_fin}}</td>
                        <td>{{$item->rabais}}%</td>
                        <td>{{$item->tarif_rabais}}</td>
                        <td>{{$item->tarif}}</td>
                        <td>{{$item->nombre_jours}}</td>
                        <td>@if($item->etat_commande == 'attente') <span class="badge bg-secondary">En attente</span> @elseif($item->etat_commande == 'canceled') <span class="label label-danger">Annulé</span> @else <span class="label label-success">Validé</span> @endif</td>
                        <td><a href="{{ route('user.profile.details', ['id' => $item->users->id, 'name' => str_slug($item->users->name)]) }}">
                                {{$item->users->name}} {{$item->users->prenom}}
                            </a></td>
                        <td>{{$item->locations->vehicules->intitule}}</td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit_{{$item->id}}"><i class="fa fa-check-square-o"></i></button>
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_modify_{{$item->id}}"><i class="fa fa-pencil fa"></i></button>
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
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <label>Cochez la case si vous souhaitez appliquer ce rabais ou modifier</label>
                                                    <input type="checkbox" id="enableInputCheckbox" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="booking-info pay-amount">
                                                    <label>Rabais (%)</label>
                                                    <input type="text" id="rabais" name="rabais" disabled value="{{$item->rabais}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="booking-info pay-amount">
                                                    <label>Montant avec rabais (FCFA)</label>
                                                    <input type="text" value="{{$item->tarif_rabais}}" disabled class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mt-4">
                                                <div class="booking-info pay-amount">
                                                    <label>Montant net sans rabais (FCFA)</label>
                                                    <input type="text" value="{{$item->tarif}}" disabled class="form-control">
                                                    <input type="hidden" value="{{$item->tarif}}" name="tarif">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="available-for-ride">
                                                    <label>
                                                        <i class="fa-regular fa-circle-check"></i>Choisir l'option :
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <select name="etat" class="form-control">
                                                        <option value="yes">Valider la commande</option>
                                                        <option value="canceled">Annuler la commande</option>
                                                    </select>
                                                    <input type="hidden" class="form-control" name="commande_id" value="{{$item->id}}" />
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


                    <div class="modal fade" id="pages_modify_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Effectuer la modification de la commande de {{$item->numero_commande}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('commande_location.modifier')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="booking-info pay-amount">
                                                    <label>Entrer la nouvelle date de départ</label>
                                                    <input type="text" id="example-datepicker3" name="date_depart" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="booking-info pay-amount">
                                                    <label>Entrer la nouvelle date d'arrivée</label>
                                                    <input type="text" id="example-datepicker3" name="date_arrivee" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                                    <input type="hidden" class="form-control" name="commande_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div><br>
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
                        title: 'Liste des commandes de location en attente de validation',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Liste des commandes de location en attente de validation',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        title: 'Liste des commandes de location en attente de validation',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Liste des commandes de location en attente de validation',
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

<script type="text/javascript">
    const enableInputCheckbox = document.getElementById('enableInputCheckbox');
    const textInput = document.getElementById('rabais');

    // Ajouter un écouteur d'événement pour détecter les changements de la case à cocher
    enableInputCheckbox.addEventListener('change', function() {
        // Vérifier si la case à cocher est cochée
        if (this.checked) {
            // Activer l'input text si la case est cochée
            textInput.disabled = false;
        } else {
            // Désactiver l'input text si la case est décochée
            textInput.disabled = true;
        }
    });
</script>

@endpush