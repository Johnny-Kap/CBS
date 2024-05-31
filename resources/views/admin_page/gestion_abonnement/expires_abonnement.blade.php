@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Gestion des souscriptions d'abonnements expirées<br><small>Consulter les ici !</small>
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
                        <th>N° Abonnement</th>
                        <th>Abonnement</th>
                        <th>Montant</th>
                        <th>Date expiration</th>
                        <th>Expiration</th>
                        <th>Commandé par</th>
                        <th>Commandé le</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abonnement_expires as $item)
                    <tr>
                        <td>{{$item->numero_abonnement}}</td>
                        <td>{{$item->abonnements->intitule}}</td>
                        <td><b>{{$item->montant}} FCFA</b></td>
                        <td>{{$item->date_expiration}}</td>
                        <td>@if($item->is_expired == 'no') Non expirée @else Expirée @endif</td>
                        <td><a href="{{ route('user.profile.details', ['id' => $item->users->id, 'name' => str_slug($item->users->name)]) }}">
                                {{$item->users->name}} {{$item->users->prenom}}
                            </a></td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                    </tr>

                    <div class="modal fade" id="pages_edit" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Effectuer la validation de paiement</h4>
                                    </div>
                                </div>
                                <form action="{{route('abonnement.paiement.valide')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <img style="width: 25rem; height: 50rem;" src="{{Storage::url($item->image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <h6>Choisir l'option</h6>
                                                    <div class="radio radio-btn">
                                                        <label>
                                                            <select name="is_buy">
                                                                <option value="yes">Payé</option>
                                                                <option value="no">Non payé</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="mt-4">

                                                    </div>
                                                    <input type="hidden" name="souscrire_abonnement_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Valider <i class="fa fa-arrow-right"></i></button>
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
                        title: 'Liste des abonnements expirés',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Liste des abonnements expirés',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        title: 'Liste des abonnements expirés',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Liste des abonnements expirés',
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