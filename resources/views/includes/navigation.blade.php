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
                    <img src="/../assets/img/logo_final.PNG" class="img-fluid" alt="Logo">
                </a>
                <a href="{{url('/')}}" class="navbar-brand logo-small">
                    <img src="/../assets/img/logo-small.png" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.html" class="menu-logo">
                        <img src="/../assets/img/logo.svg" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);"> <i class="fas fa-times"></i></a>
                </div>
                <ul class="main-nav">
                    <li class="active"><a href="{{url('/')}}">Accueil</a></li>
                    <!-- <li class="has-submenu">
                        <a href>Services <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="listing-grid.html">Location</a></li>
                            <li><a href="listing-list.html">Listing List</a></li>
                            <li><a href="listing-details.html">Listing Details</a></li>
                        </ul>
                    </li> -->
                    <li class="has-submenu">
                        <a href>Nos offres <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <!-- <li><a href="about-us.html">About Us</a></li> -->
                            <li class="has-submenu">
                                <a href="javascript:void(0);">Services</a>
                                <ul class="submenu">
                                    <li><a href="{{route('location.list')}}">Location</a></li>
                                    <!-- <li><a href="login.html">Signin</a></li>
                                    <li><a href="forgot-password.html">Forgot Password</a></li>
                                    <li><a href="reset-password.html">Reset Password</a></li> -->
                                </ul>
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
                            <li><a href="pricing.html">Abonnements</a></li>
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
                    <!-- <li class="has-submenu">
                        <a href>Blog <i class="fas fa-chevron-down"></i></a>
                        <ul class="submenu">
                            <li><a href="blog-list.html">Blog List</a></li>
                            <li><a href="blog-grid.html">Blog Grid</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul>
                    </li> -->
                    <li><a href="contact-us.html">Contact</a></li>
                    <li><a href="contact-us.html">A propos</a></li>
                    <li class="login-link">
                        <a href="register.html">Sign Up</a>
                    </li>
                    <li class="login-link">
                        <a href="login.html">Sign In</a>
                    </li>
                </ul>
            </div>

            <ul class="nav header-navbar-rht">
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">{{Auth::user()->name}}
                        <span><i class="fa fa-gear"></i></span></a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ route('login') }}"><span><i
                                class="fa-regular fa-user"></i></span>Se connecter</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link header-reg" href="{{route('register')}}"><span><i
                                class="fa-solid fa-lock"></i></span>S'incrire</a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
        </nav>
    </div>
</header>