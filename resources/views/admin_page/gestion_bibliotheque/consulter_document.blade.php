@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Notre bibliothèque<br><small>Consulter les documents ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('admin.bibliotheque.ajouter')}}"><b>AJOUTER UN DOCUMENT DANS LA BIBLIOTHEQUE</b></a></li>
    </ul>
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
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Fichier</th>
                        <th>Ajouté par</th>
                        <th>Date de création</th>
                        <th>Visibilité</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bibliotheque_show as $item)
                    <tr>
                        <td>{{$item->titre}}</td>
                        <td><a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Description" onclick="$('#pages_desc_{{$item->id}}').modal('show');">{!! html_entity_decode( str_limit($item->description, 50)) !!}</a></td>
                        <td>{{$item->pdf}}</td>
                        <td>{{$item->users->name}}</td>
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
                                        <h4 class="mb-0 text-dark fw-bold">La description du document {{$item->titre}}</h4>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="available-for-ride">
                                                <p>
                                                    {!! html_entity_decode($item->description) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <form action="{{route('admin.bibliotheque.edit')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Entrer le titre :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="text" value="{{$item->titre}}" name="titre">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-md-2">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Entrer la description:
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="booking-info pay-amount">
                                                    <textarea id="textarea-ckeditor" name="description" class="ckeditor">{{$item->description}}</textarea>
                                                    <input type="hidden" name="bibliotheque_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-back">Valider les informations <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </form>
                                <form action="{{route('admin.bibliotheque.edit.file')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <h4 class="text-center">Gérez le fichier ici</h4>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Fichier (PDF) :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input type="file" id="example-file-multiple-input" name="pdf">
                                                    <input type="hidden" name="bibliotheque_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-back">Valider le fichier <i class="fa fa-arrow-right"></i></button>
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
                                        <h4 class="mb-0 text-dark fw-bold">Masquer le document {{$item->titre}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('admin.bibliotheque.masked')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="available-for-ride">
                                                    <h3>
                                                        <i class="fa-regular fa-circle-check"></i>Voulez-vous vraiment masquer ce document ?
                                                    </h3>
                                                    <input type="hidden" name="bibliotheque_id" value="{{$item->id}}" />
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
                                        <h4 class="mb-0 text-dark fw-bold">Démasquer le document {{$item->titre}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('admin.bibliotheque.demasked')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="available-for-ride">
                                                    <h3>
                                                        <i class="fa-regular fa-circle-check"></i>Voulez-vous vraiment démasquer ce document ?
                                                    </h3>
                                                    <input type="hidden" name="bibliotheque_id" value="{{$item->id}}" />
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
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="btn-group btn-group-sm pull-right">
                                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                <div class="btn-group btn-group-sm dropup">
                                    <a href="javascript:void(0)" class="btn btn-primary pull-right dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                        <li><a href="javascript:void(0)"><i class="fa fa-print pull-right"></i>
                                                Print</a></li>
                                        <li class="dropdown-header"><i class="fa fa-share pull-right"></i> Export As
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">.pdf</a>
                                            <a href="javascript:void(0)">.cvs</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn-group btn-group-sm">

                                <!-- <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-times"></i></a> -->
                            </div>
                        </td>
                    </tr>
                </tfoot>
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
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        }
    });
</script>


@endpush