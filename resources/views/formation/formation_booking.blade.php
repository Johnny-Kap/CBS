@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Confirmation de la commande de la formation</h2>
                <!-- <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Confirmation</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </div>
</div>

<section class="order-confirmation">
    <div class="container">
        <div class="confirm-order">
            <div class="section-title">
                <h3>Confirmation de la commande de {{$nb_place_commande}} personne(s)</h3>
                <h5>Total : <span>{{$montant_total}} FCFA</span></h5>
            </div>
            <form action="{{route('commande.formation.add')}}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="booking-details order-confirm-box">
                    <div class="row">
                        <div class="col-lg-6 mb-2">
                            <div class="confirmation-title">
                                <h4>Details de la formation</h4>
                                <!-- <a href="javascript:void(0)">Edit</a> -->
                            </div>
                            <div class="order-car">
                                <h5>{{$formation->intitule}}<span>{{$formation->montant}} FCFA /Personne</span></h5>
                            </div>
                            <ul class="address-info">
                                <!-- <li>45, 4th Avanue Mark Street USA</li> -->
                                <li>Type de cours choici : {{$type_cours}}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="confirmation-title">
                                <h4>Date et lieu de formation</h4>
                                <!-- <a href="javascript:void(0)">Edit</a> -->
                            </div>
                            <ul class="address-info">
                                <li>{{$formation->date_formation}}</li>
                                <li>{{$formation->lieu}}</li>
                            </ul>
                        </div>

                        <div class="col-lg-6">
                            <div class="confirmation-title">
                                <h4>Heure de début et fin</h4>
                                <!-- <a href="javascript:void(0)">Edit</a> -->
                            </div>
                            <ul class="address-info">
                                <!-- <li>45, 4th Avanue Mark Street USA</li> -->
                                <li>{{$formation->heure_debut}} - {{$formation->heure_fin}}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="confirmation-title">
                                <h4>Mes informations</h4>
                                <!-- <a href="javascript:void(0)">Edit</a> -->
                            </div>
                            <ul class="address-info">
                                <li>{{Auth::user()->name}} {{Auth::user()->prenom}}</li>
                                <li><a href="{{Auth::user()->email}}" class="__cf_email__" data-cfemail="fa999b899b949e889bba9f829b978a969fd4999597">{{Auth::user()->email}}</a>
                                </li>
                                <li>{{Auth::user()->tel}}</li>
                                <li>{{Auth::user()->adresse}}</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="confirmation-title">
                                <h4>Mode de paiement</h4>
                                <!-- <a href="javascript:void(0)">Edit</a> -->
                            </div>
                            <ul class="address-info mb-0">
                                <!-- <li>45, 4th Avanue Mark Street USA</li> -->
                                <li>
                                    <select name="mode_paiement_id" class="form-control" id="">
                                        @foreach($mode_paiements as $item)
                                        <option value="{{$item->id}}">{{$item->intitule}}</option>
                                        @endforeach
                                    </select>
                                </li>
                                <li></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <div class="confirmation-title">
                                <h4>Nos termes et conditions</h4>
                                <!-- <a href="javascript:void(0)">Edit</a> -->
                            </div>
                            <ul class="address-info mb-0">
                                <!-- <li>45, 4th Avanue Mark Street USA</li> -->
                                <li>En validant votre commande, vous acceptez nos <a href="{{route('term_condition')}}">termes et conditions</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="confirmation-title">
                                <h4>Procéder au paiement</h4>
                                <!-- <a href="javascript:void(0)">Edit</a> -->
                            </div>
                            <ul class="address-info mb-0">
                                <li><i class="fa fa-info-circle"></i> Effectuer un transfert d'argent ou dépôt d'argent à ces numéros : (OM) +237 659826528 / (MOMO) +237 653100205</li>
                                <li>Montant total : <b>{{$montant_total}} FCFA</b></li>
                                <li>Après transfert d'argent, effectuer une capture d'écran et soumettez cela ici <i class="fa fa-arrow-down "></i></li>
                                <li>
                                    <input type="file" required name="file" class="form-control" id="">
                                    <input type="hidden" name="formation_id" value="{{$formation->id}}">
                                    <input type="hidden" name="montant_total" value="{{$montant_total}}">
                                    <input type="hidden" name="nb_place_commande" value="{{$nb_place_commande}}">
                                    <input type="hidden" name="type_cours" value="{{$type_cours}}">
                                </li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="place-order-btn">
                    <button href="#" class="btn btn-primary"><i class="fas fa-bar-chart me-2"></i>Commander</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection