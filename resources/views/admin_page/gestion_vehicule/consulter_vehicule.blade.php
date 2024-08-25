@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Nos véhicules<br><small>Consulter les ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('vehicule.ajouter')}}"><b>AJOUTER UN VEHICULE</b></a></li>
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
            <table id="" class="table table-striped table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>Intitule</th>
                        <th>Description</th>
                        <th>Modele</th>
                        <th>Immatriculation</th>
                        <th>Type de véhicule</th>
                        <th>Etat</th>
                        <th>Images</th>
                        <th>Image illustrative</th>
                        <th>Date de création</th>
                        <th style="width: 150px;" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($showVehicule as $item)
                    <tr>
                        <td>{{$item->intitule}}</td>
                        <td><a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Description" onclick="$('#pages_desc_{{$item->id}}').modal('show');">{!! html_entity_decode( str_limit($item->description, 20)) !!}</a></td>
                        <td>{{$item->modele}}</td>
                        <td>{{$item->numero_immatriculation}}</td>
                        <td>{{$item->type_vehicules->intitule}}</td>
                        <td>{{$item->etat}}</td>
                        <td class="text-center">
                            @foreach($item->images as $image)
                            <img src="{{ Storage::url($image) }}" alt="avatar" style="height: 50px;">
                            @endforeach
                        </td>
                        <td class="text-center">
                            <img src="{{ Storage::url($item->image_illustrative) }}" alt="avatar" style="height: 50px;">
                        </td>
                        <td><a href="javascript:void(0)" class="label label-primary">{{$item->created_at->format('d/m/Y')}}</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit_{{$item->id}}"><i class="fa fa-pencil-square-o" title="Modifier"></i></button>
                            </div>
                        </td>
                    </tr>


                    <div class="modal fade" id="pages_desc_{{$item->id}}" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">La description du véhicule {{$item->intitule}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('vehicule.edit')}}" method="post">
                                    @csrf
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
                                                        @foreach($type_vehicule as $item)
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


@endpush