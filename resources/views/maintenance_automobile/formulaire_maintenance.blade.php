@extends('layouts.template')

@section('content')


<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>Formulaire de maintenance</h1>
                <p class="account-subtitle">
                    Nous vous enverrons un e-mail après validation de la commande.

                </p>
                <form method="POST" action="{{ route('commande.maintenance.auto.add') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Intitulé de la panne <span class="text-danger">*</span></label>
                        <input id="name" type="text" class="form-control" name="intitule" autofocus required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description de la panne </label>
                        <input id="prenom" type="text" class="form-control" name="debrief" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date et heure souhatée de réparation <span class="text-danger">*</span></label>
                        <input id="email" type="text" class="form-control datetimepicker" placeholder="04/02/2024" name="date_maintenance" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Immatriculation du véhicule <span class="text-danger">*</span></label>
                        <input id="immatriculation" type="text" class="form-control" name="immatriculation" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Situation du véhicule <span class="text-danger">*</span></label>
                        <input id="situation_vehicule" type="text" class="form-control" name="situation_vehicule" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Marque du véhicule </label>
                        <input id="tel" type="text" class="form-control" name="marque_vehicule" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Modele du véhicule </label>
                        <input id="adresse" type="text" class="form-control" name="modele_vehicule" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Type de moteur </label>
                        <input id="numero_cni" type="text" class="form-control" name="type_moteur" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Année véhicule </label>
                        <input id="numero_cni" type="text" class="form-control" name="annee_vehicule" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Kilométrage </label>
                        <input id="numero_cni" type="text" class="form-control" name="kilometrage" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">N° de série du véhicule </label>
                        <input id="numero_cni" type="text" class="form-control" name="numero_serie" />
                    </div>
                    <input type="hidden" name="abonnement" value="{{$abonnement}}">
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