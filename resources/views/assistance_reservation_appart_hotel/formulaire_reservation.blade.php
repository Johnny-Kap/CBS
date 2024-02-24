@extends('layouts.template')

@section('content')


<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>Formulaire de réservation d'un appartement / hotel</h1>
                <p class="account-subtitle">
                    Nous vous enverrons un e-mail après validation de la commande.
                </p>
                <form method="POST" action="{{ route('commande.reservation.appart.hotel.add') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Quelle réservation voudriez vous faire ? <span class="text-danger">*</span></label>
                        <select name="type_resevation" class="form-control" id="">
                            <option value="hotel">Hôtel</option>
                            <option value="appartement">Appartement</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date souhatée <span class="text-danger">*</span></label>
                        <input id="email" type="text" class="form-control datetimepicker" placeholder="04/02/2024" name="date_reservation" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ville <span class="text-danger">*</span></label>
                        <input id="situation_vehicule" type="text" class="form-control" name="ville" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Localité / Quartier </label>
                        <input id="situation_vehicule" type="text" class="form-control" name="localite" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Prix inférieur </label>
                        <input id="tel" type="number" class="form-control" name="prix_inferieur" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Prix supérieur </label>
                        <input id="tel" type="number" class="form-control" name="prix_superieur" />
                    </div>
                    <input type="hidden" value="{{$numero_abonnement_valide}}" name="numero_abonnement_valide">
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