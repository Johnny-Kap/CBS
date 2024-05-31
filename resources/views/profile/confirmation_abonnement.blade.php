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
                <div class="card-body text-center">
                <H4>Veuillez effectuer vos paiments sur ces numéros : OM - +237 659826528 / MOMO - +237 653100205</H4><br><br>
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover" id="table-paiement-abonnement">
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
                                                <td><button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_edit_{{$item->id}}">
                                                        Télécharger image ici <i class="fa fa-upload"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal custom-modal fade check-availability-modal" id="pages_edit_{{$item->id}}" role="dialog">
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

@push('scripts')

<script>
    let table_location = new DataTable('#table-paiement-abonnement', {
        language: {
            processing: "Traitement en cours...",
            search: "Rechercher&nbsp;:",
            lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
            info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
            infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
            infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
            infoPostFix: "",
            loadingRecords: "Chargement en cours...",
            zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
            emptyTable: "Aucune donnée disponible dans le tableau",
            paginate: {
                first: "Premier",
                previous: "Pr&eacute;c&eacute;dent",
                next: "Suivant",
                last: "Dernier"
            },
            aria: {
                sortAscending: ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        }
    });
</script>

@endpush