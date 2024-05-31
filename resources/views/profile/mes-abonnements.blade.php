@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Tous mes abonnements</h2>
            </div>
        </div>
    </div>
</div>

<div class="invoice-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-body text-center">
                <h6>NB : Veuillez noter votre n° abonnement car il vous permettra de bénéficier des reductions et d'autre avantages.</h6><br><br>
                    <div class="invoice-table-wrap">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-center table-hover" id="table-abonnement">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>N° abonnement</th>
                                                <th>Etat de souscription</th>
                                                <th>Abonnement</th>
                                                <th>Date d'expiration</th>
                                                <th>Expiration</th>
                                                <th>Etat paiement</th>
                                                <th>Tarif</th>
                                                <th>Mode paiement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mes_abonnements as $item)
                                            <tr>
                                                <td><b>{{$item->numero_abonnement}}</b></td>
                                                <td>@if($item->etat == 'attente') En attente @else Confirmée @endif</td>
                                                <td>{{$item->abonnements->intitule}}</td>
                                                <td>{{$item->date_expiration}}</td>
                                                <td>@if($item->is_expired == 'no') <span class="badge bg-success">Valide</span> @else <span class="badge bg-danger">Expiré</span> @endif</td>
                                                <td>@if($item->is_buy == 'no') Non payé @else Payé @endif</td>
                                                <td>{{$item->montant}} FCFA</td>
                                                <td>OM/MOMO</td>
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

@push('scripts')

<script>
    let table_location = new DataTable('#table-abonnement', {
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