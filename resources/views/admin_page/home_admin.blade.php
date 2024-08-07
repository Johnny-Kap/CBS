@extends('admin_page.layouts_admin.admin')

@section('content')

<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1>Bienvenue <strong>{{Auth::user()->name}} {{Auth::user()->prenom}}</strong><br><small>Ravi de vous voir!</small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <!-- <div class="col-md-8 col-lg-6">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                $<strong>93.7k</strong><br>
                                <small><i class="fa fa-thumbs-o-up"></i> Great</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong>167k</strong><br>
                                <small><i class="fa fa-heart-o"></i> Likes</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong>101</strong><br>
                                <small><i class="fa fa-calendar-o"></i> Events</small>
                            </h2>
                        </div>
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                                <strong>27&deg; C</strong><br>
                                <small><i class="fa fa-map-marker"></i> Cameroun</small>
                            </h2>
                        </div>
                    </div>
                </div> -->
                <!-- END Top Stats -->
            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="/../assets_admin/img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END Dashboard Header -->

    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-6">
            <!-- Widget -->
            <a href="{{route('admin.dashboard.clients')}}" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        <strong>Clients</strong><br>
                        <small>Consulter les</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-6">
            <!-- Widget -->
            <a href="{{route('admin.dashboard.ca_location')}}" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="gi gi-usd"></i>
                    </div>
                    <div class="pull-right">
                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                        <span id="mini-chart-sales"></span>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        <strong>Chiffres d'affaire</strong><br>
                        <small>Consulter les ventes</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-6">
            <!-- Widget -->
            <a href="#" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-envelope"></i>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        <strong>Messages</strong>
                        <small>Centre d'aide</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-6">
            <!-- Widget -->
            <a href="{{route('admin.dashboard.centre_controle')}}" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="gi gi-crown"></i>
                    </div>
                    <div class="pull-right">
                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                        <span id="mini-chart-brand"></span>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        Centre de <strong>controle</strong>
                        <small>Popularité sur le temps</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Mini Top Stats Row -->

    <!-- Widgets Row -->

    <!-- END Widgets Row -->


    @endsection