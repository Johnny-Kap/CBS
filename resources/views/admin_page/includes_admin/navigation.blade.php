<div id="page-wrapper">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><strong>CBS</strong>Admin</h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie10"></div>
        </div>
    </div>
    <!-- END Preloader -->

    <!-- Page Container -->
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
                Available #page-container classes:

                '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

                'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
                'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
                'sidebar-mini sidebar-visible-lg-mini'          for a mini main sidebar with a flyout menu, enabled by default (> 991px + Best with static layout)
                'sidebar-mini sidebar-visible-lg'               for a mini main sidebar with a flyout menu, disabled by default (> 991px + Best with static layout)

                'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
                'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
                'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

                'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

                'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

                'style-alt'                                     for an alternative main style (without it: the default style)
                'footer-fixed'                                  for a fixed footer (without it: a static footer)

                'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

                'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
                'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar

                'enable-cookies'                                enables cookies for remembering active color theme when changed from the sidebar links
            -->
    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
        <!-- Alternative Sidebar -->

        <!-- END Alternative Sidebar -->

        <!-- Main Sidebar -->
        <div id="sidebar">
            <!-- Wrapper for scrolling functionality -->
            <div id="sidebar-scroll">
                <!-- Sidebar Content -->
                <div class="sidebar-content">
                    <!-- Brand -->
                    <a href="{{url('/admin/home')}}" class="sidebar-brand">
                        <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>CBS </strong>Admin</span>
                    </a>
                    <!-- END Brand -->

                    <!-- User Info -->
                    <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                        <div class="sidebar-user-avatar">
                            <a href="page_ready_user_profile.html">
                                <img src="/../assets_admin/img/placeholders/avatars/avatar2.jpg" alt="avatar">
                            </a>
                        </div>
                        <div class="sidebar-user-name">{{Auth::user()->name}} {{Auth::user()->prenom}}</div>
                        <div class="sidebar-user-links">
                            <a href="{{route('admin.profile')}}" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                            <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();    
                                        document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom" title="Deconnexion"><i class="gi gi-exit"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    <!-- END User Info -->

                    <!-- Sidebar Navigation -->
                    <ul class="sidebar-nav">
                        <li class="">
                            <a href="{{route('home.admin')}}" class="{{ Request::route()->named('home.admin') ? 'active' : '' }}"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                        </li>
                        <!-- <li>
                            <a href="index2.html"><i class="gi gi-leaf sidebar-nav-icon"></i><span
                                    class="sidebar-nav-mini-hide">Dashboard 2</span></a>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu"><i
                                    class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                                    class="gi gi-shopping_cart sidebar-nav-icon"></i><span
                                    class="sidebar-nav-mini-hide">eCommerce</span></a>
                            <ul>
                                <li>
                                    <a href="page_ecom_dashboard.html">Dashboard</a>
                                </li>
                                <li>
                                    <a href="page_ecom_orders.html">Orders</a>
                                </li>
                                <li>
                                    <a href="page_ecom_order_view.html">Order View</a>
                                </li>
                                <li>
                                    <a href="page_ecom_products.html">Products</a>
                                </li>
                                <li>
                                    <a href="page_ecom_product_edit.html">Product Edit</a>
                                </li>
                                <li>
                                    <a href="page_ecom_customer_view.html">Customer View</a>
                                </li>
                            </ul>
                        </li> -->
                        <!-- <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)"
                                    data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a><a
                                    href="javascript:void(0)" data-toggle="tooltip"
                                    title="Create the most amazing pages with the widget kit!"><i
                                        class="gi gi-lightbulb"></i></a></span>
                            <span class="sidebar-header-title">Widget Kit</span>
                        </li>
                        <li>
                            <a href="page_widgets_stats.html"><i class="gi gi-charts sidebar-nav-icon"></i><span
                                    class="sidebar-nav-mini-hide">Statistics</span></a>
                        </li>
                        <li>
                            <a href="page_widgets_social.html"><i class="gi gi-share_alt sidebar-nav-icon"></i><span
                                    class="sidebar-nav-mini-hide">Social</span></a>
                        </li>
                        <li>
                            <a href="page_widgets_media.html"><i class="gi gi-film sidebar-nav-icon"></i><span
                                    class="sidebar-nav-mini-hide">Media</span></a>
                        </li>
                        <li>
                            <a href="page_widgets_links.html"><i class="gi gi-link sidebar-nav-icon"></i><span
                                    class="sidebar-nav-mini-hide">Links</span></a>
                        </li> -->
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Véhicules</span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('type_vehicule.ajouter') || Request::route()->named('type_vehicule.consulter') || Request::route()->named('marque.ajouter') || Request::route()->named('marque.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Catégorie véhicule</span></a>
                            <ul>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu {{ Request::route()->named('type_vehicule.ajouter') || Request::route()->named('type_vehicule.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Type de véhicule</a>
                                    <ul>
                                        <li>
                                            <a class="{{ Request::route()->named('type_vehicule.ajouter') ? 'active' : '' }}" href="{{route('type_vehicule.ajouter')}}">Ajouter</a>
                                        </li>
                                        <li>
                                            <a class="{{ Request::route()->named('type_vehicule.consulter') ? 'active' : '' }}" href="{{route('type_vehicule.consulter')}}">Consulter</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu {{ Request::route()->named('marque.ajouter') || Request::route()->named('marque.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Marque véhicule</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('marque.ajouter')}}">Ajouter</a>
                                        </li>
                                        <li>
                                            <a href="{{route('marque.consulter')}}">Consulter</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('vehicule.ajouter') || Request::route()->named('vehicule.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Véhicules</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('vehicule.ajouter') ? 'active' : '' }}" href="{{route('vehicule.ajouter')}}">Ajouter</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('vehicule.consulter') ? 'active' : '' }}" href="{{route('vehicule.consulter')}}">Consulter</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('location.ajouter') || Request::route()->named('location.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Location</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('location.ajouter') ? 'active' : '' }}" href="{{route('location.ajouter')}}">Ajouter</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('location.consulter') ? 'active' : '' }}" href="{{route('location.consulter')}}">Consulter</a>
                                </li>
                                <!-- <li>
                                    <a href="page_tables_datatables.html">Recap commande</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Moyen paiement </span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('mode_paiement.ajouter') || Request::route()->named('mode_paiement.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Mode de paiement</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('mode_paiement.ajouter') ? 'active' : '' }}" href="{{route('mode_paiement.ajouter')}}">Ajouter mode de paiement</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('mode_paiement.consulter') ? 'active' : '' }}" href="{{route('mode_paiement.consulter')}}">Consulter mode de paiement</a>
                                </li>
                                <!-- <li>
                                    <a href="page_icons_glyphicons_pro.html">Glyphicons Pro</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Formation </span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('admin.formation.ajouter') || Request::route()->named('admin.formation.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Formation</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('admin.formation.ajouter') ? 'active' : '' }}" href="{{route('admin.formation.ajouter')}}">Ajouter</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('admin.formation.consulter') ? 'active' : '' }}" href="{{route('admin.formation.consulter')}}">Consulter</a>
                                </li>
                                <!-- <li>
                                    <a href="page_tables_datatables.html">Recap commande</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Commandes </span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('commande_formation.validation_paiement') || Request::route()->named('commande_formation.paiement_non_soumis') || Request::route()->named('commande_formation.commande_confirmees') || Request::route()->named('expression.besoin.attente') || Request::route()->named('expression.besoin.commande_paiement_non_soumis') || Request::route()->named('expression.besoin.validation_paiement') || Request::route()->named('expression.besoin.commande_confirmees') || Request::route()->named('expression.besoin.annulee') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Comm. formation</span></a>
                            <ul>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu {{ Request::route()->named('expression.besoin.attente') || Request::route()->named('expression.besoin.commande_paiement_non_soumis') || Request::route()->named('expression.besoin.validation_paiement') || Request::route()->named('expression.besoin.commande_confirmees') || Request::route()->named('expression.besoin.annulee') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Expression besoin forma.</a>
                                    <ul>
                                        <li>
                                            <a class="{{ Request::route()->named('expression.besoin.attente') ? 'active' : '' }}" href="{{route('expression.besoin.attente')}}">En attente</a>
                                        </li>
                                        <li>
                                            <a class="{{ Request::route()->named('expression.besoin.commande_paiement_non_soumis') ? 'active' : '' }}" href="{{route('expression.besoin.commande_paiement_non_soumis')}}">Paiement non soumis</a>
                                        </li>
                                        <li>
                                            <a class="{{ Request::route()->named('expression.besoin.validation_paiement') ? 'active' : '' }}" href="{{route('expression.besoin.validation_paiement')}}">Validation paiement</a>
                                        </li>
                                        <li>
                                            <a class="{{ Request::route()->named('expression.besoin.commande_confirmees') ? 'active' : '' }}" href="{{route('expression.besoin.commande_confirmees')}}">Confirmées</a>
                                        </li>
                                        <li>
                                            <a class="{{ Request::route()->named('expression.besoin.annulee') ? 'active' : '' }}" href="{{route('expression.besoin.annulee')}}">Annulée</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_formation.paiement_non_soumis') ? 'active' : '' }}" href="{{route('commande_formation.paiement_non_soumis')}}">Paiement non soumis</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_formation.validation_paiement') ? 'active' : '' }}" href="{{route('commande_formation.validation_paiement')}}">Validation paiement</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_formation.commande_confirmees') ? 'active' : '' }}" href="{{route('commande_formation.commande_confirmees')}}">Confirmées</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('commande_location.attente') || Request::route()->named('commande_location.commande_paiement_non_soumis') || Request::route()->named('commande_location.validation_paiement') || Request::route()->named('commande_location.commande_confirmees') || Request::route()->named('commande_location.annulee') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Commande location</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('commande_location.attente') ? 'active' : '' }}" href="{{route('commande_location.attente')}}">En attente</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_location.commande_paiement_non_soumis') ? 'active' : '' }}" href="{{route('commande_location.commande_paiement_non_soumis')}}">Paiement non soumis</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_location.validation_paiement') ? 'active' : '' }}" href="{{route('commande_location.validation_paiement')}}">Validation paiement</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_location.commande_confirmees') ? 'active' : '' }}" href="{{route('commande_location.commande_confirmees')}}">Confirmées</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_location.annulee') ? 'active' : '' }}" href="{{route('commande_location.annulee')}}">Annulées</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('commande_maintenance.attente') || Request::route()->named('commande_maintenance.paiement_non_soumis') || Request::route()->named('commande_maintenance.validation_paiement') || Request::route()->named('commande_maintenance.commande_confirmees') || Request::route()->named('commande_maintenance.annulee') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Comm. maintenance</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('commande_maintenance.attente') ? 'active' : '' }}" href="{{route('commande_maintenance.attente')}}">En attente</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_maintenance.paiement_non_soumis') ? 'active' : '' }}" href="{{route('commande_maintenance.paiement_non_soumis')}}">Paiement non soumis</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_maintenance.validation_paiement') ? 'active' : '' }}" href="{{route('commande_maintenance.validation_paiement')}}">Validation paiement</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_maintenance.commande_confirmees') ? 'active' : '' }}" href="{{route('commande_maintenance.commande_confirmees')}}">Confirmées</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_maintenance.annulee') ? 'active' : '' }}" href="{{route('commande_maintenance.annulee')}}">Annulées</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Autres services </span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('commande_reservation.attente') || Request::route()->named('commande_reservation.commande_validee') || Request::route()->named('commande_reservation.annulee') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Réser. hôtel/Appart</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('commande_reservation.attente') ? 'active' : '' }}" href="{{route('commande_reservation.attente')}}">En attente</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_reservation.commande_validee') ? 'active' : '' }}" href="{{route('commande_reservation.commande_validee')}}">Validées</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('commande_reservation.annulee') ? 'active' : '' }}" href="{{route('commande_reservation.annulee')}}">Annulés</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('achat_livraison.attente') || Request::route()->named('achat_livraison.paiement_non_soumis') || Request::route()->named('achat_livraison.validation_paiement') || Request::route()->named('achat_livraison.confirmees') || Request::route()->named('livraison.attente') || Request::route()->named('livraison.validee') || Request::route()->named('livraison.annulee') || Request::route()->named('achat_livraison.annulee') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Livraison panier</span></a>
                            <ul>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu {{ Request::route()->named('achat_livraison.attente') || Request::route()->named('achat_livraison.paiement_non_soumis') || Request::route()->named('achat_livraison.validation_paiement') || Request::route()->named('achat_livraison.confirmees') || Request::route()->named('achat_livraison.annulee') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Achat et livraison</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('achat_livraison.attente')}}">En attente</a>
                                        </li>
                                        <li>
                                            <a href="{{route('achat_livraison.paiement_non_soumis')}}">Paiement non soumis</a>
                                        </li>
                                        <li>
                                            <a href="{{route('achat_livraison.validation_paiement')}}">Validation paiement</a>
                                        </li>
                                        <li>
                                            <a href="{{route('achat_livraison.confirmees')}}">Confirmées</a>
                                        </li>
                                        <li>
                                            <a href="{{route('achat_livraison.annulee')}}">Annulées</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu {{ Request::route()->named('livraison.attente') || Request::route()->named('livraison.validee') || Request::route()->named('livraison.annulee') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator"></i>Livraison</a>
                                    <ul>
                                        <li>
                                            <a href="{{route('livraison.attente')}}">En attente</a>
                                        </li>
                                        <li>
                                            <a href="{{route('livraison.validee')}}">Validées</a>
                                        </li>
                                        <li>
                                            <a href="{{route('livraison.annulee')}}">Annulées</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Abonnement </span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('type_abonnement.ajouter') || Request::route()->named('type_abonnement.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Type d'abonnement</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('type_abonnement.ajouter') ? 'active' : '' }}" href="{{route('type_abonnement.ajouter')}}">Ajouter</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('type_abonnement.consulter') ? 'active' : '' }}" href="{{route('type_abonnement.consulter')}}">Consulter</a>
                                </li>
                                <!-- <li>
                                    <a href="page_icons_glyphicons_pro.html">Glyphicons Pro</a>
                                </li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('abonnement.ajouter') || Request::route()->named('abonnement.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Abonnements</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('abonnement.ajouter') ? 'active' : '' }}" href="{{route('abonnement.ajouter')}}">Ajouter</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('abonnement.consulter') ? 'active' : '' }}" href="{{route('abonnement.consulter')}}">Consulter</a>
                                </li>
                                <!-- <li>
                                    <a href="page_icons_glyphicons_pro.html">Glyphicons Pro</a>
                                </li> -->
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('abonnement.attente') || Request::route()->named('abonnement.confirmes') || Request::route()->named('abonnement.attente.paiement') || Request::route()->named('abonnement.expires') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Sous. Abonnements</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('abonnement.formulaire') ? 'active' : '' }}" href="{{route('abonnement.formulaire')}}">Créer un sous. abonnement</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('abonnement.attente.paiement') ? 'active' : '' }}" href="{{route('abonnement.attente.paiement')}}">Paiement non soumis</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('abonnement.attente') ? 'active' : '' }}" href="{{route('abonnement.attente')}}">En attente de validation</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('abonnement.confirmes') ? 'active' : '' }}" href="{{route('abonnement.confirmes')}}">Confirmés</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('abonnement.expires') ? 'active' : '' }}" href="{{route('abonnement.expires')}}">Expirés</a>
                                </li>
                                <!-- <li>
                                    <a href="page_icons_glyphicons_pro.html">Glyphicons Pro</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Bibliothèque </span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('admin.bibliotheque.ajouter') || Request::route()->named('admin.bibliotheque.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Bibliothèque</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('admin.bibliotheque.ajouter') ? 'active' : '' }}" href="{{route('admin.bibliotheque.ajouter')}}">Ajouter doc.</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('admin.bibliotheque.consulter') ? 'active' : '' }}" href="{{route('admin.bibliotheque.consulter')}}">Consulter doc.</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Facturation </span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('facture.commande_location.consulter') 
                                || Request::route()->named('facture.commande_formation.consulter') 
                                || Request::route()->named('facture.expression_besoin_formation.consulter') 
                                || Request::route()->named('facture.commande_maintenance.consulter') 
                                || Request::route()->named('facture.commande_reservation_appart_hotel.consulter')
                                || Request::route()->named('facture.commande_achat_livraison_panier.consulter')
                                || Request::route()->named('facture.commande_livraison_panier.consulter') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Facturation</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('facture.commande_location.consulter') ? 'active' : '' }}" href="{{route('facture.commande_location.consulter')}}">Comm. location</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('facture.commande_formation.consulter') ? 'active' : '' }}" href="{{route('facture.commande_formation.consulter')}}">Comm. formation</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('facture.expression_besoin_formation.consulter') ? 'active' : '' }}" href="{{route('facture.expression_besoin_formation.consulter')}}">Comm. expression formation</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('facture.commande_maintenance.consulter') ? 'active' : '' }}" href="{{route('facture.commande_maintenance.consulter')}}">Comm. maintenance</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('facture.commande_reservation_appart_hotel.consulter') ? 'active' : '' }}" href="{{route('facture.commande_reservation_appart_hotel.consulter')}}">Comm. réservation</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('facture.commande_achat_livraison_panier.consulter') ? 'active' : '' }}" href="{{route('facture.commande_achat_livraison_panier.consulter')}}">Comm. achat et livraison</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('facture.commande_livraison_panier.consulter') ? 'active' : '' }}" href="{{route('facture.commande_livraison_panier.consulter')}}">Comm. livraison</a>
                                </li>
                                <!-- <li>
                                    <a class="{{ Request::route()->named('facture.souscription_abonnement.consulter') ? 'active' : '' }}" href="{{route('facture.souscription_abonnement.consulter')}}">Sous. abonnement</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Autres config</span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu {{ Request::route()->named('utilisateurs.create') || Request::route()->named('utilisateurs.show') ? 'active' : '' }}"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-show_big_thumbnails sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Utilisateurs</span></a>
                            <ul>
                                <li>
                                    <a class="{{ Request::route()->named('utilisateurs.create') ? 'active' : '' }}" href="{{route('utilisateurs.create')}}">Ajouter</a>
                                </li>
                                <li>
                                    <a class="{{ Request::route()->named('utilisateurs.show') ? 'active' : '' }}" href="{{route('utilisateurs.show')}}">Consulter</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="sidebar-header">
                            <span class="sidebar-header-options clearfix"><a href="javascript:void(0)"
                                    data-toggle="tooltip" title="Quick Settings"><i
                                        class="gi gi-settings"></i></a></span>
                            <span class="sidebar-header-title">Develop Kit</span>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu"><i
                                    class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                                    class="gi gi-brush sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Ready
                                    Pages</span></a>
                            <ul>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu"><i
                                            class="fa fa-angle-left sidebar-nav-indicator"></i>Errors</a>
                                    <ul>
                                        <li>
                                            <a href="page_ready_400.html">400</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_401.html">401</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_403.html">403</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_404.html">404</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_500.html">500</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_503.html">503</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu"><i
                                            class="fa fa-angle-left sidebar-nav-indicator"></i>Get Started</a>
                                    <ul>
                                        <li>
                                            <a href="page_ready_blank.html">Blank</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_blank_alt.html">Blank Alternative</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="page_ready_search_results.html">Search Results (4)</a>
                                </li>
                                <li>
                                    <a href="page_ready_article.html">Article</a>
                                </li>
                                <li>
                                    <a href="page_ready_user_profile.html">User Profile</a>
                                </li>
                                <li>
                                    <a href="page_ready_contacts.html">Contacts</a>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu"><i
                                            class="fa fa-angle-left sidebar-nav-indicator"></i>e-Learning</a>
                                    <ul>
                                        <li>
                                            <a href="page_ready_elearning_courses.html">Courses</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_elearning_course_lessons.html">Course - Lessons</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_elearning_course_lesson.html">Course - Lesson
                                                Page</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu"><i
                                            class="fa fa-angle-left sidebar-nav-indicator"></i>Message Center</a>
                                    <ul>
                                        <li>
                                            <a href="page_ready_inbox.html">Inbox</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_inbox_compose.html">Compose Message</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_inbox_message.html">View Message</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="page_ready_chat.html">Chat</a>
                                </li>
                                <li>
                                    <a href="page_ready_timeline.html">Timeline</a>
                                </li>
                                <li>
                                    <a href="page_ready_files.html">Files</a>
                                </li>
                                <li>
                                    <a href="page_ready_tickets.html">Tickets</a>
                                </li>
                                <li>
                                    <a href="page_ready_bug_tracker.html">Bug Tracker</a>
                                </li>
                                <li>
                                    <a href="page_ready_tasks.html">Tasks</a>
                                </li>
                                <li>
                                    <a href="page_ready_faq.html">FAQ</a>
                                </li>
                                <li>
                                    <a href="page_ready_pricing_tables.html">Pricing Tables</a>
                                </li>
                                <li>
                                    <a href="page_ready_invoice.html">Invoice</a>
                                </li>
                                <li>
                                    <a href="page_ready_forum.html">Forum (3)</a>
                                </li>
                                <li>
                                    <a href="page_ready_coming_soon.html">Coming Soon</a>
                                </li>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu"><i
                                            class="fa fa-angle-left sidebar-nav-indicator"></i>Login, Register &amp;
                                        Lock</a>
                                    <ul>
                                        <li>
                                            <a href="login.html">Login</a>
                                        </li>
                                        <li>
                                            <a href="login_full.html">Login (Full Background)</a>
                                        </li>
                                        <li>
                                            <a href="login_alt.html">Login 2</a>
                                        </li>
                                        <li>
                                            <a href="login.html#reminder">Password Reminder</a>
                                        </li>
                                        <li>
                                            <a href="login_alt.html#reminder">Password Reminder 2</a>
                                        </li>
                                        <li>
                                            <a href="login.html#register">Register</a>
                                        </li>
                                        <li>
                                            <a href="login_alt.html#register">Register 2</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_lock_screen.html">Lock Screen</a>
                                        </li>
                                        <li>
                                            <a href="page_ready_lock_screen_alt.html">Lock Screen 2</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="sidebar-nav-menu"><i
                                    class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                                    class="fa fa-wrench sidebar-nav-icon"></i><span
                                    class="sidebar-nav-mini-hide">Components</span></a>
                            <ul>
                                <li>
                                    <a href="#" class="sidebar-nav-submenu"><i
                                            class="fa fa-angle-left sidebar-nav-indicator"></i>3 Level Menu</a>
                                    <ul>
                                        <li>
                                            <a href="#">Link 1</a>
                                        </li>
                                        <li>
                                            <a href="#">Link 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="page_comp_maps.html">Maps</a>
                                </li>
                                <li>
                                    <a href="page_comp_charts.html">Charts</a>
                                </li>
                                <li>
                                    <a href="page_comp_gallery.html">Gallery</a>
                                </li>
                                <li>
                                    <a href="page_comp_carousel.html">Carousel</a>
                                </li>
                                <li>
                                    <a href="page_comp_calendar.html">Calendar</a>
                                </li>
                                <li>
                                    <a href="page_comp_animations.html">CSS3 Animations</a>
                                </li>
                                <li>
                                    <a href="page_comp_syntax_highlighting.html">Syntax Highlighting</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                    <!-- END Sidebar Navigation -->

                    <!-- Sidebar Notifications -->
                    <!-- <div class="sidebar-header sidebar-nav-mini-hide">
                        <span class="sidebar-header-options clearfix">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i
                                    class="gi gi-refresh"></i></a>
                        </span>
                        <span class="sidebar-header-title">Activity</span>
                    </div>
                    <div class="sidebar-section sidebar-nav-mini-hide">
                        <div class="alert alert-success alert-alt">
                            <small>5 min ago</small><br>
                            <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                        </div>
                        <div class="alert alert-info alert-alt">
                            <small>10 min ago</small><br>
                            <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                        </div>
                        <div class="alert alert-warning alert-alt">
                            <small>3 hours ago</small><br>
                            <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in
                                use</strong> 2GB left
                        </div>
                        <div class="alert alert-danger alert-alt">
                            <small>Yesterday</small><br>
                            <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)"><strong>New bug
                                    submitted</strong></a>
                        </div>
                    </div> -->
                    <!-- END Sidebar Notifications -->
                </div>
                <!-- END Sidebar Content -->
            </div>
            <!-- END Wrapper for scrolling functionality -->
        </div>
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">
            <!-- Header -->
            <!-- In the PHP version you can set the following options from inc/config file -->
            <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
            <header class="navbar navbar-default">
                <!-- Left Header Navigation -->
                <ul class="nav navbar-nav-custom">
                    <!-- Main Sidebar Toggle Button -->
                    <li>
                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                            <i class="fa fa-bars fa-fw"></i>
                        </a>
                    </li>
                    <!-- END Main Sidebar Toggle Button -->

                    <!-- Template Options -->
                    <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="gi gi-settings"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-options">
                            <li class="dropdown-header text-center">Header Style</li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                                </div>
                            </li>
                            <li class="dropdown-header text-center">Page Style</li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- END Template Options -->
                </ul>
                <!-- END Left Header Navigation -->

                <!-- Search Form -->
                <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
                    <div class="form-group">
                        <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                    </div>
                </form>
                <!-- END Search Form -->

                <!-- Right Header Navigation -->
                <ul class="nav navbar-nav-custom pull-right">
                    <!-- User Dropdown -->
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/../assets_admin/img/placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                            <li class="dropdown-header text-center">Account</li>
                            <li>
                                <!-- <a href="page_ready_timeline.html">
                                    <i class="fa fa-clock-o fa-fw pull-right"></i>
                                    <span class="badge pull-right">10</span>
                                    Updates
                                </a> -->
                                <a href="page_ready_inbox.html">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                    <span class="badge pull-right">5</span>
                                    Messages
                                </a>
                                <!-- <a href="page_ready_pricing_tables.html"><i class="fa fa-magnet fa-fw pull-right"></i>
                                    <span class="badge pull-right">3</span>
                                    Subscriptions
                                </a>
                                <a href="page_ready_faq.html"><i class="fa fa-question fa-fw pull-right"></i>
                                    <span class="badge pull-right">11</span>
                                    FAQ
                                </a> -->
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="page_ready_user_profile.html">
                                    <i class="fa fa-user fa-fw pull-right"></i>
                                    Profile
                                </a>
                                <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                <a href="#modal-user-settings" data-toggle="modal">
                                    <i class="fa fa-cog fa-fw pull-right"></i>
                                    Settings
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="page_ready_lock_screen.html"><i class="fa fa-lock fa-fw pull-right"></i>
                                    Lock Account</a>
                                <a href="login.html"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                            </li>
                            <!-- <li class="dropdown-header text-center">Activity</li>
                            <li>
                                <div class="alert alert-success alert-alt">
                                    <small>5 min ago</small><br>
                                    <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                                </div>
                                <div class="alert alert-info alert-alt">
                                    <small>10 min ago</small><br>
                                    <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                                </div>
                                <div class="alert alert-warning alert-alt">
                                    <small>3 hours ago</small><br>
                                    <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in
                                        use</strong> 2GB left
                                </div>
                                <div class="alert alert-danger alert-alt">
                                    <small>Yesterday</small><br>
                                    <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">New
                                        bug submitted</a>
                                </div>
                            </li> -->
                        </ul>
                    </li>
                    <!-- END User Dropdown -->
                </ul>
                <!-- END Right Header Navigation -->
            </header>
            <!-- END Header -->