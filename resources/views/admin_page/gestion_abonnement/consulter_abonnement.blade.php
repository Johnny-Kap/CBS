@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Nos abonnements<br><small>Consulter les ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('abonnement.ajouter')}}"><b>AJOUTER UN ABONNEMENT</b></a></li>
    </ul>
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
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Intitule</th>
                        <th>Code</th>
                        <th>Montant</th>
                        <th>Rabais</th>
                        <th>Nbre de livraison du panier</th>
                        <th>Nbre de recupération à l'aéroport</th>
                        <th>Packages</th>
                        <th>Type d'abonnement</th>
                        <th>Date de création</th>
                        <th>Visibilité</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($abonnements as $item)
                    <tr>
                        <td>{{$item->intitule}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->montant}}</td>
                        <td>{{$item->rabais}}</td>
                        <td>{{$item->nombre_livraison_panier}}</td>
                        <td>{{$item->recuperation_aeroport}}</td>
                        <td><a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Description" onclick="$('#pages_desc_{{$item->id}}').modal('show');">{!! html_entity_decode( str_limit($item->packages, 50)) !!}</a></td>
                        <td>{{$item->type_abonnements->intitule}}</td>
                        <td><a href="javascript:void(0)" class="label label-primary">{{$item->created_at->format('d/m/Y')}}</a></td>
                        <td>@if($item->masked == 'no') <span class="label label-success">Visible</span> @else <span class="label label-danger">Masqué</span> @endif</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit_{{$item->id}}"><i class="fa fa-pencil-square-o" title="Modifier"></i></button>
                                @if($item->masked == 'no')
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_mask_{{$item->id}}"><i class="fa fa-eye-slash" title="Masquer"></i></button>
                                @else
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_demask_{{$item->id}}"><i class="fa fa-eye" title="Démasquer"></i></button>
                                @endif
                            </div>
                        </td>
                    </tr>


                    <div class="modal fade" id="pages_desc_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Packages de l'abonnement {{$item->intitule}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('vehicule.edit')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="available-for-ride">
                                                    <p>
                                                        {!! html_entity_decode($item->packages) !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="pages_mask_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Masquer l'abonnement {{$item->intitule}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('abonnement.masked')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="available-for-ride">
                                                    <h3>
                                                        <i class="fa-regular fa-circle-check"></i>Voulez-vous vraiment masquer cet abonnement ?
                                                    </h3>
                                                    <input type="hidden" name="abonnement_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                        <button type="submit" class="btn btn-default">Oui</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="pages_demask_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Démasquer l'abonnement {{$item->intitule}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('abonnement.demasked')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="available-for-ride">
                                                    <h3>
                                                        <i class="fa-regular fa-circle-check"></i>Voulez-vous vraiment démasquer cet abonnement ?
                                                    </h3>
                                                    <input type="hidden" name="abonnement_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                        <button type="submit" class="btn btn-default">Oui</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="pages_edit_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Modifier</h4>
                                    </div>
                                </div>
                                <form action="{{route('abonnement.edit')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Intitule de l'abonnement :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="text" value="{{$item->intitule}}" name="intitule">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Code de l'abonnement :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="text" value="{{$item->code}}" name="code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Montant :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="number" value="{{$item->montant}}" name="montant">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Rabais :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="number" value="{{$item->rabais}}" name="rabais">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Nombre de livraison de panier :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="number" value="{{$item->nombre_livraison_panier}}" name="nombre_livraison_panier">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Nombre de de dépot et recupération à l'aéroport :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="number" value="{{$item->recuperation_aeroport}}" name="recuperation_aeroport">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Entrer le packages:
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="booking-info pay-amount">
                                                    <textarea id="textarea-ckeditor" name="packages" class="ckeditor">{{$item->packages }}</textarea>
                                                    <input type="hidden" name="abonnement_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Choisir le type d'abonnement :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <select id="example-select" name="type_abonnement_id" class="form-control" size="1">
                                                        @foreach($type_abonnement as $item)
                                                        <option value="{{$item->id}}">{{$item->intitule}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-back">Valider les informations <i class="fa fa-arrow-right"></i></button>
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
        }
    });
</script>

@endpush