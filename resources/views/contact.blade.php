@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Contactez-nous</h2>
                <!-- <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </div>
</div>


<section class="contact-section">
    <div class="container">
        <div class="contact-info-area">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="0.1">
                    <div class="single-contact-info flex-fill">
                        <span><i class="fas fa-phone"></i></span>
                        <h3>N° Téléphone</h3>
                        <a href="tel:+237 659826528">+237 659826528 / +237 653100205</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="0.2">
                    <div class="single-contact-info flex-fill">
                        <span><i class="fas fa-envelope"></i></span>
                        <h3>Email</h3>
                        <a href="mailt:hello@cbs-cameroun.com"><span class="__cf_email__">hello@cbs-cameroun.com</span></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="0.3">
                    <div class="single-contact-info flex-fill">
                        <span><i class="fas fa-map-pin"></i></span>
                        <h3>Localisation</h3>
                        <a href="javascript:void(0);">Bonapriso - Douala</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 d-flex" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="0.4">
                    <div class="single-contact-info flex-fill">
                        <span><i class="fas fa-clock"></i></span>
                        <h3>Heures d'ouverture</h3>
                        <a href="javascript:void(0);">Lun - Ven (8h00 - 18h00) | Sam (9h00 - 14h00)</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-info-area" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="0.5">
            <div class="row">
                <div class="col-lg-6">
                    <img src="/../assets/img/contact-info.jpg" class="img-fluid" alt="Contact">
                </div>
                <div class="col-lg-6">
                    <form action="#">
                        <div class="row">
                            <h1>Entrer en contact!</h1>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nom <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>N° Téléphone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Commentaires <span class="text-danger">*</span></label>
                                    <textarea class="form-control" rows="4" cols="50" placeholder>
											</textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn contact-btn w-100">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection