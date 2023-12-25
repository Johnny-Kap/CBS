@extends('admin_page.layouts_admin.admin')

@section('content')


<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Gestion des vehicules<br><small>Ajouter ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('vehicule.consulter')}}"><b>CONSULTER UN VEHICULE</b></a></li>
    </ul>
    <!-- END Forms General Header -->

    <div class="row">
        <div class="col-md-12">
            <!-- Basic Form Elements Block -->
            <div class="block">
                <!-- Basic Form Elements Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                    </div>
                    <h2><strong>Formulaire d'enregistrement</strong> d'un véhicule</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form action="{{route('vehicule.add')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nom du véhicule</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="intitule" class="form-control" placeholder="Entrer un nom">
                        </div>
                        @error('intitule')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Immatriculation</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="immatriculation" class="form-control" placeholder="Entrer une immatriculation">
                        </div>
                        @error('immatriculation')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Modele</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="modele" class="form-control" placeholder="Entrer un modele">
                        </div>
                        @error('modele')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Couleur</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="couleur" class="form-control" placeholder="Entrer une couleur">
                        </div>
                        @error('couleur')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-datepicker">Année de fabrication</label>
                        <div class="col-md-9">
                            <input type="text" id="example-datepicker2" name="annee_fabrication" class="form-control input-datepicker" data-date-format="dd/mm/yy" placeholder="dd/mm/yy">
                        </div>
                        @error('annee_fabrication')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Description</label>
                        <div class="col-xs-9">
                            <textarea id="textarea-ckeditor" name="description" class="ckeditor"></textarea>
                        </div>
                        @error('description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Etat du véhicule</label>
                        <div class="col-md-9">
                            <select id="example-select" name="etat" class="form-control" size="1">
                                <option value="Très bon état">Très bon état</option>
                                <option value="Bon état">Bon état</option>
                                <option value="Moyen état">Moyen état</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Type de transmission</label>
                        <div class="col-md-9">
                            <select id="example-select" name="transmission" class="form-control" size="1">
                                <option value="Automatique">Automatique</option>
                                <option value="Manuelle">Manuelle</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Type de moteur</label>
                        <div class="col-md-9">
                            <select id="example-select" name="moteur" class="form-control" size="1">
                                <option value="Essence">Essence</option>
                                <option value="Diesel">Diesel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nombre de kilometrage</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="kilometrage" class="form-control" placeholder="Entrer le nombre de kilometrage">
                        </div>
                        @error('kilometrage')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Air conditionné</label>
                        <div class="col-md-9">
                            <select id="example-select" name="air_conditionne" class="form-control" size="1">
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nombre de portières</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="nombre_portieres" class="form-control" placeholder="Entrer le nombre de portières">
                        </div>
                        @error('nombre_portieres')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">fonctionnalités du vehicules</label>
                        <div class="col-md-9">
                            <input type="text" id="example-tags" name="fonctionnalites" class="input-tags" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Type de véhicule</label>
                        <div class="col-md-9">
                            <select id="example-select" name="type_vehicule_id" class="form-control" size="1">
                                @foreach($type_vehicule as $item)
                                <option value="{{$item->id}}">{{$item->intitule}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-file-multiple-input">Images</label>
                        <div class="col-md-9">
                            <input type="file" id="example-file-multiple-input" name="images[]" multiple>
                        </div>
                        @error('images[]')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-file-multiple-input">Image illustrative</label>
                        <div class="col-md-9">
                            <input type="file" id="example-file-multiple-input" name="image_illustrative">
                        </div>
                        @error('image_illustrative')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i>
                                Ajouter</button>
                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i>
                                Reset</button>
                        </div>
                    </div>
                </form>
                <!-- END Basic Form Elements Content -->
            </div>
            <!-- END Basic Form Elements Block -->
        </div>
    </div>
</div>

@endsection