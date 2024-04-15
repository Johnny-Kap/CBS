@extends('layouts.template')

@section('content')


<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>Formulaire d'expression de besoin de formation</h1>
                <p class="account-subtitle">
                    Nous vous enverrons un e-mail après validation de la commande.

                </p>
                <form method="POST" action="{{ route('besoin.formation.store') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Titre de la formation <span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control" name="theme" autofocus required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Catégorie de la formation </label>
                        <input id="name" type="text" class="form-control" name="categorie" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description de la formation <span class="text-danger">*</span></label>
                        <input id="prenom" type="text" class="form-control" required name="description" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Durée (Heure(s) et Minutes(s)) <span class="text-danger">*</span></label>
                        <input id="prenom" type="text" placeholder="Ex : 1H30" required class="form-control" name="duree" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Heure de début <span class="text-danger">*</span></label>
                        <input type="time" name="heure_debut" required class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Heure de fin <span class="text-danger">*</span></label>
                        <input type="time" name="heure_fin" required class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nombre de place <span class="text-danger">*</span></label>
                        <input type="number" name="nb_place" required class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Type de cours <span class="text-danger">*</span></label>
                        <select name="type_cours" class="form-control" id="">
                            <option value="ligne">En ligne</option>
                            <option value="presentiel_sur_site">Présentiel sur site CBS</option>
                            <option value="presentiel_hors_site">Présentiel hors site CBS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Lieu (En cas de cours en pésentiel hors site) </label>
                        <input type="text" name="lieu" class="form-control" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date de formation <span class="text-danger">*</span></label>
                        <input id="email" type="text" class="form-control datetimepicker" placeholder="04/02/2024" name="date_formation" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nom(s) formateur </label>
                        <input id="situation_vehicule" type="text" class="form-control" name="nom_formateur" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Prénom(s) formateur </label>
                        <input id="tel" type="text" class="form-control" name="prenom_formateur" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Téléphone formateur </label>
                        <input id="adresse" type="text" class="form-control" name="tel_formateur" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email formateur </label>
                        <input id="numero_cni" type="email" class="form-control" name="email_formateur" />
                    </div>
                    <button type="submit" class="btn btn-outline-light w-100 btn-size mt-1">Valider</button>

                    <div class="text-center dont-have">
                        Lorsque vous validez votre commande, vous acceptez nos <a href="{{route('term_condition')}}">termes et conditions</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection