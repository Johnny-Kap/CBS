<header class="header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo">
                    <img src="/../assets/img/logo_slogan_2.png" class="img-fluid" alt="Logo">
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo-small">
                    <img src="/../assets/img/logo_slogan_petit_2.png" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{url('/')}}" class="menu-logo">
                        <img src="/../assets/img/logo_slogan_2.png" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav">
                    <li class="{{ Request::route()->named('home') || Request::route()->named('welcome') ? 'active' : '' }}"><a href="{{url('/')}}">Accueil</a></li>
                    <!-- <li class="has-submenu">
                        <a href>Services <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="listing-grid.html">Location</a></li>
                            <li><a href="listing-list.html">Listing List</a></li>
                            <li><a href="listing-details.html">Listing Details</a></li>
                        </ul>
                    </li> -->
                    <li class="has-submenu {{ Request::route()->named('location.list') || Request::route()->named('commande.maintenance.auto') || Request::route()->named('bibliotheque.verifier') || Request::route()->named('formation.list') || Request::route()->named('commande.reservation.appart.hotel') || Request::route()->named('livraison.panier') ? 'active' : '' }}">
                        <a href>Nos offres <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <!-- <li><a href="about-us.html">About Us</a></li> -->
                            <li class=" {{ Request::route()->named('location.list') ? 'active' : '' }}">
                                <a href="{{route('location.list')}}">Location de voitures</a>
                            </li>
                            <li class=" {{ Request::route()->named('commande.maintenance.auto') ? 'active' : '' }}">
                                <a href="{{route('commande.maintenance.auto')}}">Maintenance automobile</a>
                            </li>
                            <li class="{{ Request::route()->named('bibliotheque.verifier') ? 'active' : '' }}">
                                <a href="{{route('bibliotheque.verifier')}}">Bibliothèque</a>
                            </li>
                            <li class="{{ Request::route()->named('formation.list') ? 'active' : '' }}">
                                <a href="{{route('formation.list')}}">Formation</a>
                            </li>
                            <li class="{{Request::route()->named('livraison.panier') ? 'active' : ''}}">
                                <a href="{{route('livraison.panier')}}">Livraison Panier Alimentaire</a>
                            </li>
                            <li class="{{Request::route()->named('commande.reservation.appart.hotel') ? 'active' : ''}}">
                                <a href="{{route('commande.reservation.appart.hotel')}}">Assistance réservation appartements / hotel</a>
                            </li>     
                            <!-- <li class="has-submenu">
                                <a href="javascript:void(0);">Booking</a>
                                <ul class="submenu">
                                    <li><a href="booking-payment.html">Booking Checkout</a></li>
                                    <li><a href="booking.html">Booking</a></li>
                                    <li><a href="invoice-details.html">Invoice Details</a></li>
                                </ul>
                            </li> -->
                            <!-- <li class="has-submenu">
                                <a href="javascript:void(0);">Error Page</a>
                                <ul class="submenu">
                                    <li><a href="error-404.html">404 Error</a></li>
                                    <li><a href="error-500.html">500 Error</a></li>
                                </ul>
                            </li> -->
                            <!-- <li><a href="faq.html">FAQ</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="our-team.html">Our Team</a></li>
                            <li><a href="testimonial.html">Testimonials</a></li>
                            <li><a href="terms-condition.html">Terms & Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="maintenance.html">Maintenance</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li> -->
                        </ul>
                    </li>
                    <!-- <li class="has-submenu {{ Request::route()->named('commande.reservation.appart.hotel') || Request::route()->named('livraison.panier') ? 'active' : '' }}">
                        <a href>Autres services <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="about-us.html">About Us</a></li>
                            
                            
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Booking</a>
                                <ul class="submenu">
                                    <li><a href="booking-payment.html">Booking Checkout</a></li>
                                    <li><a href="booking.html">Booking</a></li>
                                    <li><a href="invoice-details.html">Invoice Details</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Error Page</a>
                                <ul class="submenu">
                                    <li><a href="error-404.html">404 Error</a></li>
                                    <li><a href="error-500.html">500 Error</a></li>
                                </ul>
                            </li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="our-team.html">Our Team</a></li>
                            <li><a href="testimonial.html">Testimonials</a></li>
                            <li><a href="terms-condition.html">Terms & Conditions</a></li>
                            <li><a href="privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="maintenance.html">Maintenance</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li> -->
                    <li class="{{ Request::route()->named('abonnement.index') ? 'active' : '' }}">
                        <a href="{{route('abonnement.index')}}">Accès aux privilèges</a>
                    </li>
                    <li class="{{ Request::route()->named('contact') ? 'active' : '' }}"><a href="{{route('contact')}}">Contact</a></li>
                    <li class="{{ Request::route()->named('propos') ? 'active' : '' }}"><a href="{{route('propos')}}">A propos de nous</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li class="login-link">
                        <a class="nav-link header-login" href="{{ route('myprofile') }}">{{Auth::user()->name}}
                            <span><i class="fa fa-user"></i></span></a>
                    </li>
                    @else
                    <li class="login-link">
                        <a href="{{route('login')}}">Se connecter</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="login-link">
                        <a href="{{route('register')}}">Créer son compte</a>
                    </li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>

            <ul class="nav header-navbar-rht">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('myprofile') }}">{{Auth::user()->name}}
                        <span><i class="fa fa-user"></i></span></a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('login') }}"><span><i class="fa fa-sign-in"></i></span>Se connecter</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link header-reg" href="{{route('register')}}"><span><i class="fa fa-user-plus"></i></span>Créer son compte</a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
        </nav>
    </div>
</header>