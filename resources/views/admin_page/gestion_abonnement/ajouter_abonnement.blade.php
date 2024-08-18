@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Gestion des abonnements<br><small>Ajouter ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('abonnement.consulter')}}"><b>CONSULTER UN ABONNEMENT</b></a></li>
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
                    <h2><strong>Formulaire d'enregistrement</strong> d'un abonnement</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form action="{{route('abonnement.add')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Intitule de l'abonnement</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="intitule" class="form-control" required placeholder="Entrer un intitule de l'abonnement">
                        </div>
                        @error('intitule')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Code de l'abonnement</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="code" class="form-control" required placeholder="Entrer un code de l'abonnement">
                        </div>
                        @error('code')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Montant</label>
                        <div class="col-md-9">
                            <input type="number" id="example-text-input" name="montant" class="form-control" required placeholder="Entrer un montant">
                        </div>
                        @error('montant')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Rabais en %</label>
                        <div class="col-md-9">
                            <input type="number" id="example-text-input" name="rabais" class="form-control" required placeholder="Entrer un pourcentage de rabais">
                        </div>
                        @error('rabais')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nombre de livraison du panier</label>
                        <div class="col-md-9">
                            <input type="number" id="example-text-input" name="nombre_livraison_panier" class="form-control" required placeholder="Entrer un nombre de livraison du panier">
                        </div>
                        @error('nombre_livraison_panier')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nombre de de dépot et recupération à l'aéroport</label>
                        <div class="col-md-9">
                            <input type="number" id="example-text-input" name="recuperation_aeroport" class="form-control" required placeholder="Entrer un nombre de recuperation à l'aéroport">
                        </div>
                        @error('nombre_livraison_panier')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Les éléments du package</label>
                        <div class="col-xs-9">
                            <textarea id="textarea-ckeditor" name="packages" class="ckeditor"></textarea>
                        </div>
                        @error('packages')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Choisir le type d'abonnement</label>
                        <div class="col-md-9">
                            <select id="example-select" name="type_abonnement_id" class="form-control" size="1">
                                @foreach($type_abonnements as $item)
                                <option value="{{$item->id}}">{{$item->intitule}}</option>
                                @endforeach
                            </select>
                        </div>
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