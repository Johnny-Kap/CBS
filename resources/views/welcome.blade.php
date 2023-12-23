@extends('layouts.template')

@section('content')

<section class="banner-section banner-slider">
    <div class="container">
        <div class="home-banner">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-down">
                    <p class="explore-text"> <span><i class="fa-solid fa-thumbs-up me-2"></i></span>100% Trusted
                        car rental platform in the World</p>
                    <h1>Find Your Best <br>
                        <span>Dream Car for Rental</span>
                    </h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                        has been the industry's standard dummy text ever since the 1500s</p>
                    <div class="view-all">
                        <a href="listing-grid.html" class="btn btn-view d-inline-flex align-items-center">View
                            all Cars <span><i class="fas fa-arrow-right ms-2"></i></span></a>
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
</section>

<div class="section-search">
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
</div>


<section class="section services">
    <div class="service-right">
        <img src="assets/img/bg/service-right.svg" class="img-fluid" alt="services right">
    </div>
    <div class="container">

        <div class="section-heading" data-aos="fade-down">
            <h2>How It Works</h2>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
        </div>

        <div class="services-work">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-secondary">
                            <img class="icon-img bg-secondary" src="assets/img/icons/services-icon-01.svg"
                                alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>1. Choose Locations</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-warning">
                            <img class="icon-img bg-warning" src="assets/img/icons/services-icon-01.svg"
                                alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>2. Pick-Up Locations</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down">
                    <div class="services-group">
                        <div class="services-icon border-dark">
                            <img class="icon-img bg-dark" src="assets/img/icons/services-icon-01.svg"
                                alt="Choose Locations">
                        </div>
                        <div class="services-content">
                            <h3>3. Book your Car</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
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
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-12" data-aos="fade-down">
                <div class="listing-tabs-group">
                    <ul class="nav listing-buttons gap-3" data-bs-tabs="tabs">
                        <li>
                            <a class="active" aria-current="true" data-bs-toggle="tab" href="#Carmazda">
                                <span>
                                    <img src="assets/img/icons/car-icon-01.svg" alt="Mazda">
                                </span>
                                Mazda
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#Caraudi">
                                <span>
                                    <img src="assets/img/icons/car-icon-02.svg" alt="Audi">
                                </span>
                                Audi
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#Carhonda">
                                <span>
                                    <img src="assets/img/icons/car-icon-03.svg" alt="Honda">
                                </span>
                                Honda
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#Cartoyota">
                                <span>
                                    <img src="assets/img/icons/car-icon-04.svg" alt="Toyota">
                                </span>
                                Toyota
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#Caracura">
                                <span>
                                    <img src="assets/img/icons/car-icon-05.svg" alt="Acura">
                                </span>
                                Acura
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tab" href="#Cartesla">
                                <span>
                                    <img src="assets/img/icons/car-icon-06.svg" alt="Tesla">
                                </span>
                                Tesla
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="Carmazda">
                <div class="row">

                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-01.jpg" class="img-fluid" alt="Toyota">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Toyota</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-0.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">Toyota Camry SE 350</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-01.svg" alt="Auto"></span>
                                            <p>Auto</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="10 KM"></span>
                                            <p>10 KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Petrol"></span>
                                            <p>Petrol</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p>Power</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2018"></span>
                                            <p>2018</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>5 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Germany
                                    </div>
                                    <div class="listing-price">
                                        <h6>$400 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="#" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-02.jpg" class="img-fluid" alt="KIA">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">KIA</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-02.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">Kia Soul 2016</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-01.svg" alt="Auto"></span>
                                            <p>Auto</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="22 KM"></span>
                                            <p>22 KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Petrol"></span>
                                            <p>Petrol</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Diesel"></span>
                                            <p>Diesel</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2016"></span>
                                            <p>2016</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>5 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Belgium
                                    </div>
                                    <div class="listing-price">
                                        <h6>$80 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="listing-details.html" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-03.jpg" class="img-fluid" alt="Audi">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Audi</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-03.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">Audi A3 2019 new</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="Manual"></span>
                                            <p>Manual</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="10 KM"></span>
                                            <p>10 KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Petrol"></span>
                                            <p>Petrol</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p>Power</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2019"></span>
                                            <p>2019</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>4 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Newyork, USA
                                    </div>
                                    <div class="listing-price">
                                        <h6>$45 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="listing-details.html" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-04.jpg" class="img-fluid" alt="Audi">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Ferrai</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-04.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">Ferrari 458 MM Speciale</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="Manual"></span>
                                            <p>Manual</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="14 KM"></span>
                                            <p>14 KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Diesel"></span>
                                            <p>Diesel</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Basic"></span>
                                            <p>Basic</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2022"></span>
                                            <p>2022</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>5 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Newyork, USA
                                    </div>
                                    <div class="listing-price">
                                        <h6>$160 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="listing-details.html" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-05.jpg" class="img-fluid" alt="Audi">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Chevrolet</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-05.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">2018 Chevrolet Camaro</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="Manual"></span>
                                            <p>Manual</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="18 KM"></span>
                                            <p>18 KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Diesel"></span>
                                            <p>Diesel</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p>Power</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2018"></span>
                                            <p>2018</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>4 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Germany
                                    </div>
                                    <div class="listing-price">
                                        <h6>$36 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="listing-details.html" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-06.jpg" class="img-fluid" alt="Audi">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Acura</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-06.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">Acura Sport Version</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-01.svg" alt="Auto"></span>
                                            <p>Auto</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="12 KM"></span>
                                            <p>12 KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Diesel"></span>
                                            <p>Diesel</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p>Power</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2013"></span>
                                            <p>2013</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>5 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Newyork, USA
                                    </div>
                                    <div class="listing-price">
                                        <h6>$30 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="listing-details.html" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-07.jpg" class="img-fluid" alt="Audi">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Chevrolet</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-07.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">Chevrolet Pick Truck 3.5L</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="Manual"></span>
                                            <p>Manual</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="10 KM"></span>
                                            <p>10 KM</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Petrol"></span>
                                            <p>Petrol</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p>Power</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2012"></span>
                                            <p>2012</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>5 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Spain
                                    </div>
                                    <div class="listing-price">
                                        <h6>$77 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="listing-details.html" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-08.jpg" class="img-fluid" alt="Toyota">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Toyota</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-08.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">Toyota Tacoma 4WD</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-01.svg" alt="Auto"></span>
                                            <p>Auto</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="22 miles"></span>
                                            <p>22 miles</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Diesel"></span>
                                            <p>Diesel</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p>Power</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2019"></span>
                                            <p>2019</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>5 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Dallas, USA
                                    </div>
                                    <div class="listing-price">
                                        <h6>$30 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="listing-details.html" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6 col-12" data-aos="fade-down">
                        <div class="listing-item">
                            <div class="listing-img">
                                <a href="listing-details.html">
                                    <img src="assets/img/cars/car-09.jpg" class="img-fluid" alt="Toyota">
                                </a>
                                <div class="fav-item">
                                    <span class="featured-text">Accura</span>
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="feather-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="listing-content">
                                <div class="listing-features">
                                    <a href="javascript:void(0)" class="author-img">
                                        <img src="assets/img/profiles/avatar-10.jpg" alt="author">
                                    </a>
                                    <h3 class="listing-title">
                                        <a href="listing-details.html">Acura RDX FWD</a>
                                    </h3>
                                    <div class="list-rating">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <span>(5.0)</span>
                                    </div>
                                </div>
                                <div class="listing-details-group">
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-01.svg" alt="Auto"></span>
                                            <p>Auto</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-02.svg" alt="22 miles"></span>
                                            <p>42 miles</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-03.svg" alt="Petrol"></span>
                                            <p>Petrol</p>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                            <p>Power</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-05.svg" alt="2019"></span>
                                            <p>2021</p>
                                        </li>
                                        <li>
                                            <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                            <p>5 Persons</p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="listing-location-details">
                                    <div class="listing-price">
                                        <span><i class="feather-map-pin"></i></span>Dallas, USA
                                    </div>
                                    <div class="listing-price">
                                        <h6>$80 <span>/ Day</span></h6>
                                    </div>
                                </div>
                                <div class="listing-button">
                                    <a href="listing-details.html" class="btn btn-order"><span><i
                                                class="feather-calendar me-2"></i></span>Rent Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
            <h2>Why Choose Us</h2>
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
        </div>

        <div class="why-choose-group">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-black">
                                <img src="assets/img/icons/bx-user-check.svg" alt>
                            </div>
                            <div class="choose-content">
                                <h4>Easy & Fast Booking</h4>
                                <p>Completely carinate e business testing process whereas fully researched
                                    customer service. Globally extensive content with quality.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-secondary">
                                <img src="assets/img/icons/bx-user-check.svg" alt>
                            </div>
                            <div class="choose-content">
                                <h4>Many Pickup Location</h4>
                                <p>Enthusiastically magnetic initiatives with cross-platform sources.
                                    Dynamically target testing procedures through effective.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <div class="choose-img choose-primary">
                                <img src="assets/img/icons/bx-user-check.svg" alt>
                            </div>
                            <div class="choose-content">
                                <h4>Customer Satisfaction</h4>
                                <p>Globally user centric method interactive. Seamlessly revolutionize unique
                                    portals corporate collaboration.</p>
                            </div>
                        </div>
                    </div>
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