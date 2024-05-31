@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Gestion des locations<br><small>Ajouter ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('location.consulter')}}"><b>CONSULTER UNE LOCATION</b></a></li>
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
                    <h2><strong>Formulaire d'enregistrement</strong> d'une location</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form action="{{route('location.add')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    @csrf
                    <!-- <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nom de la location</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="intitule" class="form-control" placeholder="Entrer un nom de la location">
                        </div>
                        @error('intitule')
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
                    </div> -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Choisir le véhicule</label>
                        <div class="col-md-9">
                            <select id="example-select" name="vehicule_id" class="form-control" size="1">
                                @foreach($vehicules as $item)
                                <option value="{{$item->id}}">{{$item->intitule}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Tarif</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="tarif" class="form-control" placeholder="Entrer un tarif">
                        </div>
                        @error('tarif')
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