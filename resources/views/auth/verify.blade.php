@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vérifier votre adresse Email</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Un nouveau lien de vérification a été envoyé à votre adresse électronique.
                    </div>
                    @endif

                    Avant de poursuivre, veuillez vérifier votre courrier électronique pour obtenir un lien de vérification.
                    Si vous n'avez pas reçu l'email,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">cliquez ici pour en demander un autre</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection