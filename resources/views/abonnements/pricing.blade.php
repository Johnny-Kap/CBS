@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Les plans d'abonnement disponibles </h2>
            </div>
        </div>
    </div>
</div>

<section class="section pricing-section pricing-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="200">
                <div class="price-card">
                    <div class="price-head">
                        <div class="price-level">
                            <h6>Essential</h6>
                            <p>For the basics</p>
                        </div>
                        <h4>$49</h4>
                        <span>Per user per month</span>
                    </div>
                    <div class="price-details">
                        <ul>
                            <li class="price-check"><span><i class="fa-regular fa-circle-check"></i></span>Get
                                Starting message</li>
                            <li class="price-check"><span><i class="fa-regular fa-circle-check"></i></span>Min 1
                                month, extend anytime</li>
                            <li class="price-check"><span><i class="fa-regular fa-circle-check"></i></span>Rental car prices include
                                tax</li>
                            <li class="price-uncheck"><span><i class="fa-regular fa-circle-xmark"></i></span>Extend or return anytime
                            </li>
                            <li class="price-uncheck"><span><i class="fa-regular fa-circle-xmark"></i></span>Doorstep delivery in 2days
                            </li>
                            <li class="price-uncheck"><span><i class="fa-regular fa-circle-xmark"></i></span>Car
                                system included free of charge.</li>
                            <li class="price-uncheck"><span><i class="fa-regular fa-circle-xmark"></i></span>Min
                                1 month, extend anytime</li>
                        </ul>
                        <div>
                            <a href="login.html" class="btn viewdetails-btn">Request a demo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection