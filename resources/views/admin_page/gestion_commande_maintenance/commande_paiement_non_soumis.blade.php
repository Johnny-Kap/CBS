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
            <table id="general-table" class="table table-striped table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>N° Commande main.</th>
                        <th>Intitulé de la panne</th>
                        <th>Description de la panne</th>
                        <th>Date de main. souhaitée</th>
                        <th>Situation du véhicule</th>
                        <th>Marque du véhicule</th>
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
                        <td>{{$item->intitule}}</td>
                        <td>{{$item->debrief}}</td>
                        <td>{{$item->date_maintenance}}</td>
                        <td>{{$item->situation_vehicule}}</td>
                        <td>{{$item->marque_vehicule}}</td>
                        <td>@if($item->etat_commande == 'yes') Validée @else En attente @endif</td>
                        <td>@if($item->etat_paiement == 'yes') Payé @else Non payé @endif</td>
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



<div class="modal fade" id="pages_delete" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="form-header text-start mb-0">
                    <h4 class="mb-0 text-dark fw-bold">Availability Details</h4>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="align-center" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="available-for-ride">
                            <p>
                                <i class="fa-regular fa-circle-check"></i>Chevrolet Camaro
                                is available for a ride
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="row booking-info">
                            <div class="col-md-4 pickup-address">
                                <h5>Pickup</h5>
                                <p>45, 4th Avanue Mark Street USA</p>
                                <span>Date & time : 11 Jan 2023</span>
                            </div>
                            <div class="col-md-4 drop-address">
                                <h5>Drop Off</h5>
                                <p>78, 10th street Laplace USA</p>
                                <span>Date & time : 11 Jan 2023</span>
                            </div>
                            <div class="col-md-4 booking-amount">
                                <h5>Booking Amount</h5>
                                <h6><span>$300 </span> /day</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="booking-info seat-select">
                            <h6>Extra Service</h6>
                            <label class="custom_check">
                                <input type="checkbox" name="rememberme" class="rememberme" />
                                <span class="checkmark"></span>
                                Baby Seat - <span class="ms-2">$10</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="booking-info pay-amount">
                            <h6>Deposit Option</h6>
                            <div class="radio radio-btn">
                                <label>
                                    <input type="radio" name="radio" /> Pay Deposit
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="radio" /> Full Amount
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="booking-info service-tax">
                            <ul>
                                <li>Booking Price <span>$300</span></li>
                                <li>Extra Service <span>$10</span></li>
                                <li>Tax <span>$5</span></li>
                            </ul>
                        </div>
                        <div class="grand-total">
                            <h5>Grand Total</h5>
                            <span>$315</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="booking.html" class="btn btn-back">Go to Details<i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection