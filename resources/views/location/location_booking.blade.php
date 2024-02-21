@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Confirmation de la commande</h2>
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
                <h3>Confirmation de la commande</h3>
                <h5>Total : <span>{{$total_tarif}}</span></h5>
            </div>
            <div class="booking-details order-confirm-box">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="confirmation-title">
                            <h4>Details de la location</h4>
                            <!-- <a href="javascript:void(0)">Edit</a> -->
                        </div>
                        <div class="order-car">
                            <span><img src="{{Storage::url($location->vehicules->image_illustrative)}}" alt></span>
                            <h5>{{$location->intitule}}<span>{{$location->tarif}} FCFA /Jour</span></h5>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6">
                        <div class="confirmation-title">
                            <h4>Extra Service</h4>
                            <a href="javascript:void(0)">Edit</a>
                        </div>
                        <ul class="address-info">
                            <li>Baby Seat : $10</li>
                        </ul>
                    </div> -->
                    <div class="col-lg-6">
                        <div class="confirmation-title">
                            <h4>Details du paiement</h4>
                            <!-- <a href="javascript:void(0)">Edit</a> -->
                        </div>
                        <div class="visa-card">
                            <span>Mode de paiement : <b>{{$mode_paiement->intitule}}</b> </span>
                            <br><br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="confirmation-title">
                            <h4>Date de depart</h4>
                            <!-- <a href="javascript:void(0)">Edit</a> -->
                        </div>
                        <ul class="address-info">
                            <!-- <li>45, 4th Avanue Mark Street USA</li> -->
                            <li>{{$date_heure_depart}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
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
                            <h4>Date d'arrivée</h4>
                            <!-- <a href="javascript:void(0)">Edit</a> -->
                        </div>
                        <ul class="address-info mb-0">
                            <!-- <li>45, 4th Avanue Mark Street USA</li> -->
                            <li>{{$date_heure_arrivee}}</li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="confirmation-title">
                            <h4>Nos termes et conditions</h4>
                            <!-- <a href="javascript:void(0)">Edit</a> -->
                        </div>
                        <ul class="address-info mb-0">
                            <!-- <li>45, 4th Avanue Mark Street USA</li> -->
                            <li>En validant votre commande, vous acceptez nos <a href="{{route('term_condition')}}">termes et conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="place-order-btn">
                <a href="{{ route('location.paiement', ['location_id' => $location->id, 'date_heure_depart' => $date_heure_depart, 'date_heure_arrivee' => $date_heure_arrivee, 'mode_paiement' => $mode_paiement->id, 'total_tarif' => $total_tarif, 'diff' => $diff]) }}" class="btn btn-primary"><i class="fas fa-bar-chart me-2"></i>Commander</a>
            </div>
        </div>
    </div>
</section>

@endsection