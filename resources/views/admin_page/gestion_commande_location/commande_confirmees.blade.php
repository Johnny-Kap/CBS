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
                        <th>Date de départ</th>
                        <th>Date d'arrivée</th>
                        <th>Tarif total</th>
                        <th>Nombe de jours</th>
                        <th>Etat de la commande</th>
                        <th>Etat du paiement</th>
                        <th>Commandé par</th>
                        <th>Intitule de la location</th>
                        <th>Commandé le</th>
                        <!-- <th style="width: 150px;" class="text-center">Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($commande_confirmees as $item)
                    <tr>
                        <td>{{$item->numero_commande}}</td>
                        <td>{{$item->date_debut}}</td>
                        <td>{{$item->date_fin}}</td>
                        <td><b>{{$item->tarif}} FCFA</b></td>
                        <td>{{$item->nombre_jours}}</td>
                        <td>@if($item->etat_commande == 'yes') Validée @else En attente @endif</td>
                        <td>@if($item->etat_paiement == 'yes') Payée @else Non payée @endif</td>
                        <td><a href="{{ route('user.profile.details', ['id' => $item->users->id, 'name' => str_slug($item->users->name)]) }}">
                                {{$item->users->name}} {{$item->users->prenom}}
                            </a></td>
                        <td>{{$item->locations->intitule}}</td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <!-- <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit"><i class="fa fa-pencil"></i></button>
                            </div>
                        </td> -->
                    </tr>

                    <div class="modal fade" id="pages_edit" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Effectuer la validation de paiement</h4>
                                    </div>
                                </div>
                                <form action="{{route('commande_location.validation.etat')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <img style="width: 25rem; height: 50rem;" src="{{Storage::url($item->photo)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <h6>Choisir l'option</h6>
                                                    <div class="radio radio-btn">
                                                        <label>
                                                            <select name="etat">
                                                                <option value="Payé">Payé</option>
                                                                <option value="Non payé">Non payé</option>
                                                                <option value="Montant insuffisant">Montant insuffisant</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                    <div class="mt-4">

                                                    </div>
                                                    <input type="hidden" name="commande_id" value="{{$item->id}}" />
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
                <tfoot>
                    <tr>
                        <td colspan="6">
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
                                <a href="#pages_edit" class="btn btn-primary" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#pages_edit" title="Edit Selected"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-times"></i></a>
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
    let table = new DataTable('#general-table');
</script>

@endpush