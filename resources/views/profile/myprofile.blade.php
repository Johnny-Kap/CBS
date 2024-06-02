@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Mes informations personnelles</h2>
            </div>
        </div>
    </div>
</div>

<section class="product-detail-head">
    <div class="container">
        <div class="detail-page-head">
            <div class="detail-headings">
                <div class="star-rated">
                    <div class="list-rating">
                        <!-- <span class="year">2023</span> -->
                        <div class="owner-detail">
                            <div class="owner-img">
                                @if (Auth::user()->image == null)
                                <img src="assets/img/profiles/avatar-07.jpg" alt />
                                @else
                                <img src="{{ Storage::url(Auth::user()->image) }}" alt="">
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="camaro-info">
                        <h3>{{Auth::user()->name}} {{Auth::user()->prenom}}</h3>
                        <div class="camaro-location">
                            <div class="camaro-location-inner">
                                <i class="fas fa-map-pin me-2"></i>
                                <span class="me-2">
                                    <b>Adresse :</b> {{Auth::user()->adresse}} |
                                </span>
                            </div>
                            <div class="camaro-locations-inner">
                                <i class="fas fa-envelope me-2"></i>
                                <span><b>Email :</b> {{Auth::user()->email}} | </span>
                            </div>
                            <div class="camaro-locations-inner">
                                @if(Auth::user()->email_verified_at == null) <span class="badge bg-danger">E-mail non vérifié</span> @else <span class="badge bg-success">E-mail vérifié</span> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="details-btn">
                <a href="{{route('myprofile.modifier')}}"> <i class="fas fa-gear"></i> Mes paramètres</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();    
                                        document.getElementById('logout-form').submit();"><i class="fas fa-sign-out"></i> Déconnecter</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</section>

<section class="section product-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="review-sec specification-card">
                    <div class="review-header">
                        <h4>Informations</h4>
                    </div>
                    <div class="card-body">
                        <div class="lisiting-featues">
                            <div class="row">
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <div class="featues-info">
                                        <h6>Téléphone</h6>
                                        <span>
                                            @if(Auth::user()->tel == null)
                                            Non renseigné
                                            @else
                                            {{Auth::user()->tel}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="featues-info">
                                        <h6>Date de naissance</h6>
                                        <span>
                                            @if(Auth::user()->date_naiss == null)
                                            Non renseigné
                                            @else
                                            {{Auth::user()->date_naiss}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="featues-info">
                                        <h6>Profession</h6>
                                        <span>
                                            @if(Auth::user()->profession == null)
                                            Non renseigné
                                            @else
                                            {{Auth::user()->profession}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <i class="fas fa-briefcase"></i>
                                    </div>
                                    <div class="featues-info">
                                        <h6>Lieu de résidence</h6>
                                        <span>
                                            @if(Auth::user()->residence == 'cameroun')
                                            Cameroun
                                            @else
                                            Hors du Cameroun
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <i class="fas fa-id-card"></i>
                                    </div>
                                    <div class="featues-info">
                                        <h6>N° CNI</h6>
                                        <span>
                                            @if(Auth::user()->numero_cni == null)
                                            Non renseigné
                                            @else
                                            {{Auth::user()->numero_cni}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="featues-info">
                                        <h6>Date de delivrance CNI</h6>
                                        <span>
                                            @if(Auth::user()->date_delivrance_cni == null)
                                            Non renseigné
                                            @else
                                            {{Auth::user()->date_delivrance_cni}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <i class="fa fa-address-card"></i>
                                    </div>
                                    <div class="featues-info">
                                        <h6>N° passport</h6>
                                        <span>
                                            @if(Auth::user()->numero_passport == null)
                                            Non renseigné
                                            @else
                                            {{Auth::user()->numero_passport}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="featues-info">
                                        <h6>Date de delivrance passport</h6>
                                        <span>
                                            @if(Auth::user()->date_delivrance_passport == null)
                                            Non renseigné
                                            @else
                                            {{Auth::user()->date_delivrance_passport}}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="review-sec extra-service mb-0">
                    <div class="review-header">
                        <h4>Description</h4>
                    </div>
                    <div class="description-list">
                        <p>
                            @if(Auth::user()->description == null)
                            Non renseigné
                            @else
                            {!! html_entity_decode(Auth::user()->description) !!}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 theiaStickySidebar">
                <div class="review-sec mt-0">
                    <div class="review-header">
                        <h4>Mes operations</h4>
                    </div>
                    <div class>
                        <form class>
                            <ul>
                                <li class="column-group-last">
                                    <div class="form-group mb-2">
                                        <div class="search-btn">
                                            <a class="btn btn-primary check-available w-100" href="{{route('myprofile.historique.commande')}}">
                                                Historique des commandes
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="column-group-last">
                                    <div class="form-group mb-2">
                                        <div class="search-btn">
                                            <a class="btn btn-primary check-available w-100" href="{{route('myprofile.confirmation_paiement')}}">
                                                Mes validations de paiement
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="column-group-last">
                                    <div class="form-group mb-2">
                                        <div class="search-btn">
                                            <a class="btn btn-primary check-available w-100" href="{{route('myprofile.confirmation_abonnement')}}">
                                                Mes validations d'abonnement
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li class="column-group-last">
                                    <div class="form-group mb-2">
                                        <div class="search-btn">
                                            <a class="btn btn-primary check-available w-100" href="{{route('myprofile.abonnements')}}">
                                                Mes abonnements
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="review-sec share-car mt-0">
                    <div class="review-header">
                        <h4>Mes reseaux sociaux</h4>
                    </div>
                    <ul class="nav-social">
                        <li>
                            <a href="javascript:void(0)"><i class="fa-brands fa-facebook-f fa-facebook fi-icon"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fab fa-instagram fi-icon"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fab fa-behance fi-icon"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa-brands fa-pinterest-p fi-icon"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fab fa-twitter fi-icon"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fab fa-linkedin fi-icon"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal custom-modal fade check-availability-modal" id="pages_edit" role="dialog">
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