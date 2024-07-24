@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- eCommerce Dashboard Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li>
                <a href="{{route('admin.dashboard.ca_location')}}"><i class="fa fa-bar-chart"></i> Location véhicule</a>
            </li>
            <li>
                <a href="{{route('admin.dashboard.ca_maintenance')}}"><i class="gi gi-shop_window"></i> Maintenance automobile</a>
            </li>
            <li>
                <a href="{{route('admin.dashboard.ca_formation')}}"><i class="gi gi-shopping_cart"></i> Formation</a>
            </li>
            <li>
                <a href="{{route('admin.dashboard.ca_expression_besoin_formation')}}"><i class="gi gi-shopping_bag"></i> Expression besoin formation</a>
            </li>
            <li>
                <a href="{{route('admin.dashboard.ca_achat_livraison')}}"><i class="gi gi-pencil"></i> Panier alimentaire (Achat et livraison)</a>
            </li>
            <li>
                <a href="{{route('admin.dashboard.ca_livraison')}}"><i class="gi gi-user"></i> Panier alimentaire (Livraison)</a>
            </li>
            <li class="active">
                <a href="{{route('admin.dashboard.ca_assistance_reservation')}}"><i class="gi gi-user"></i> Assistance reservation hotel / Appart.</a>
            </li>
        </ul>
    </div>
    <!-- END eCommerce Dashboard Header -->

    <!-- Quick Stats -->
    <div class="row text-center">
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background">
                    <h4 class="widget-content-light"><strong>Commandes</strong> en cours</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 animation-expandOpen">{{$commande_en_cours}}</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Commandes</strong> d'aujourd'hui</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$commande_today}}</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Clients</strong></h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$clients}}</span></div>
            </a>
        </div>
        <div class="col-sm-6 col-lg-3">
            <a href="javascript:void(0)" class="widget widget-hover-effect2">
                <div class="widget-extra themed-background-dark">
                    <h4 class="widget-content-light"><strong>Commandes</strong> totales</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$commande_total}}</span></div>
            </a>
        </div>
    </div>
    <!-- END Quick Stats -->
</div>

@endsection