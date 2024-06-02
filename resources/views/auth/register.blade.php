@extends('layouts.template')

@push('style')

<style>
    .content-div {
    display: none; /* Masque les divs par défaut */
}

</style>
@endpush

@section('content')


<div class="main-wrapper login-body">
    <header class="log-header">
        <img class="img-fluid logo-dark" src="assets/img/logo_first.png" alt="Logo" />
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
                            <label class="form-label">NIU (Numéro d'Identification Unique) </label>
                            <input id="adresse" type="text" class="form-control @error('niu') is-invalid @enderror" name="niu" value="{{ old('niu') }}" autocomplete="niu" />

                            @error('niu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Je reside : <span class="text-danger">*</span></label>
                            <select name="residence" id="mySelect" class="form-control">
                                <option value="">Selectionner votre lieu de résidence</option>
                                <option value="cameroun">Au cameroun</option>
                                <option value="hors_cameroun">Hors du cameroun</option>
                            </select>
                        </div>
                        <div class="form-group content-div" id="div_numero_cni">
                            <label class="form-label">Numéro de CNI <span class="text-danger">*</span></label>
                            <input id="input_numero_cni" type="text" class="form-control @error('numero_cni') is-invalid @enderror" name="numero_cni" value="{{ old('numero_cni') }}" autocomplete="numero_cni" />

                            @error('numero_cni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group content-div" id="div_date_cni">
                            <label class="form-label">Date de délivrance CNI <span class="text-danger">*</span></label>
                            <input id="input_date_cni" type="text" class="form-control datetimepicker @error('date_delivrance_cni') is-invalid @enderror" placeholder="04/11/2023" name="date_delivrance_cni" value="{{ old('date_delivrance_cni') }}" autocomplete="date_delivrance_cni">

                            @error('date_delivrance_cni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group content-div" id="div_numero_passport">
                            <label class="form-label">Numéro de Passport <span class="text-danger">*</span></label>
                            <input id="input_numero_passport" type="text" class="form-control @error('numero_passport') is-invalid @enderror" name="numero_passport" value="{{ old('numero_passport') }}" autocomplete="numero_passport" />

                            @error('numero_passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group content-div" id="div_date_passport">
                            <label class="form-label">Date de délivrance Passport <span class="text-danger">*</span></label>
                            <input id="input_date_passport" type="text" class="form-control datetimepicker @error('date_delivrance_passport') is-invalid @enderror" placeholder="04/11/2023" name="date_delivrance_passport" value="{{ old('date_delivrance_passport') }}" autocomplete="date_delivrance_passport">

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

    @push('scripts')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById('mySelect');
            const div1 = document.getElementById('div_numero_cni');
            const div2 = document.getElementById('div_numero_passport');
            const div3 = document.getElementById('div_date_cni');
            const div4 = document.getElementById('div_date_passport');
            const input1 = document.getElementById('input_numero_cni');
            const input2 = document.getElementById('input_numero_passport');
            const input3 = document.getElementById('input_date_cni');
            const input4 = document.getElementById('input_date_passport');

            // Masquer les divs et rendre les champs non obligatoires au départ
            div1.style.display = 'none';
            div2.style.display = 'none';
            div3.style.display = 'none';
            div4.style.display = 'none';
            input1.required = false;
            input2.required = false;
            input3.required = false;
            input4.required = false;

            selectElement.addEventListener('change', function() {
                const selectedValue = selectElement.value;

                if (selectedValue === 'cameroun') {
                    div1.style.display = 'block';
                    div3.style.display = 'block';
                    input1.required = true;
                    input3.required = true;
                    div2.style.display = 'none';
                    div4.style.display = 'none';
                    input2.required = false;
                    input4.required = false;
                } else if (selectedValue === 'hors_cameroun') {
                    div1.style.display = 'none';
                    div3.style.display = 'none';
                    input1.required = false;
                    input3.required = false;
                    div2.style.display = 'block';
                    div4.style.display = 'block';
                    input2.required = true;
                    input4.required = true;
                } else {
                    div1.style.display = 'none';
                    div3.style.display = 'none';
                    input1.required = false;
                    input3.required = false;
                    div2.style.display = 'none';
                    div4.style.display = 'none';
                    input2.required = false;
                    input4.required = false;
                }
            });
        });
    </script>

    @endpush