@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Créer une souscription dabonnement pour un utilisateur<br><small>Créer ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('abonnement.confirmes')}}"><b>CONSULTER UNE SOUSCRIPTION D'ABONNEMENT CONFIRMES</b></a></li>
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
                    <h2><strong>Formulaire d'enregistrement</strong> d'une souscription d'abonnement</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form action="{{route('abonnement.souscrire.new')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Choisir l'abonnement</label>
                        <div class="col-md-9">
                            <select id="example-select" name="abonnement_id" class="form-control" size="1">
                                @foreach($abonnements as $item)
                                <option value="{{$item->id}}">{{$item->intitule}} - {{$item->montant}} FCFA</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Choisir l'utilisateur</label>
                        <div class="col-md-9">
                            <select id="example-select" name="user_id" class="form-control" size="1">
                                @foreach($users as $item)
                                <option value="{{$item->id}}">{{$item->name}} {{$item->prenom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input"><i class="fa fa-info-circle"></i> Information</label>
                        <div class="col-md-9">
                            <label class="control-label" for="example-text-input">Après la validation, le client devra s'arimer aux conditions et termes et l'abonnement sera automatique valide.</label>
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