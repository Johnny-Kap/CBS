@extends('layouts.template')

@section('content')

<style>

.login-wrapper .loginbox .login-auth {
    width: 100% !important;
}

</style>

<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="loginbox" style="max-width: 100% !important">
            <div class="row">
                <div class="col-lg-4">
                    <div class="login-auth">
                        <div class="login-auth-wrap">
                            <h1 class="text-center">Des soucis avec votre véhicule ? Vous êtes au bon droit...</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="login-auth">
                        <div class="login-auth-wrap">
                            <h1 class="text-center">Vérifier l'éligibilité pour une demande d'une maintenance automobile</h1>
                            <p class="account-subtitle">Entrer votre numéro d'abonnement pour passer une commande de maintenance automobile.
                            </p>
                            <form method="get" action="{{route('commande.maintenance.auto.verify')}}">
                                <div class="form-group">
                                    <label class="form-label">N° abonnement <span class="text-danger">*</span></label>
                                    <div class="pass-group">
                                        <input type="text" name="abonnement" class="form-control pass-input" placeholder="Entrer un N° abonnement" required>
                                    </div>
                                </div>
                                <button class="btn btn-outline-light w-100 btn-size">Vérifier</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="login-auth">
                        <div class="login-auth-wrap text-center">
                            <img src="/../assets/img/pngtree-cute-car-mechanic-transparent-background-png-image_13354517.png" style="width: 60%; height : 60%;" class="img-fluid" alt="Logo">
                            <h6 class="text-center">Mr Raph à votre service: 30 ans de metier... Entrez votre n° d'abonnement et decrivez moi votre ressenti</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection