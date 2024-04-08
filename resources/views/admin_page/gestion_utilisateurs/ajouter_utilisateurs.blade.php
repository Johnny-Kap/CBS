@extends('admin_page.layouts_admin.admin')

@section('content')


<div id="page-content">
    <!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-notes_2"></i>Gestion des utilisateurs<br><small>Ajouter ici !</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('utilisateurs.show')}}"><b>CONSULTER UN UTILISATEUR</b></a></li>
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
                    <h2><strong>Formulaire d'enregistrement</strong> d'un utilisateur</h2>
                </div>
                <!-- END Form Elements Title -->

                <!-- Basic Form Elements Content -->
                <form action="{{route('utilisateurs.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    @csrf
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Nom(s) *</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="name" class="form-control" required placeholder="Entrer un nom">
                        </div>
                        @error('name')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Prénom(s)</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="prenom" class="form-control" placeholder="Entrer un(des) prénom(s)">
                        </div>
                        @error('prenom')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Email *</label>
                        <div class="col-md-9">
                            <input type="email" id="example-text-input" name="email" class="form-control" required placeholder="Entrer un email">
                        </div>
                        @error('email')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val_password">Mot de passe <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="password" id="val_password" required name="password" class="form-control" placeholder="Choose a crazy one..">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            </div>
                        </div>
                        @error('password')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val_confirm_password">Confirmer le mot de passe <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="password" id="val_confirm_password" name="confirm_password" required class="form-control" placeholder="..and confirm it!">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Profession *</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="profession" class="form-control" required placeholder="Entrer une profession">
                        </div>
                        @error('profession')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-datepicker">Date de naissance *</label>
                        <div class="col-md-9">
                            <input type="text" id="example-datepicker2" name="date_naiss" required class="form-control input-datepicker" data-date-format="dd/mm/yy" placeholder="dd/mm/yy">
                        </div>
                        @error('date_naiss')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Biographie</label>
                        <div class="col-xs-9">
                            <textarea id="textarea-ckeditor" name="bio" class="ckeditor"></textarea>
                        </div>
                        @error('bio')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">N° téléphone *</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="tel" required class="form-control" placeholder="Entrer un N° téléphone">
                        </div>
                        @error('tel')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">Adresse *</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="adresse" required class="form-control" placeholder="Entrer une adresse">
                        </div>
                        @error('adresse')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">N° CNI *</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="cni" required class="form-control" placeholder="Entrer un N° CNI">
                        </div>
                        @error('numero_cni')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-datepicker">Date de délivrance CNI *</label>
                        <div class="col-md-9">
                            <input type="text" id="example-datepicker2" name="date_delivrance_cni" required class="form-control input-datepicker" data-date-format="dd/mm/yy" placeholder="dd/mm/yy">
                        </div>
                        @error('date_delivrance_cni')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-text-input">N° passport</label>
                        <div class="col-md-9">
                            <input type="text" id="example-text-input" name="numero_passport" class="form-control" placeholder="Entrer un N° passport">
                        </div>
                        @error('numero_passport')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-datepicker">Date de délivrance passport</label>
                        <div class="col-md-9">
                            <input type="text" id="example-datepicker2" name="date_delivrance_passport" class="form-control input-datepicker" data-date-format="dd/mm/yy" placeholder="dd/mm/yy">
                        </div>
                        @error('date_delivrance_passport')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-file-multiple-input">Photo de profil</label>
                        <div class="col-md-9">
                            <input type="file" id="example-file-multiple-input" name="file">
                        </div>
                        @error('image_illustrative')
                        <div class="text-sm text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="example-select">Le rôle *</label>
                        <div class="col-md-9">
                            <select id="example-select" name="role" class="form-control" size="1">
                                <option value="admin">Administrateur</option>
                                <option value="user">Utilisateur</option>
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