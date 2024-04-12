@extends('layouts.template')

@section('content')

<style>
    * {
        box-sizing: border-box
    }

    /* Slideshow container */
    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    /* Hide the images by default */
    .mySlides {
        display: none;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev:hover,
    .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active,
    .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }
</style>


<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">{{$locationShow->intitule}}</h2>
                <!-- <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Listings</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Chevrolet Camaro
                        </li>
                    </ol>
                </nav> -->
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
                        <span class="year">{{$locationShow->tarif}} FCFA</span>
                        <!-- <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <i class="fas fa-star filled"></i>
                        <span class="d-inline-block average-list-rating"> 5.0 </span> -->
                    </div>
                    <div class="camaro-info">
                        <h3>{{$locationShow->vehicules->intitule}}</h3>
                        <div class="camaro-location">
                            <div class="camaro-location-inner">
                                <i class="fas fa-map-pin me-2"></i>
                                <span class="me-2">
                                    <b>Localisation :</b> Douala, Cameroun
                                </span>
                            </div>
                            <!-- <div class="camaro-locations-inner">
                                <i class="feather-eye me-2"></i>
                                <span><b>Views :</b> 250 </span>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="details-btn">
                <a href> <img src="assets/img/git-compare.svg" alt /> Compare</a>
                <a href><i class="feather-heart"></i> Wishlist</a>
            </div> -->
        </div>
    </div>
</section>

