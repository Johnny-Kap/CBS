@extends('layouts.template')

@section('content')


<div class="main-wrapper login-body">
    <header class="log-header">
        <a href="index.html"><img class="img-fluid logo-dark" src="assets/img/logo_first.png" alt="Logo" /></a>
    </header>

    <div class="login-wrapper">
        <div class="loginbox">
            <div class="login-auth">
                <div class="login-auth-wrap">
                    <div class="sign-group">
                        <a href="{{url('/')}}" class="btn sign-up"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                            Retour accueil</a>
                    </div>
                    <h1>S'inscrire</h1>
                    <p class="account-subtitle">
                        Nous vous enverrons un code de confirmation à votre adresse e-mail.

                    </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nom <span class="text-danger">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Prénom </label>
                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" autocomplete="prenom" />

                            @error('prenom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Profession <span class="text-danger">*</span></label>
                            <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession" />

                            @error('profession')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Téléphone <span class="text-danger">*</span></label>
                            <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" />

                            @error('tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Adresse <span class="text-danger">*</span></label>
                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" />

                            @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Numéro de CNI <span class="text-danger">*</span></label>
                            <input id="numero_cni" type="text" class="form-control @error('numero_cni') is-invalid @enderror" name="numero_cni" value="{{ old('numero_cni') }}" required autocomplete="numero_cni" />

                            @error('numero_cni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Date de délivrance CNI <span class="text-danger">*</span></label>
                            <input id="date_delivrance_cni" type="text" class="form-control datetimepicker @error('date_delivrance_cni') is-invalid @enderror" placeholder="04/11/2023" name="date_delivrance_cni" value="{{ old('date_delivrance_cni') }}" required autocomplete="date_delivrance_cni">

                            @error('date_delivrance_cni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Numéro de Passport <span class="text-danger">*</span></label>
                            <input id="numero_passport" type="text" class="form-control @error('numero_passport') is-invalid @enderror" name="numero_passport" value="{{ old('numero_passport') }}" required autocomplete="numero_passport" />

                            @error('numero_passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Date de délivrance Passport <span class="text-danger">*</span></label>
                            <input id="date_delivrance_passport" type="text" class="form-control datetimepicker @error('date_delivrance_passport') is-invalid @enderror" placeholder="04/11/2023" name="date_delivrance_passport" value="{{ old('date_delivrance_passport') }}" required autocomplete="date_delivrance_passport">

                            @error('date_delivrance_passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                            <div class="pass-group">
                                <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                                <span class="fas fa-eye toggle-password"></span>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirmation de mot de passe <span class="text-danger">*</span></label>
                            <div class="pass-group">
                                <input id="password-confirm" type="password" class="form-control pass-input" name="password_confirmation" required autocomplete="new-password" />
                                <span class="fas fa-eye toggle-password"></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-light w-100 btn-size mt-1">S'inscrire</button>

                        <div class="text-center dont-have">
                            Avez-vous déja un compte ? <a href="{{route('login')}}">Se connecter</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @endsection