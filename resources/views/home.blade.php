@extends('layouts.template')

@section('content')

<section class="banner-section banner-slider" style="height: 45rem;">
    <div class="container">
        <div class="home-banner">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-down">
                    <!-- <p class="explore-text"> <span><i class="fa-solid fa-thumbs-up me-2"></i></span>100% de confiance
                        plateforme de location de voitures dans le monde</p>
                    <h1>Trouvez votre meilleur <br>
                        <span>Voiture de rêve à louer</span>
                    </h1> -->
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s</p> -->
                    <div class="view-all">
                        <a href="{{route('location.list')}}" class="btn btn-view d-inline-flex align-items-center">Voir toutes les locations <span><i class="fas fa-arrow-right ms-2"></i></span></a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-down">
                    <div class="banner-imgs">
                        <!-- <img src="/../assets/img/car-right.png" class="img-fluid aos" alt="bannerimage"> -->
                    </div>
                </div>
            </div>
        </div>
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
            <h2>Faîtes confiance à Car Booking Services</h2>
            <p>Votre agence de location pour vos déplacements urbain et Inter-Urbain en toute sécurité
            </p>
        </div>

        <div class="services-work">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-secondary">
                            <img class="icon-img bg-secondary" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>1. Abonnez- vous et réservez maintenant </h3>
                            <p>Bénéficiez d'un rabais de 30% sur vos courses avec un numéro d'abonnement
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-warning">
                            <img class="icon-img bg-warning" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>2. Reservez sans abonnement</h3>
                            <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-dark">
                            <img class="icon-img bg-dark" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>3. Réservez votre voiture</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<section class="section popular-services popular-explore">
    <div class="container">
        <div class="section-heading" data-aos="fade-down">
            <h2>Location de voitures</h2>
            <!-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p> -->
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="Carmazda">
                <div class="row">
                    @foreach($location as $item)
                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->intitule)]) }}">
                                    <img src="{{ Storage::url($item->vehicules->image_illustrative) }}" style="width: 30rem; height: 15rem;" class="img-fluid" alt="Toyota">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">{{$item->vehicules->intitule}}</span>
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
                                        <a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->intitule)]) }}">{{$item->intitule}}</a>
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
                                    <a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->intitule)]) }}" class="btn btn-order"><span><i class="fas fa-calendar me-2"></i></span>Louer maintenant</a>
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
            <h2>Faîtes confiance à Car Booking Services pour assurer la maintenance de vos véhicules</h2>
            <!-- <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p> -->
        </div>

        <div class="why-choose-group">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-black">
                                <img src="assets/img/icons/bx-user-check.svg" alt>
                            </div>
                            <div class="choose-content">
                                <h4>Abonnez vous et décrivez votre panne</h4>
                                <!-- <p>Processus de test e-business complètement caréné alors qu'il a fait l'objet de recherches complètes
                                    service client. Contenu mondial étendu et de qualité.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-secondary">
                                <img src="assets/img/icons/bx-user-check.svg" alt>
                            </div>
                            <div class="choose-content">
                                <h4>Décrivez votre panne sans abonnement</h4>
                                <!-- <p>Des initiatives enthousiastes et magnétiques avec des sources multiplateformes.
                                    Ciblez dynamiquement les procédures de test grâce à leur efficacité.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-primary">
                                <img src="assets/img/icons/bx-user-check.svg" alt>
                            </div>
                            <div class="choose-content">
                                <h4>Satisfaction du client</h4>
                                <p>Méthode globalement centrée sur l'utilisateur interactive. Révolutionnez en toute transparence l'unique
                                    portails collaboration d'entreprise.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

<section class="section facts-number">
    <div class="facts-left">
        <img src="assets/img/bg/facts-left.png" class="img-fluid" alt="facts left">
    </div>
    <div class="facts-right">
        <img src="assets/img/bg/facts-right.png" class="img-fluid" alt="facts right">
    </div>
    <div class="container">

        <div class="section-heading" data-aos="fade-down">
            <h2 class="title text-white">Perfectionnez vous</h2>
            <!-- <p class="description text-white">Lorem Ipsum has been the industry's standard dummy text ever since
                the 1500s,</p> -->
        </div>

        <div class="counter-group">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="count-group flex-fill">
                        <div class="customer-count d-flex align-items-center">
                            <div class="count-img">
                                <img src="assets/img/icons/bx-car.svg" alt>
                            </div>
                            <div class="count-content">
                                <h4>Conduite Automobile</h4>
                                <!-- <p>Happy Customers</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="count-group flex-fill">
                        <div class="customer-count d-flex align-items-center">
                            <div class="count-img">
                                <img src="assets/img/icons/bx-car.svg" alt>
                            </div>
                            <div class="count-content">
                                <h4>Gestion des transports </h4>
                                <!-- <p>Count of Cars</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="count-group flex-fill">
                        <div class="customer-count d-flex align-items-center">
                            <div class="count-img">
                                <img src="assets/img/icons/bx-car.svg" alt>
                            </div>
                            <div class="count-content">
                                <h4>Amélioration continue</h4>
                                <!-- <p>Amélioration continue</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="count-group flex-fill">
                        <div class="customer-count d-flex align-items-center">
                            <div class="count-img">
                                <img src="assets/img/icons/bx-car.svg" alt>
                            </div>
                            <div class="count-content">
                                <h4>Gestion des operations</h4>
                                <!-- <p>Total Kilometer</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section services">
    <div class="service-right">
        <img src="assets/img/bg/service-right.svg" class="img-fluid" alt="services right">
    </div>
    <div class="container">

        <div class="section-heading" data-aos="fade-down">
            <h2>Bibliotheque Numerique</h2>
            <p>Abonnez vous et ayez accès à une panoplie d'information Nationale et Internationale sur le transport
            </p>
        </div>

        <div class="services-work">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-secondary">
                            <img class="icon-img bg-secondary" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>1. Abonnez vous maintenant et ayez accès à toutes l'information disponible </h3>
                            <!-- <p>Bénéficiez d'un rabais de 30% sur vos courses avec un numéro d'abonnement
                            </p> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-warning">
                            <img class="icon-img bg-warning" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>2. Consultez sans abonnement</h3>
                            <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p> -->
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-dark">
                            <img class="icon-img bg-dark" src="assets/img/icons/services-icon-01.svg" alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>3. Réservez votre voiture</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                </div> -->
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
                                produits et services...Nous vous attendons
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection