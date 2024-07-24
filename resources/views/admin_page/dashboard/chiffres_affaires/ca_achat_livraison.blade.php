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
            <li class="active">
                <a href="{{route('admin.dashboard.ca_achat_livraison')}}"><i class="gi gi-pencil"></i> Panier alimentaire (Achat et livraison)</a>
            </li>
            <li>
                <a href="{{route('admin.dashboard.ca_livraison')}}"><i class="gi gi-user"></i> Panier alimentaire (Livraison)</a>
            </li>
            <li>
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
                    <h4 class="widget-content-light"><strong>Valeur</strong> commandes en cours</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$valeur_commande_en_cours}} FCFA</span></div>
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
                    <h4 class="widget-content-light"><strong>Résultats</strong> d'aujourd'hui</h4>
                </div>
                <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">{{$resultat_today}} FCFA</span></div>
            </a>
        </div>
    </div>
    <!-- END Quick Stats -->

    <!-- eShop Overview Block -->
    <div class="block full">
        <!-- eShop Overview Title -->
        <div class="block-title">
            <h2><strong>Informations</strong> supplémentaires</h2>
        </div>
        <!-- END eShop Overview Title -->

        <!-- eShop Overview Content -->
        <div class="row">
            <div class="col-md-12 col-lg-12">   
                <div class="row push">
                    <div class="col-xs-4 text-center">
                        <h3><strong class="animation-fadeInQuick">{{$commande_total}}</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Total des commandes</a></small></h3>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h3><strong class="animation-fadeInQuick">{{$clients}}</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Clients</a></small></h3>
                    </div>
                    <div class="col-xs-4 text-center">
                        <h3><strong class="animation-fadeInQuick">{{$chiffre_affaire}} FCFA</strong><br><small class="text-uppercase animation-fadeInQuickInv"><a href="javascript:void(0)">Chiffres d'affaires</a></small></h3>
                    </div>
                </div>
            </div>
        </div>
        <!-- END eShop Overview Content -->
    </div>
    <!-- END eShop Overview Block -->
</div>

@endsection