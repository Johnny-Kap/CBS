@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Gestion des factures de commande de livraison de panier<br><small>Consulter les factures ici !</small>
            </h1>
        </div>
    </div>
    <!-- <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('admin.bibliotheque.ajouter')}}"><b>AJOUTER UN DOCUMENT DANS LA BIBLIOTHEQUE</b></a></li>
    </ul> -->
    <!-- END Table Styles Header -->

    <!-- Table Styles Block -->
    <div class="block full">
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
            <table id="example-datatable" class="table table-striped table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>N° Facture</th>
                        <th>Type de prestation</th>
                        <th>Commandé par</th>
                        <th>Date de commande</th>
                        <th style="width: 150px;" class="text-center">Générer facture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facture_commande_livraison as $item)
                    <tr>
                        <td>#CLP{{$item->id}}</td>
                        <td>{{$item->livraisons->type_prestation}}</td>
                        <td>{{$item->livraisons->users->name}}</td>
                        <td><a href="javascript:void(0)" class="label label-primary">{{$item->livraisons->created_at->format('d/m/Y')}}</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit_{{$item->id}}"><i class="fa fa-pencil-square-o" title="Modifier"></i></button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="pages_edit_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Générer la facture N° {{$item->id}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('facture.commande_livraison_panier.generer')}}" method="get">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <h3>Voulez-vous vraiment générer la facture de cette commande ?</h3>
                                                    <input type="hidden" name="facture_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                        <button type="submit" class="btn btn-primary">Oui <i class="fa fa-arrow-right"></i></button>
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
    let table = new DataTable('#example-datatable', {
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
                        title: 'Liste de facture des commandes de location',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Liste de facture des commandes de location',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        title: 'Liste de facture des commandes de location',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Liste de facture des commandes de location',
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