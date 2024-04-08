@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Gestion des formations<br><small>Ajouter ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('admin.formation.consulter')}}"><b>CONSULTER UNE FORMATION</b></a></li>
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
                    <h2><strong>Formulaire d'enregistrement</strong> d'une formation</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form action="{{route('admin.formation.add')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nom de la formation (Thème) <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="theme" required class="form-control" placeholder="Entrer un nom de la formation">
                        </div>
                        @error('intitule')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Description <span class="text-danger">*</span></label>
                        <div class="col-xs-9">
                            <textarea id="textarea-ckeditor" name="description" required class="ckeditor"></textarea>
                        </div>
                        @error('description')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Durée (Heure(s) et minute(s)) <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="duree" class="form-control" required placeholder="Entrer la durée de la formation">
                        </div>
                        @error('duree')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-datepicker">Date de formation <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" id="example-datepicker2" name="date_formation" required class="form-control input-datepicker" data-date-format="dd/mm/yy" placeholder="dd/mm/yy">
                        </div>
                        @error('date_formation')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-timepicker24">Heure de début <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" id="example-timepicker24" name="heure_debut" required class="form-control input-timepicker24">
                                <span class="input-group-btn">
                                    <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-timepicker24">Heure de fin <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <div class="input-group bootstrap-timepicker">
                                <input type="text" id="example-timepicker24" name="heure_fin" required class="form-control input-timepicker24">
                                <span class="input-group-btn">
                                    <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nombre de places <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="number" id="example-text-input" name="nb_place" required class="form-control" placeholder="Entrer le nombre de place">
                        </div>
                        @error('nb_place')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Lieu de formation</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="lieu" class="form-control" placeholder="Entrer un lieu de la formation">
                        </div>
                        @error('lieu')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Choisir le type de formation <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <select id="example-select" name="moyen_diffusion" class="form-control" size="1">
                                <option value="presentiel/ligne">Présentiel / En ligne</option>
                                <option value="presentiel">Présentiel</option>
                                <option value="ligne">En ligne</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Montant <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="number" id="example-text-input" name="montant" required class="form-control" placeholder="Entrer le montant de la formation">
                        </div>
                        @error('montant')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nom(s) du formateur <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="nom_formateur" required class="form-control" placeholder="Entrer nom(s) du formateur">
                        </div>
                        @error('nom_formateur')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Prénom(s) du formateur</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="prenom_formateur" class="form-control" placeholder="Entrer prénom(s) du formateur">
                        </div>
                        @error('prenom_formateur')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">N° téléphone du formateur</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="tel_formateur" class="form-control" placeholder="Entrer un N° téléphone du formateur">
                        </div>
                        @error('tel_formateur')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Email du formateur</label>
                        <div class="col-md-9">
                            <input type="email" id="example-text-input" name="email_formateur" class="form-control" placeholder="Entrer un Email du formateur">
                        </div>
                        @error('email_formateur')
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