@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Les utilisateurs<br><small>Consulter les ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('utilisateurs.create')}}"><b>AJOUTER UN UTILISATEUR</b></a></li>
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
                        <th>ID</th>
                        <th>Nom(s)</th>
                        <th>Prénom(s)</th>
                        <th>Email</th>
                        <th>Date de naissance</th>
                        <th>Profession</th>
                        <th>Téléphone</th>
                        <th>Photo de profil</th>
                        <th>Rôle</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $item)
                    <tr>
                        <td><a href="{{ route('user.profile.details', ['id' => $item->id, 'name' => str_slug($item->name)]) }}">
                                {{$item->id}}
                            </a></td>
                        <td>{{$item->name}}</td>
                        <td>@if($item->prenom != null) {{$item->prenom}} @else Non renseigné @endif</td>
                        <td>{{$item->email}}</td>
                        <td>@if($item->date_naiss != null) {{$item->date_naiss}} @else Non renseigné @endif</td>
                        <td>@if($item->Profession != null) {{$item->Profession}} @else Non renseigné @endif</td>
                        <td class="text-center">{{$item->tel}}</td>
                        <td class="text-center">
                            @if($item->image != null)
                            <img src="{{ Storage::url($item->image) }}" alt="avatar" style="height: 50px;">
                            @else
                            No image
                            @endif
                        </td>
                        <td><a href="javascript:void(0)" class="label label-primary">{{$item->role}}</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <!-- <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit_{{$item->id}}"><i class="fa fa-pencil-square-o" title="Modifier"></i></button> -->
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_role_{{$item->id}}"><i class="fa fa-users" title="Changer rôle"></i></button>
                            </div>
                        </td>
                    </tr>


                    <div class="modal fade" id="pages_role_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Changer le rôle de {{$item->name}} {{$item->prenom}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('utilisateurs.change.role')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Le rôle
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-6">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <select name="role" id="" class="form-control">
                                                            <option value="user">Utilisateur</option>
                                                            <option value="admin">Administrateur</option>
                                                        </select>
                                                        <input type="hidden" name="user_id" value="{{$item->id}}">
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


                    <div class="modal fade" id="pages_edit_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Modifier</h4>
                                    </div>
                                </div>
                                <form action="{{route('vehicule.edit')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Nom du véhicule :
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
                                                        <i class="fa-regular fa-circle-check"></i>Immatriculation :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="text" value="{{$item->numero_immatriculation}}" name="immatriculation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Modele :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="text" value="{{$item->modele}}" name="modele">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Couleur :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="text" value="{{$item->couleur}}" name="couleur">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Année de fabrication :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="text" value="{{$item->annee_fabrication}}" name="annee_fabrication">
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
                                                    <input type="hidden" name="vehicule_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Etat du véhicule :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <select id="example-select" name="etat" class="form-control" size="1">
                                                        <option value="Très bon état">Très bon état</option>
                                                        <option value="Bon état">Bon état</option>
                                                        <option value="Moyen état">Moyen état</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Type de transmission :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <select id="example-select" name="transmission" class="form-control" size="1">
                                                        <option value="Automatique">Automatique</option>
                                                        <option value="Manuelle">Manuelle</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Type de moteur :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <select id="example-select" name="moteur" class="form-control" size="1">
                                                        <option value="Essence">Essence</option>
                                                        <option value="Diesel">Diesel</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Nombre de kilometrage :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="number" value="{{$item->nombre_kilometrage}}" name="kilometrage">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Air conditionné :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <select id="example-select" name="air_conditionne" class="form-control" size="1">
                                                        <option value="Oui">Oui</option>
                                                        <option value="Non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Nombre de portieres :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input class="form-control" type="number" value="{{$item->nombre_portieres}}" name="nombre_portieres">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Fonctionnalites du véhicule :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input type="text" id="example-tags" name="fonctionnalites" value="{{$item->fonctionnalites}}" class="input-tags" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Type de véhicule :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <select id="example-select" name="type_vehicule_id" class="form-control" size="1">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-back">Valider les informations <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </form>
                                <form action="{{route('vehicule.edit.images')}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <h4 class="text-center">Gérez les images ici</h4>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Les images du véhicule :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input type="file" id="example-file-multiple-input" name="images[]" multiple>
                                                    <input type="hidden" name="vehicule_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4">
                                                <div class="available-for-ride">
                                                    <p>
                                                        <i class="fa-regular fa-circle-check"></i>Image illustrative :
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="booking-info pay-amount">
                                                    <input type="file" id="example-file-multiple-input" name="image_illustrative">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-back">Valider les images <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="10">
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
                                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit Selected"><i class="fa fa-pencil"></i></a>
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