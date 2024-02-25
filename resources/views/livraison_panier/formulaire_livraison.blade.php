@extends('layouts.template')

@section('content')


<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>Formulaire de distribution d'un panier / Achat des articles </h1>
                <p class="account-subtitle">
                    Nous vous enverrons un e-mail après validation de la commande.
                </p>
                <form method="POST" action="{{ route('livraison.panier.add') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Quelle type de prestation souhaiterez vous obtenir ? <span class="text-danger">*</span></label>
                        <select name="type_prestation" class="form-control" id="">
                            <option value="livraison">Livraison</option>
                            <option value="achat">Achat et livraison</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Contenu du panier </label>
                        <input id="contenu_panier" type="text" class="form-control" name="contenu_panier"/>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Date souhatée <span class="text-danger">*</span></label>
                        <input id="email" type="text" class="form-control datetimepicker" placeholder="04/02/2024" name="date_livraison" required />
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Adresse recupération <span class="text-danger">*</span></label>
                        <input id="situation_vehicule" type="text" class="form-control" name="adresse_recuperation" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Adresse de livraison <span class="text-danger">*</span></label>
                        <input id="situation_vehicule" type="text" class="form-control" name="adresse_livraison" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Montant d'achat du panier (Uniquement si vous avez choisi "Achat" comme type de prestation) </label>
                        <input id="tel" type="number" class="form-control" name="montant" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mode de paiement <span class="text-danger">*</span></label>
                        <select name="mode_paiement" class="form-control" id="">
                            @foreach($mode_paiement as $item)
                            <option value="{{$item->id}}">{{$item->intitule}}</option>
                            @endforeach
                        </select>
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