<section class="section product-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="detail-product">
                    <!-- Slideshow container -->
                    <div class="slideshow-container">

                        @foreach($locationShow->vehicules->images as $image)
                        <!-- Full-width images with number and caption text -->
                        <div class="mySlides">
                            <!-- <div class="numbertext">1 / 3</div> -->
                            <img src="{{ Storage::url($image) }}" style="width:100%">
                            <!-- <div class="text">Caption Text</div> -->
                        </div>
                        @endforeach

                        <!-- Next and previous buttons -->
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>
                </div>

                <div class="review-sec specification-card">
                    <div class="review-header">
                        <h4>Specifications</h4>
                    </div>
                    <div class="card-body">
                        <div class="lisiting-featues">
                            <div class="row">
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-1.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Type </span>
                                        <h6>{{$locationShow->vehicules->type_vehicules->intitule}}</h6>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-2.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Coupe modèle </span>
                                        <h6>{{$locationShow->vehicules->modele}}</h6>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-3.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Transmission </span>
                                        <h6>{{$locationShow->vehicules->transmission}}</h6>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-4.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Type moteur </span>
                                        <h6>{{$locationShow->vehicules->type_moteur}}</h6>
                                    </div>
                                </div>
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-5.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Kilometrage </span>
                                        <h6>{{$locationShow->vehicules->nombre_kilometrage}} Km</h6>
                                    </div>
                                </div>
                                <!-- <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-6.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Drivetrian </span>
                                        <h6>Front Wheel</h6>
                                    </div>
                                </div> -->
                                <!-- <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-7.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Year</span>
                                        <h6>2018</h6>
                                    </div>
                                </div> -->
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-8.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Air conditionné </span>
                                        <h6>{{$locationShow->vehicules->air_conditionne}}</h6>
                                    </div>
                                </div>
                                <!-- <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-9.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>VIN </span>
                                        <h6>45456444</h6>
                                    </div>
                                </div> -->
                                <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-10.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Portières </span>
                                        <h6>{{$locationShow->vehicules->nombre_portieres}} portières</h6>
                                    </div>
                                </div>
                                <!-- <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-11.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Brake </span>
                                        <h6>ABS</h6>
                                    </div>
                                </div> -->
                                <!-- <div class="featureslist d-flex align-items-center col-lg-3 col-md-4">
                                    <div class="feature-img">
                                        <img src="/../assets/img/specification/specification-icon-12.svg" alt />
                                    </div>
                                    <div class="featues-info">
                                        <span>Engine (Hp) </span>
                                        <h6>3,000</h6>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="review-sec listing-feature">
                    <div class="review-header">
                        <h4>Car Features</h4>
                    </div>
                    <div class="listing-description">
                        <div class="row">
                            <div class="col-md-4">
                                <ul>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Premium sound system
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Bluetooth
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Keyles Start
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Memory seat
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Premium sound system
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Bluetooth
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Keyles Start
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Memory seat
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>6
                                        Cylinders
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Adaptive Cruise Control
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>Intermittent wipers
                                    </li>
                                    <li>
                                        <span><i class="fa-solid fa-check-double"></i></span>4
                                        power windows
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="review-sec extra-service mb-0">
                    <div class="review-header">
                        <h4>Description</h4>
                    </div>
                    <div class="description-list">
                        <p>
                            {!! html_entity_decode($locationShow->description) !!}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 theiaStickySidebar">
                <div class="review-sec mt-0">
                    <div class="review-header">
                        <h4>Vérifier la disponibilité</h4>
                    </div>
                    <div class>
                        <form class method="get" action="{{route('verifier.location')}}">
                            @csrf
                            <ul>
                                <li class="column-group-main">
                                    <div class="form-group">
                                        <label>N° abonnement du service</label>
                                        <div class="group-img">
                                            <input type="text" class="form-control" name="abonnement" placeholder="AA88873889" />
                                        </div>
                                    </div>
                                </li>
                                <li class="column-group-main">
                                    <div class="form-group m-0">
                                        <label>Date de ramassage</label>
                                    </div>
                                    <div class="form-group-wrapp sidebar-form">
                                        <div class="form-group me-2">
                                            <div class="group-img">
                                                <input type="text" name="date_depart" class="form-control datetimepicker" placeholder="04/11/2023" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="group-img">
                                                <input type="text" name="heure_depart" class="form-control timepicker" placeholder="11:00 AM" required />
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="column-group-main">
                                    <div class="form-group m-0">
                                        <label>Date de retour</label>
                                    </div>
                                    <div class="form-group-wrapp sidebar-form">
                                        <div class="form-group me-2">
                                            <div class="group-img">
                                                <input type="text" name="date_arrivee" class="form-control datetimepicker" placeholder="04/11/2023" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="group-img">
                                                <input type="text" name="heure_arrivee" class="form-control timepicker" placeholder="11:00 AM" required />
                                                <input type="hidden" value="{{ $locationShow->id }}" name="location_id">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="column-group-last">
                                    <div class="form-group mb-0">
                                        <div class="search-btn">
                                            <button class="btn btn-primary check-available w-100" type="submit">Verifier</button>
                                            <!-- <button class="btn btn-primary check-available w-100" type="button" data-bs-toggle="modal" data-bs-target="#pages_edit">
                                                Check Availability
                                            </button> -->
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <!-- <div class="review-sec extra-service mt-0">
                    <div class="review-header">
                        <h4>Listing Owner Details</h4>
                    </div>
                    <div class="owner-detail">
                        <div class="owner-img">
                            <a href><img src="assets/img/profiles/avatar-07.jpg" alt /></a>
                        </div>
                        <div class="reviewbox-list-rating">
                            <h5><a>Brooklyn Cars</a></h5>
                            <p>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <span> (5.0)</span>
                            </p>
                        </div>
                    </div>
                    <ul class="booking-list">
                        <li>
                            No of Listings
                            <span>05</span>
                        </li>
                        <li>
                            No of Bookings
                            <span>225</span>
                        </li>
                        <li>
                            Verification
                            <h6>Verified</h6>
                        </li>
                    </ul>
                    <div class="message-btn">
                        <a href="#" class="btn btn-order">Message to owner</a>
                    </div>
                </div> -->
                <!-- <div class="review-sec share-car mt-0">
                    <div class="review-header">
                        <h4>Share this car</h4>
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
                </div> -->
                <!-- <div class="review-sec share-car mt-0 mb-0">
                    <div class="review-header">
                        <h4>View Location</h4>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509170.989457427!2d-123.80081967108484!3d37.192957227641294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v1669181581381!5m2!1sen!2sin" class="iframe-video"></iframe>
                </div> -->
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

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>


@endsection