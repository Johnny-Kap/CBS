@extends('layouts.template')

@section('content')

<div class="main-wrapper login-body">

    <div class="login-wrapper">
        <div class="loginbox">
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
    </div>


</div>

@endsection