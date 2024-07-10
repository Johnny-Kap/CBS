@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Les plans d'accès aux privilèges disponibles </h2>
            </div>
        </div>
    </div>
</div>

<section class="section pricing-section pricing-page">
    <div class="container">
        <div class="row">
            @foreach($abonnements as $item)
            <div class="col-lg-4 col-md-4 col-12">
                <div class="price-card">
                    <div class="price-head">
                        <div class="price-level">
                            <h6>{{$item->intitule}}</h6>
                        </div>
                        <h4>{{$item->montant}} FCFA</h4>
                        <span>Par mois</span>
                    </div>
                    <div class="price-details">
                        <ul>
                            <li class="price-check">
                                <b>{!! html_entity_decode($item->packages) !!}</b>
                            </li>
                        </ul>
                        <div>
                            <a href="#pages_edit_{{$item->id}}" class="btn viewdetails-btn" data-bs-toggle="modal">S'inscrire</a>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="pages_edit_{{$item->id}}">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="form-header text-start mb-0">
                                    <h4 class="mb-0 text-dark fw-bold">Confirmer la souscription</h4>
                                </div>
                            </div>
                            <form action="{{route('abonnement.confirm')}}" method="get">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="booking-info pay-amount">
                                                <h5>Voulez-vous vraiment souscrire à cet abonnement ?</h5>
                                                <H6>Titre : {{$item->intitule}}</H6>
                                                <input type="hidden" name="abonnement_id" value="{{$item->id}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-back">Valider <i class="fa fa-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection