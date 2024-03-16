@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Gestion des validations de paiement des achats et livraison de panier<br><small>Consulter les ici !</small>
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
        <div class="table-options clearfix">
            <div class="btn-group btn-group-sm pull-right">
                <a href="javascript:void(0)" class="btn btn-primary active" id="style-striped" data-toggle="tooltip" title=".table-striped">Striped</a>
                <a href="javascript:void(0)" class="btn btn-primary" id="style-condensed" data-toggle="tooltip" title=".table-condensed">Condensed</a>
                <a href="javascript:void(0)" class="btn btn-primary" id="style-hover" data-toggle="tooltip" title=".table-hover">Hover</a>
            </div>
            <div class="btn-group btn-group-sm pull-left" data-toggle="buttons">
                <label id="style-default" class="btn btn-primary active" data-toggle="tooltip" title=".table">
                    <input type="radio" name="style-options"> Default
                </label>
                <label id="style-bordered" class="btn btn-primary" data-toggle="tooltip" title=".table-bordered">
                    <input type="radio" name="style-options"> Bordered
                </label>
                <label id="style-borderless" class="btn btn-primary" data-toggle="tooltip" title=".table-borderless">
                    <input type="radio" name="style-options"> Borderless
                </label>
            </div>
        </div>
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
            <table id="general-table" class="table table-striped table-vcenter">
                <thead>
                    <tr>
                        <th>N° Commande</th>
                        <th>Type de prestation</th>
                        <th>Contenu du panier</th>
                        <th>Date de livraison</th>
                        <th>Adresse recupération</th>
                        <th>Adresse de livraison</th>
                        <th>Montant</th>
                        <th>Mode de paiement</th>
                        <th>Etat du paiement</th>
                        <th>Commandé par</th>
                        <th>Commandé le</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($achat_livraison_validation_paiement as $item)
                    <tr>
                        <td>{{$item->numero_commande}}</td>
                        <td>{{$item->type_prestation}}</td>
                        <td>{{$item->contenu_panier}}</td>
                        <td>{{$item->date_livraison}}</td>
                        <td>{{$item->adresse_recuperation}}</td>
                        <td>{{$item->adresse_livraison}}</td>
                        <td>{{$item->montant}}</td>
                        <td>{{$item->mode_paiements->intitule}}</td>
                        <td>@if($item->etat_paiement == 'yes') Payé @else En attente de validation @endif</td>
                        <td>{{$item->users->name}}</td>
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
                                        <h4 class="mb-0 text-dark fw-bold">Effectuer la validation de paiement</h4>
                                    </div>
                                </div>
                                <form action="{{route('achat_livraison.paiement.valide')}}" method="post">
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
                                                            <select name="etat">
                                                                <option value="yes">Payé</option>
                                                                <option value="no">Non payé</option>
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