@extends('layouts.template')

@section('content')


<header class="log-header">
    <a href="{{url('/')}}"><img class="img-fluid logo-dark" src="/../assets/img/logo_first.png" alt="Logo"></a>
</header>

<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <div class="sign-group">
                    <a href="{{url('/')}}" class="btn sign-up"><span><i class="fa fa-angle-left"
                                aria-hidden="true"></i></span>Retour Acceuil</a>
                </div>
                <h1>Se connecter</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Email ou mot de passe incorrect !</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                        <div class="pass-group">
                            <input id="password" type="password"
                                class="form-control pass-input @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">
                            <span class="fas fa-eye toggle-password"></span>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>Mot de passe incorrect !</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                    <div class="form-group">
                        <a class="forgot-link" href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                    </div>
                    @endif
                    <div class="form-group m-0">
                        <label class="custom_check d-inline-flex"><span>Se rappeller de moi</span>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-outline-light w-100 btn-size mt-1">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection