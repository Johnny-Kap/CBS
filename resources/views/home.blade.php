@extends('layouts.template')

@section('content')

<section class="banner-section banner-slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="home-banner">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-down">
                                <h1>Car Booking <br>
                                    <span>Services</span>
                                </h1>
                                <p>"Nous tenons à vous remercier pour votre confiance et vous présentons nos meilleurs voeux pour
                                    l'année 2024. Nous vous souhaitons une nouvelle année remplie de joie, de bonheur et de
                                    réussite. Avec une excellente santé."
                                </p>
                                <div class="view-all">
                                    <a href="{{route('location.list')}}" class="btn btn-view d-inline-flex align-items-center">Voir toutes les locations <span><i class="fas fa-arrow-right ms-2"></i></span></a>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-down">
                                <div class="banner-imgs">
                                    <img src="/../assets/img/car-right.png" class="img-fluid aos" alt="bannerimage">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="home-banner">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-down">
                                <h1>Expérience de conduite <br>
                                    <span>Inoubliable</span>
                                </h1>
                                <p>Découvrez nos véhicules de luxe pour une expérience de conduite exceptionnelle. Profitez du confort et du style pour tous vos déplacements.</p>
                                <div class="view-all">
                                    <a href="{{route('location.list')}}" class="btn btn-view d-inline-flex align-items-center">Voir toutes les locations <span><i class="fas fa-arrow-right ms-2"></i></span></a>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-down">
                                <div class="banner-imgs">
                                    <img src="/../assets/img/app-car.png" class="img-fluid aos" alt="bannerimage">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="home-banner">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-down">
                                <h1>Le Plaisir de Conduire <br>
                                    <span>À Chaque Instant</span>
                                </h1>
                                <p>Découvrez le plaisir de conduire nos véhicules modernes et bien entretenus. Chaque trajet devient une aventure, avec le confort et la performance à portée de main.</p>
                                <div class="view-all">
                                    <a href="{{route('location.list')}}" class="btn btn-view d-inline-flex align-items-center">Voir toutes les locations <span><i class="fas fa-arrow-right ms-2"></i></span></a>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-down">
                                <div class="banner-imgs">
                                    <img src="/../assets/img/toyota_PNG1949.png" class="img-fluid aos" alt="bannerimage">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="home-banner">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-down">
                                <h1>Réservation Facile <br>
                                    <span>et Rapide</span>
                                </h1>
                                <p>Réservez votre voiture en quelques clics seulement. Notre plateforme simple et intuitive vous permet de planifier vos déplacements rapidement et sans tracas.</p>
                                <div class="view-all">
                                    <a href="{{route('location.list')}}" class="btn btn-view d-inline-flex align-items-center">Voir toutes les locations <span><i class="fas fa-arrow-right ms-2"></i></span></a>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-down">
                                <div class="banner-imgs">
                                    <img src="/../assets/img/acura_PNG109.png" class="img-fluid aos" alt="bannerimage">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- <div class="section-search">
    <div class="container">
        <div class="search-box-banner">
            <form action="listing-grid.html">
                <ul class="align-items-center">
                    <li class="column-group-main">
                        <div class="form-group">
                            <label>Pickup Location</label>
                            <div class="group-img">
                                <input type="text" class="form-control" placeholder="Enter City, Airport, or Address">
                                <span><i class="fas fa-map-pin"></i></span>
                            </div>
                        </div>
                    </li>
                    <li class="column-group-main">
                        <div class="form-group">
                            <label>Pickup Date</label>
                        </div>
                        <div class="form-group-wrapp">
                            <div class="form-group date-widget">
                                <div class="group-img">
                                    <input type="text" class="form-control datetimepicker" placeholder="04/11/2023">
                                    <span><i class="fas fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="form-group time-widge">
                                <div class="group-img">
                                    <input type="text" class="form-control timepicker" placeholder="11:00 AM">
                                    <span><i class="fas fa-clock"></i></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="column-group-main">
                        <div class="form-group">
                            <label>Return Date</label>
                        </div>
                        <div class="form-group-wrapp">
                            <div class="form-group date-widge">
                                <div class="group-img">
                                    <input type="text" class="form-control datetimepicker" placeholder="04/11/2023">
                                    <span><i class="fas fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="form-group time-widge">
                                <div class="group-img">
                                    <input type="text" class="form-control timepicker" placeholder="11:00 AM">
                                    <span><i class="fas fa-clock"></i></span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="column-group-last">
                        <div class="form-group">
                            <div class="search-btn">
                                <button class="btn search-button" type="submit"> <i class="fa fa-search"
                                        aria-hidden="true"></i>Search</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div> -->


<section class="section services">
    <div class="service-right">
        <img src="assets/img/bg/service-right.svg" class="img-fluid" alt="services right">
    </div>
    <div class="container">

        <div class="section-heading" data-aos="fade-down">
            <h2>Comment ça marche</h2>
            <p>Découvrez à quel point il est facile de louer une voiture avec nous !
                Suivez ces étapes simples pour réserver votre véhicule en quelques minutes</p>
        </div>

        <div class="services-work">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-secondary">
                            <img class="icon-img bg-secondary" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>1. Sélectionner votre voiture</h3>
                            <p>Parcourez notre vaste sélection de véhicules, allant des voitures économiques aux modèles de luxe,
                                et choisissez celui qui convient le mieux à vos besoins et à votre budget.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-warning">
                            <img class="icon-img bg-warning" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>2. Entrer la date de ramassage et de retour</h3>
                            <p>Indiquez les dates et heures spécifiques de ramassage et de retour de la voiture.
                                Cette étape garantit la disponibilité du véhicule à ces moments précis.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-dark">
                            <img class="icon-img bg-dark" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>3. Réservez votre voiture</h3>
                            <p>Finalisez votre réservation en ligne en fournissant les informations requises.
                                Vous recevrez immédiatement une confirmation avec tous les détails de votre réservation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section popular-services popular-explore">
    <div class="container">
        <div class="section-heading" data-aos="fade-down">
            <h2>Location de voitures</h2>
            <p>
                Trouvez la voiture idéale pour vos besoins parmi notre sélection de véhicules en location.
                Nous avons ce qu'il vous faut pour votre prochain déplacement.
            </p>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="Carmazda">
                <div class="row">
                    @foreach($location as $item)
                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->vehicules->intitule)]) }}">
                                    <img src="{{ Storage::url($item->vehicules->image_illustrative) }}" style="width: 30rem; height: 15rem;" class="img-fluid" alt="Toyota">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">{{$item->vehicules->marques->intitule}}</span>
                                    <!-- <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a> -->
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <!-- <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-0.jpg" alt="author">
                                    </a> -->
                                    <h3 class="listing-title">
                                        <a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->vehicules->intitule)]) }}">{{$item->vehicules->intitule}}</a>
                                    </h3>
                                    <!-- <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div> -->
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-01.svg" alt="Auto"></span>
                                            <p>{{$item->vehicules->transmission}}</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="10 KM"></span>
                                            <p>{{$item->vehicules->nombre_kilometrage}} km</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Petrol"></span>
                                            <p>{{$item->vehicules->type_moteur}}</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p>{{$item->vehicules->modele}}</p>
                                        </li>
                                        <!-- <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2018"></span>
                                            <p>{{$item->vehicules->annee_fabrication}}</p>
                                        </li> -->
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>{{$item->vehicules->nombre_portieres}} portières</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <!-- <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Germany
                                    </div> -->
                                    <div class="listing-price">
                                        <h6>{{$item->tarif}} FCFA <span>/ jour</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->vehicules->intitule)]) }}" class="btn btn-order"><span><i class="fas fa-calendar me-2"></i></span>Louer maintenant</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section why-choose popular-explore">
    <div class="choose-left">
        <img src="assets/img/bg/choose-left.png" class="img-fluid" alt="Why Choose Us">
    </div>
    <div class="container">

        <div class="section-heading" data-aos="fade-down">
            <h2>Plus de services de CBS</h2>
            <p>Découvrez nos autres services CBS pour répondre à tous vos besoins.
                De la maintenance automobile et la formation, nous avons une gamme complète de solutions pour vous faciliter la vie.</p>
        </div>

        <div class="why-choose-group">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-primary">
                                <!-- <img class="w-50" src="/../assets/img/car-maitenance-car-maintenance-car-mechanic-auto-repair-svgrepo-com.svg" alt> -->
                                <svg fill="#000000" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64px" height="64px" viewBox="0 0 208 256" enable-background="new 0 0 208 256" xml:space="preserve" stroke="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M50.452,221.871v16.064c0,8.982-7.255,16.064-16.064,16.064s-16.064-7.082-16.064-16.064v-16.064H2.086v-52.512l0,0 c0-11.573,7.773-21.074,18.31-24.01l18.828-44.739c2.764-6.564,9.155-11.228,16.755-11.228h96.214c7.6,0,13.992,4.664,16.755,11.228 l18.656,44.739c10.537,2.937,18.31,12.437,18.31,24.01l0,0v52.512h-16.41v16.064c0,8.982-7.255,16.064-16.064,16.064 c-8.982,0-16.064-7.082-16.064-16.064v-16.064H50.452z M35.424,193.024c8.982,0,16.237-7.255,16.237-16.237 c0-8.982-7.255-16.237-16.237-16.237s-16.237,7.255-16.237,16.237S26.441,193.024,35.424,193.024 M187.777,176.787 c0-8.982-7.255-16.237-16.237-16.237c-8.982,0-16.237,7.255-16.237,16.237s7.255,16.237,16.237,16.237 C180.522,193.024,187.777,185.769,187.777,176.787 M171.54,144.485l-16.064-38.693c-0.691-1.9-2.591-3.282-4.837-3.282H57.361 c-2.073,0-3.973,1.382-4.664,3.282l-16.064,38.693H171.54z M33.867,46.68h93.989c0.558,0,1.107-0.037,1.648-0.102 c5.056,10.105,15.497,17.047,27.565,17.047c13.041,0,24.182-8.106,28.68-19.551h-28.68V21.551h28.68 C181.252,10.106,170.112,2,157.07,2c-12.068,0-22.509,6.942-27.565,17.047c-0.541-0.065-1.091-0.102-1.648-0.102H33.867 C26.24,18.945,20,25.185,20,32.812v0C20,40.439,26.24,46.68,33.867,46.68z"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="choose-content">
                                <h4>Maintenance automobile</h4>
                                <p>Profitez de nos services de maintenance automobile pour garder votre véhicule en parfait état de marche.
                                    Les experts qualifiés assurent des réparations rapides et efficaces.</p>
                            </div>
                            <div class="choose-content mt-4">
                                <a href="{{ route('commande.maintenance.auto') }}" class="btn btn-primary">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-primary">
                                <!-- <img class="w-50" src="/../assets/img/car-maitenance-car-maintenance-car-mechanic-auto-repair-svgrepo-com.svg" alt> -->
                                <svg fill="#000000" height="64px" width="64px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 511.998 511.998" xml:space="preserve">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <g>
                                            <g>
                                                <circle cx="412.884" cy="56.354" r="39.327"></circle>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M362.164,339.364V472.09h0c0,12.576,10.195,22.772,22.772,22.772s22.772-10.195,22.772-22.772V339.364H362.164z"></path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M451.137,479.909V339.364h-33.596V472.09c0,12.576,10.195,22.772,22.772,22.772c4.901,0,9.428-1.563,13.142-4.196 C451.97,487.381,451.137,483.742,451.137,479.909z"></path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <circle cx="138.691" cy="150.165" r="40.197"></circle>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M245.395,255.653l-69.321-8.403l-44.679-29.696l26.681,8.76c-3.769-12.99-15.621-21.904-29.072-22l-28.055-0.201 c-16.96-0.122-30.764,13.632-30.717,30.582l0.283,103.442c0.022,8.114,3.277,15.883,9.043,21.592 c4.068,4.026,9.151,6.786,14.64,8.045H55.863L29.871,235.547c-1.605-8.171-9.529-13.488-17.7-11.885 c-8.169,1.606-13.491,9.531-11.885,17.7l28.383,144.396c1.39,7.07,7.589,12.168,14.794,12.168h41.067v52.221l-46.244,25.324 c-4.696,2.572-6.857,8.361-4.595,13.213c2.478,5.317,8.884,7.357,13.944,4.585l46.947-25.708l46.948,25.708 c5.075,2.779,11.483,0.719,13.953-4.602c2.251-4.849,0.089-10.626-4.6-13.194l-46.249-25.327v-52.221h43.914 c8.47,0,15.699-6.932,15.521-15.399c-0.104-4.91-2.563-9.232-6.285-11.909l14.025,3.27v98.579c0,11.85,9.215,21.944,21.059,22.366 c12.434,0.442,22.654-9.506,22.654-21.842V356.541c-0.001-10.16-7.001-18.979-16.895-21.285l-40.769-9.504l0.512-32.502 l-41.721-41.759l42.863,28.488c2.367,1.573,5.069,2.571,7.89,2.912c6.393,0.775,67.081,8.131,73.612,8.923 c9.919,1.198,19.059-5.885,20.272-15.889C262.494,265.939,255.38,256.864,245.395,255.653z"></path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M498.263,300.739H229.056c-7.586,0-13.736,6.15-13.736,13.736s6.15,13.736,13.736,13.736h6.68c0,5.44,0,146.103,0,151.699 c0,8.318,6.742,15.06,15.06,15.06h0.06c8.317,0,15.06-6.742,15.06-15.06c0-5.598,0-146.264,0-151.699h196.558l-0.186,151.699 c0,8.317,6.742,15.059,15.06,15.059h0.06c8.317,0,15.059-6.742,15.059-15.059c0-15.383,0-132.638,0-151.699h5.793 c7.587,0,13.736-6.15,13.736-13.736S505.849,300.739,498.263,300.739z"></path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M324.995,268.554H286.33c-5.551,0-10.051,4.499-10.051,10.05s4.5,10.05,10.051,10.05h38.665 c5.551,0,10.051-4.499,10.051-10.05S330.546,268.554,324.995,268.554z"></path>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M508.565,152.898c-0.124-24.638-20.269-44.682-44.907-44.682h-19.45c-2.486,6.495-20.858,54.491-23.523,61.457 l5.547-26.127c0.389-1.835,0.106-3.749-0.797-5.391l-7.617-13.852l6.771-12.316c1.008-1.835-0.321-4.085-2.416-4.085h-18.585 c-2.092,0-3.425,2.249-2.416,4.085l6.771,12.316l-7.645,13.904c-1.785,3.247-1.263,4.803,4.032,31.467 c-4.698-12.049-18.171-48.353-23.28-61.457h-19.267c-24.069,0-43.85,19.128-44.866,42.983l-9.116,55.527 c-1.218,7.416,2.057,14.852,8.347,18.962l46.008,30.05v33.848c12.284,0,88.857,0,100.903,0c0,0-0.368-22.677-0.388-136.394 c0-2.174,1.747-3.944,3.919-3.972s3.967,1.695,4.023,3.869l0.686,136.497l37.954,0.085L508.565,152.898z M362.155,210.406 l-14.901-9.732c5.443-33.631,7.167-45.507,7.573-47.585c0.366-1.87,2.092-3.156,3.988-2.971c1.896,0.185,3.339,1.78,3.339,3.685 V210.406z"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="choose-content">
                                <h4>Formation</h4>
                                <p>Nous offrons des formations professionnelles pour développer vos compétences et améliorer vos connaissances dans le domaine du transport.
                                    Inscrivez-vous dès aujourd'hui pour booster votre carrière.</p>
                            </div>
                            <div class="choose-content mt-4">
                                <a href="{{ route('formation.list') }}" class="btn btn-primary">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-primary">
                                <!-- <img class="w-50" src="/../assets/img/car-maitenance-car-maintenance-car-mechanic-auto-repair-svgrepo-com.svg" alt> -->
                                <svg width="64px" height="64px" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <title>library</title>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Combined-Shape" fill="#000000" transform="translate(42.666667, 85.333333)">
                                                <path d="M3.55271368e-14,298.666667 L426.666667,298.666667 L426.666667,341.333333 L3.55271368e-14,341.333333 L3.55271368e-14,298.666667 Z M42.6666667,1.42108547e-14 L106.666667,1.42108547e-14 L106.666667,277.333333 L42.6666667,277.333333 L42.6666667,1.42108547e-14 Z M128,21.3333333 L192,21.3333333 L192,277.333333 L128,277.333333 L128,21.3333333 Z M288.933802,36.9522088 L351.961498,25.8387255 L399.909944,277.333333 L330.641827,277.70319 L288.933802,36.9522088 Z M213.333333,21.3333333 L277.333333,21.3333333 L277.333333,277.333333 L213.333333,277.333333 L213.333333,21.3333333 Z"> </path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="choose-content">
                                <h4>Bibliothèque</h4>
                                <p>Accédez à notre bibliothèque bien fournie, comprenant une vaste collection de livres
                                    et de ressources éducatives pour tous les intérêts.</p>
                            </div>
                            <div class="choose-content mt-4">
                                <a href="{{ route('bibliotheque.verifier') }}" class="btn btn-primary">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-primary">
                                <!-- <img class="w-50" src="/../assets/img/car-maitenance-car-maintenance-car-mechanic-auto-repair-svgrepo-com.svg" alt> -->
                                <svg fill="#000000" width="64px" height="64px" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M12.691406 0L11.564453 2.3320312L9 2.6386719L10.949219 4.3613281L10.435547 7L12.691406 5.6816406L14.949219 7L14.435547 4.3613281L16.384766 2.6386719L13.820312 2.3320312L12.691406 0 z M 14.949219 7L10.435547 7L9.3007812 7C6.3730036 7 4 9.3730039 4 12.300781L4 45 A 1.0001 1.0001 0 0 0 5 46L45 46 A 1.0001 1.0001 0 0 0 46 45L46 12.300781C46 9.3730039 43.626997 7 40.699219 7L39.564453 7L35.050781 7L31.359375 7L26.845703 7L23.154297 7L18.640625 7L14.949219 7 z M 18.640625 7L20.896484 5.6816406L23.154297 7L22.640625 4.3613281L24.589844 2.6386719L22.025391 2.3320312L20.896484 0L19.769531 2.3320312L17.205078 2.6386719L19.154297 4.3613281L18.640625 7 z M 26.845703 7L29.103516 5.6816406L31.359375 7L30.845703 4.3613281L32.794922 2.6386719L30.230469 2.3320312L29.103516 0L27.974609 2.3320312L25.410156 2.6386719L27.359375 4.3613281L26.845703 7 z M 35.050781 7L37.308594 5.6816406L39.564453 7L39.050781 4.3613281L41 2.6386719L38.435547 2.3320312L37.308594 0L36.179688 2.3320312L33.615234 2.6386719L35.564453 4.3613281L35.050781 7 z M 9.3007812 9L40.699219 9C42.571441 9 44 10.428559 44 12.300781L44 44L29 44L29 36 A 1.0001 1.0001 0 0 0 28 35L22 35 A 1.0001 1.0001 0 0 0 21 36L21 44L6 44L6 12.300781C6 10.428559 7.4285592 9 9.3007812 9 z M 10 11 A 1.0001 1.0001 0 0 0 9 12L9 16 A 1.0001 1.0001 0 0 0 10 17L16 17 A 1.0001 1.0001 0 0 0 17 16L17 12 A 1.0001 1.0001 0 0 0 16 11L10 11 z M 22 11 A 1.0001 1.0001 0 0 0 21 12L21 16 A 1.0001 1.0001 0 0 0 22 17L28 17 A 1.0001 1.0001 0 0 0 29 16L29 12 A 1.0001 1.0001 0 0 0 28 11L22 11 z M 34 11 A 1.0001 1.0001 0 0 0 33 12L33 16 A 1.0001 1.0001 0 0 0 34 17L40 17 A 1.0001 1.0001 0 0 0 41 16L41 12 A 1.0001 1.0001 0 0 0 40 11L34 11 z M 11 13L15 13L15 15L11 15L11 13 z M 23 13L27 13L27 15L23 15L23 13 z M 35 13L39 13L39 15L35 15L35 13 z M 10 19 A 1.0001 1.0001 0 0 0 9 20L9 24 A 1.0001 1.0001 0 0 0 10 25L16 25 A 1.0001 1.0001 0 0 0 17 24L17 20 A 1.0001 1.0001 0 0 0 16 19L10 19 z M 22 19 A 1.0001 1.0001 0 0 0 21 20L21 24 A 1.0001 1.0001 0 0 0 22 25L28 25 A 1.0001 1.0001 0 0 0 29 24L29 20 A 1.0001 1.0001 0 0 0 28 19L22 19 z M 34 19 A 1.0001 1.0001 0 0 0 33 20L33 24 A 1.0001 1.0001 0 0 0 34 25L40 25 A 1.0001 1.0001 0 0 0 41 24L41 20 A 1.0001 1.0001 0 0 0 40 19L34 19 z M 11 21L15 21L15 23L11 23L11 21 z M 23 21L27 21L27 23L23 23L23 21 z M 35 21L39 21L39 23L35 23L35 21 z M 10 27 A 1.0001 1.0001 0 0 0 9 28L9 32 A 1.0001 1.0001 0 0 0 10 33L16 33 A 1.0001 1.0001 0 0 0 17 32L17 28 A 1.0001 1.0001 0 0 0 16 27L10 27 z M 22 27 A 1.0001 1.0001 0 0 0 21 28L21 32 A 1.0001 1.0001 0 0 0 22 33L28 33 A 1.0001 1.0001 0 0 0 29 32L29 28 A 1.0001 1.0001 0 0 0 28 27L22 27 z M 34 27 A 1.0001 1.0001 0 0 0 33 28L33 32 A 1.0001 1.0001 0 0 0 34 33L40 33 A 1.0001 1.0001 0 0 0 41 32L41 28 A 1.0001 1.0001 0 0 0 40 27L34 27 z M 11 29L15 29L15 31L11 31L11 29 z M 23 29L27 29L27 31L23 31L23 29 z M 35 29L39 29L39 31L35 31L35 29 z M 10 35 A 1.0001 1.0001 0 0 0 9 36L9 40 A 1.0001 1.0001 0 0 0 10 41L16 41 A 1.0001 1.0001 0 0 0 17 40L17 36 A 1.0001 1.0001 0 0 0 16 35L10 35 z M 34 35 A 1.0001 1.0001 0 0 0 33 36L33 40 A 1.0001 1.0001 0 0 0 34 41L40 41 A 1.0001 1.0001 0 0 0 41 40L41 36 A 1.0001 1.0001 0 0 0 40 35L34 35 z M 11 37L15 37L15 39L11 39L11 37 z M 23 37L27 37L27 44L23 44L23 37 z M 35 37L39 37L39 39L35 39L35 37 z"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="choose-content">
                                <h4>Assistance réservation appartements / hotel</h4>
                                <p>Simplifiez vos déplacements avec notre service d'assistance à la réservation d'appartements et d'hôtels.
                                    Nous trouvons pour vous les meilleures options de logement selon vos besoins et votre budget.</p>
                            </div>
                            <div class="choose-content mt-4">
                                <a href="{{ route('commande.reservation.appart.hotel') }}" class="btn btn-primary">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-primary">
                                <!-- <img class="w-50" src="/../assets/img/car-maitenance-car-maintenance-car-mechanic-auto-repair-svgrepo-com.svg" alt> -->
                                <svg fill="#000000" width="64px" height="64px" viewBox="0 -1.5 27 27" xmlns="http://www.w3.org/2000/svg">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="m25.714 10.286h.027c.465 0 .885.192 1.185.502.31.301.502.721.502 1.186v.028-.001.027c0 .465-.192.885-.502 1.185-.301.31-.721.502-1.186.502-.009 0-.019 0-.028 0h.001-.201l-1.541 8.869c-.069.413-.283.767-.587 1.015l-.003.002c-.29.249-.67.401-1.085.401-.004 0-.008 0-.013 0h-17.142c-.004 0-.008 0-.012 0-.415 0-.795-.152-1.087-.403l.002.002c-.307-.251-.52-.604-.588-1.008l-.001-.01-1.541-8.869h-.201c-.008 0-.017 0-.027 0-.465 0-.885-.192-1.185-.502-.31-.301-.502-.721-.502-1.186 0-.009 0-.019 0-.028v.001c0-.008 0-.017 0-.027 0-.465.192-.885.502-1.185.301-.31.721-.502 1.186-.502h.028-.001zm-19.223 10.714c.236-.017.442-.13.581-.3l.001-.001c.131-.146.211-.339.211-.552 0-.025-.001-.05-.003-.074v.003l-.429-5.572c-.017-.236-.13-.442-.3-.581l-.001-.001c-.146-.131-.339-.211-.552-.211-.025 0-.05.001-.074.003h.003c-.236.017-.442.13-.581.3l-.001.001c-.131.146-.211.339-.211.552 0 .025.001.05.003.074v-.003l.429 5.572c.015.224.118.422.274.562l.001.001c.149.141.35.228.572.228h.011-.001zm5.505-.856v-5.572c0-.002 0-.005 0-.008 0-.234-.097-.445-.254-.594-.15-.157-.361-.254-.595-.254-.003 0-.005 0-.008 0-.002 0-.005 0-.008 0-.234 0-.445.097-.594.254-.157.15-.254.361-.254.595v.008 5.572.008c0 .234.097.445.254.594.15.157.361.254.595.254h.008.008c.234 0 .445-.097.594-.254.159-.15.258-.363.258-.598 0-.002 0-.004 0-.006zm5.143 0v-5.572c0-.002 0-.005 0-.008 0-.234-.097-.445-.254-.594-.15-.157-.361-.254-.595-.254-.003 0-.005 0-.008 0-.002 0-.005 0-.008 0-.234 0-.445.097-.594.254-.157.15-.254.361-.254.595v.008 5.572.008c0 .234.097.445.254.594.15.157.361.254.595.254h.008.008c.234 0 .445-.097.594-.254.159-.15.258-.363.258-.598 0-.002 0-.004 0-.006zm4.714.066.429-5.572c.002-.021.003-.046.003-.071 0-.212-.08-.406-.211-.553l.001.001c-.141-.172-.347-.285-.58-.302h-.003c-.021-.002-.046-.003-.071-.003-.212 0-.406.08-.553.211l.001-.001c-.172.141-.285.347-.302.58v.003l-.429 5.572c-.002.021-.003.046-.003.071 0 .212.08.406.211.553l-.001-.001c.141.172.347.285.58.302h.003.067.01c.222 0 .423-.087.573-.228.159-.141.263-.34.279-.564v-.003zm-15.478-16.3-1.245 5.518h-1.768l1.352-5.906c.163-.785.59-1.45 1.182-1.915l.007-.005c.571-.464 1.306-.744 2.107-.744h.038-.002 2.236c0-.002 0-.005 0-.008 0-.234.097-.445.254-.594.15-.157.361-.255.596-.255h.012 5.142.008c.234 0 .445.097.594.254.157.15.254.361.254.595v.008h2.236.037c.801 0 1.536.28 2.112.748l-.006-.005c.599.47 1.025 1.135 1.185 1.899l.004.021 1.352 5.906h-1.768l-1.245-5.518c-.095-.392-.312-.724-.606-.962l-.003-.003c-.282-.233-.647-.375-1.046-.375-.007 0-.014 0-.02 0h-2.235v.008c0 .234-.097.445-.254.594-.15.157-.361.254-.595.254-.003 0-.005 0-.008 0h-5.142c-.002 0-.005 0-.008 0-.234 0-.445-.097-.594-.254-.157-.15-.254-.361-.254-.595 0-.003 0-.005 0-.008h-2.236c-.006 0-.013 0-.019 0-.398 0-.764.142-1.048.377l.003-.002c-.297.242-.512.574-.603.954l-.002.012z"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="choose-content">
                                <h4>Livraison Panier Alimentaire</h4>
                                <p>Nous récupérons vos colis et assurons une livraison rapide à la destination de votre choix,
                                    garantissant ainsi votre tranquillité d'esprit et votre satisfaction</p>
                            </div>
                            <div class="choose-content mt-4">
                                <a href="{{ route('livraison.panier') }}" class="btn btn-primary">En savoir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pricing-section pricing-page pricing-section-bottom">
    <div class="container">

        <div class="section-heading" data-aos="fade-down">
            <h2>Acquérez vous de nos Accès aux privilèges</h2>
            <p>Découvrez un forfait qui vous convient</p>
        </div>


        <!-- <div class="plan-selected" data-aos="fade-down">
            <h4>Monthly</h4>
            <div class="status-toggle me-2 ms-2">
                <input id="list-rating_1" class="px-4 check" type="checkbox" checked>
                <label for="list-rating_1" class="px-4 checktoggle checkbox-bg">checkbox</label>
            </div>
            <h4>Annually</h4>
        </div> -->

        <div class="row d-flex justify-content-center">
            <div class="col-lg-9 d-flex col-md-6 col-12" style="height: 30rem;" data-aos="fade-down">
                <div class="price-card price-selected flex-fill">
                    <div class="price-head">
                        <h2>Profiter davantage avec les bons plans</h2>
                        <p style="text-align: justify;">Découvrez l'avantage de nos abonnements exclusifs! En souscrivant à nos privilèges,
                            vous bénéficiez de rabais significatifs sur toutes vos commandes de location de voitures.
                            Mais ce n'est pas tout! Profitez également de nos services de livraison de paniers alimentaires
                            à la destination de votre choix et d'une assistance complète pour la réservation d'appartements et d'hôtels.
                            Simplifiez votre vie quotidienne et faites des économies grâce à nos offres exceptionnelles.
                            Rejoignez notre programme de privilèges dès aujourd'hui et laissez-nous vous offrir le meilleur des services pour un confort inégalé.</p>
                    </div>
                    <div class="price-body">
                        <img class="img-fluid" src="assets/img/price-plan.png" alt="Price Plan">
                    </div>
                    <a href="{{route('abonnement.index')}}" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Mot de la promotrice</h2>
            </div>
        </div>
    </div>
</div>

<div class="testimonials-section">
    <div class="container">
        <div class="testimonial-group">
            <div class="row">
                <div class="col-lg-12 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="quotes-head"></div>
                            <!-- <div class="review-box">
                                <div class="review-profile">
                                    <div class="review-img">
                                        <img src="assets/img/profiles/avatar-02.jpg" class="img-fluid" alt="img" />
                                    </div>
                                </div>
                                <div class="review-details">
                                    <h6>Rabien Ustoc</h6>
                                    <div class="list-rating">
                                        <div class="list-rating-star">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                        </div>
                                        <p><span>(5.0)</span></p>
                                    </div>
                                </div>
                            </div> -->
                            <p>
                                Viser loin, et y aller par petits pas a toujours été la boussole de nos engaements. Nous
                                n'allons ménager aucun effort pour vous offrir l'excellence dans nos Agences. Vos désirs
                                seront nos priorités. Je vous invite à vous abonner pour découvrir notre gamme de
                                produits et services...Nous vous attendons.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section faq-section bg-light-primary">
    <div class="container">

        <div class="section-heading" data-aos="fade-down">
            <h2>FAITES-UN DON </h2>
            <p>Nous avons besoin de vous pour grandir. L'Afrique a besoin de vous pour assurer son épanouissement social...La PME Africaine a besoin de votre support</p>
        </div>

        <div class="faq-info mb-3">
            <div class="faq-card bg-white" data-aos="fade-down">
                <h4 class="faq-title">
                    1. Je suis de la Diaspora et je veux aider CBS
                </h4>
            </div>
            <div class="faq-card bg-white" data-aos="fade-down">
                <h4 class="faq-title">
                    2. Je suis de la Diaspora et je veux aider une entreprise autre que CBS
                </h4>
            </div>
            <div class="faq-card bg-white" data-aos="fade-down">
                <h4 class="faq-title">
                    3. Je suis résidant Camerounais et je veux aider CBS
                </h4>
            </div>
            <div class="faq-card bg-white" data-aos="fade-down">
                <h4 class="faq-title">
                    4. Je suis résidant Camerounais et je veux aider une entreprise autre que CBS
                </h4>
            </div>
        </div>
        <div class="view-all text-center" data-aos="fade-down">
            <a href="#" class="btn btn-primary h-100 d-inline-flex align-items-center">
                <span>OM : +237 659826528 / MOMO : +237 653100205</span></a>
        </div>
    </div>
</section>

@endsection