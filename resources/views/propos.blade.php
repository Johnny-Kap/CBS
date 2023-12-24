@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">À propos de nous</h2>
                <!-- <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">About us</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </div>
</div>


<section class="section about-sec">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-down">
                <div class="about-img">
                    <div class="about-exp">
                        <span>12+ years of experiences</span>
                    </div>
                    <div class="abt-img">
                        <img src="assets/img/about-us.png" class="img-fluid" alt="About us">
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-down">
                <div class="about-content">
                    <h6>ABOUT OUR COMPANY</h6>
                    <h2>Best Solution For Cleaning Services</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim minim veniam, quis nostrud exercitation ullamco
                        laboris nisi esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                        architecto beatae vitae dicta sunt explicabo.</p>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li>At vero et accusamus iusto dignissimos</li>
                                <li>At vero et accusamus iusto dignissimos</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>Nam libero tempore, cum soluta nobis</li>
                                <li>Nam libero tempore, cum soluta nobis</li>
                            </ul>
                        </div>
                    </div>
                </div>
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
            <h2 class="title text-white">Facts By The Numbers</h2>
            <p class="description text-white">Lorem Ipsum has been the industry's standard dummy text ever since
                the 1500s,</p>
        </div>

        <div class="counter-group">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="count-group flex-fill">
                        <div class="customer-count d-flex align-items-center">
                            <div class="count-img">
                                <img src="assets/img/icons/bx-heart.svg" alt>
                            </div>
                            <div class="count-content">
                                <h4><span class="counterUp">16</span>K+</h4>
                                <p>Happy Customers</p>
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
                                <h4><span class="counterUp">2547</span>+</h4>
                                <p>Count of Cars</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="count-group flex-fill">
                        <div class="customer-count d-flex align-items-center">
                            <div class="count-img">
                                <img src="assets/img/icons/bx-headphone.svg" alt>
                            </div>
                            <div class="count-content">
                                <h4><span class="counterUp">625</span>K+</h4>
                                <p>Car Center Solutions</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down">
                    <div class="count-group flex-fill">
                        <div class="customer-count d-flex align-items-center">
                            <div class="count-img">
                                <img src="assets/img/icons/bx-history.svg" alt>
                            </div>
                            <div class="count-content">
                                <h4><span class="counterUp">200</span>K+</h4>
                                <p>Total Kilometer</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection