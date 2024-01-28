@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Confirmer mes souscriptions d'abonnement</h2>
            </div>
        </div>
    </div>
</div>

<div class="invoice-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body">
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° abonnement</th>
                                                <th>Etat de souscription</th>
                                                <th>Abonnement</th>
                                                <th>Date d'expiration</th>
                                                <th>Etat paiement</th>
                                                <th>Tarif</th>
                                                <th>Mode paiement</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($abonnement_souscrits as $item)
                                            <tr>
                                                <td>{{$item->numero_abonnement}}</td>
                                                <td>@if($item->etat == 'attente') En attente @else / @endif</td>
                                                <td>{{$item->abonnements->intitule}}</td>
                                                <td>{{$item->date_expiration}}</td>
                                                <td>@if($item->is_buy == 'no') Non payé @else / @endif</td>
                                                <td>{{$item->montant}}</td>
                                                <td>OM/MOMO</td>
                                                <td><button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_edit">
                                                        Télécharger image ici <i class="fa fa-upload"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal custom-modal fade check-availability-modal" id="pages_edit" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <form action="{{route('abonnement.soumission_paiement')}}" enctype="multipart/form-data" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="booking-info pay-amount">
                                                                            <h6>Téléverser la capture d'ecran de votre paiement ici !</h6>
                                                                            <div class="radio">
                                                                                <label>
                                                                                    <input type="file" name="file"> Téléverser ici
                                                                                </label>
                                                                                <input type="hidden" value="{{$item->id}}" name="souscription_abonnement_id">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Envoyer <i class="fa-solid fa-arrow-right"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection