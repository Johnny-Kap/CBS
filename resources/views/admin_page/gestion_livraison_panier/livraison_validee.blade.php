@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- Table Styles Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-table"></i>Gestion des livraisons de paniers validées<br><small>Consulter les ici !</small>
            </h1>
        </div>
    </div>
    <!-- <ul class="breadcrumb breadcrumb-top">
        <li><a href="{{route('location.ajouter')}}"><b>AJOUTER UNE LOCATION</b></a></li>
    </ul> -->
    <!-- END Table Styles Header -->

    <!-- Table Styles Block -->
    <div class="block">
        <!-- Table Styles Title -->
        <div class="block-title">
            <h2><strong>Table</strong> Styles</h2>
        </div>
        <!-- END Table Styles Title -->

        <!-- Table Styles Content -->
        <!-- Changing classes functionality initialized in js/pages/tablesGeneral.js -->
       
        <div class="table-responsive">
            <!--
                                Available Table Classes:
                                    'table'             - basic table
                                    'table-bordered'    - table with full borders
                                    'table-borderless'  - table with no borders
                                    'table-striped'     - striped table
                                    'table-condensed'   - table with smaller top and bottom cell padding
                                    'table-hover'       - rows highlighted on mouse hover
                                    'table-vcenter'     - middle align content vertically
                                -->
            <table id="general-table" class="table table-striped table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th>N° Commande</th>
                        <th>Type de prestation</th>
                        <th>Contenu du panier</th>
                        <th>Date de livraison</th>
                        <th>Adresse recupération</th>
                        <th>Adresse de livraison</th>
                        <th>Tel Destinataire</th>
                        <th>Etat de la commande</th>
                        <th>Commandé par</th>
                        <th>Commandé le</th>
                        <th style="width: 150px;" class="text-center">Créer facture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($livraison_validee as $item)
                    <tr>
                        <td>{{$item->numero_commande}}</td>
                        <td>{{$item->type_prestation}}</td>
                        <td>{{$item->contenu_panier}}</td>
                        <td>{{$item->date_livraison}}</td>
                        <td>{{$item->adresse_recuperation}}</td>
                        <td>{{$item->adresse_livraison}}</td>
                        <td>{{$item->tel_destinataire}}</td>
                        <td>@if($item->etat_commande == 'yes') Validé @else En attente @endif</td>
                        <td><a href="{{ route('user.profile.details', ['id' => $item->users->id, 'name' => str_slug($item->users->name)]) }}">
                                {{$item->users->name}} {{$item->users->prenom}}
                            </a></td>
                        <td>{{$item->created_at->format('d/m/Y')}}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#pages_edit"><i class="fa fa-file-text"></i></button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="pages_edit" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div class="form-header text-start mb-0">
                                        <h4 class="mb-0 text-dark fw-bold">Créer la facture N° {{$item->numero_commande}}</h4>
                                    </div>
                                </div>
                                <form action="{{route('facture.commande_livraison_panier.add')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="booking-info pay-amount">
                                                    <h3>Voulez-vous vraiment créer la facture de cette commande ?</h3>
                                                    <input type="hidden" name="livraison_id" value="{{$item->id}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Créer <i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END Table Styles Content -->
    </div>
    <!-- END Table Styles Block -->
</div>



<div class="modal fade" id="pages_delete" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="form-header text-start mb-0">
                    <h4 class="mb-0 text-dark fw-bold">Availability Details</h4>
                </div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span class="align-center" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="available-for-ride">
                            <p>
                                <i class="fa-regular fa-circle-check"></i>Chevrolet Camaro
                                is available for a ride
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="row booking-info">
                            <div class="col-md-4 pickup-address">
                                <h5>Pickup</h5>
                                <p>45, 4th Avanue Mark Street USA</p>
                                <span>Date & time : 11 Jan 2023</span>
                            </div>
                            <div class="col-md-4 drop-address">
                                <h5>Drop Off</h5>
                                <p>78, 10th street Laplace USA</p>
                                <span>Date & time : 11 Jan 2023</span>
                            </div>
                            <div class="col-md-4 booking-amount">
                                <h5>Booking Amount</h5>
                                <h6><span>$300 </span> /day</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="booking-info seat-select">
                            <h6>Extra Service</h6>
                            <label class="custom_check">
                                <input type="checkbox" name="rememberme" class="rememberme" />
                                <span class="checkmark"></span>
                                Baby Seat - <span class="ms-2">$10</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="booking-info pay-amount">
                            <h6>Deposit Option</h6>
                            <div class="radio radio-btn">
                                <label>
                                    <input type="radio" name="radio" /> Pay Deposit
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="radio" /> Full Amount
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="booking-info service-tax">
                            <ul>
                                <li>Booking Price <span>$300</span></li>
                                <li>Extra Service <span>$10</span></li>
                                <li>Tax <span>$5</span></li>
                            </ul>
                        </div>
                        <div class="grand-total">
                            <h5>Grand Total</h5>
                            <span>$315</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="booking.html" class="btn btn-back">Go to Details<i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    let table = new DataTable('#general-table', {
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
        },
        layout: {
            topStart: {
                buttons: [{
                        extend: 'pdf',
                        title: 'Liste des commandes de livraison validées',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Liste des commandes de livraison validées',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        title: 'Liste des commandes de livraison validées',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        title: 'Liste des commandes de livraison validées',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
            }
        }
    });
</script>

@endpush