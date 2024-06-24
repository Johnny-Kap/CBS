@extends('admin_page.layouts_admin.admin')

@section('content')

<div id="page-content">
    <!-- User Profile Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            @if(Auth::user()->image == null)
            <img src="/../assets_admin/img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="pull-right img-circle">
            @else
            <img src="{{ Storage::url(Auth::user()->image) }}" style="width: 110px; height:90px; border-radius : 50%;" alt="Avatar" class="pull-right img-circle">
            @endif
            <h1>Administrateur <br><small>CBS</small></h1>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        <img src="/../assets_admin/img/placeholders/headers/profile_header.jpg" alt="header image" class="animation-pulseSlow">
    </div>
    <!-- END User Profile Header -->

    <!-- User Profile Content -->
    <div class="row">
        <!-- Second Column -->
        <div class="col-md-12 col-lg-12">
            <!-- Info Block -->
            <div class="block">
                <!-- Info Title -->
                <div class="block-title">
                    <!-- <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Friend Request"><i class="fa fa-plus"></i></a>
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Hire"><i class="fa fa-briefcase"></i></a>
                    </div> -->
                    <h2>A propos de Moi <strong>({{Auth::user()->name}} {{Auth::user()->prenom}})</h2>
                </div>
                <!-- END Info Title -->

                <!-- Info Content -->
                <table class="table table-borderless table-striped">
                    <tbody>
                        <tr>
                            <td style="width: 20%;"><strong>Nom(s) </strong></td>
                            <td>{{Auth::user()->name}}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Prénom(s) </strong></td>
                            <td>@if(Auth::user()->prenom == null) Non renseigné @else {{Auth::user()->prenom}} @endif</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Email </strong></td>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Date de naissance </strong></td>
                            <td>@if(Auth::user()->date_naiss == null) Non renseigné @else {{Auth::user()->date_naiss}} @endif</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Biographie </strong></td>
                            <td>@if(Auth::user()->bio == null) Non renseigné @else {{Auth::user()->bio}} @endif</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Profession </strong></td>
                            <td>{{Auth::user()->profession}}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Téléphone </strong></td>
                            <td>{{Auth::user()->tel}}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Zone de résidence </strong></td>
                            <td>
                                @if(Auth::user()->residence == 'cameroun')
                                Résidant au Cameroun
                                @elseif(Auth::user()->residence == 'etranger_cameroun')
                                Etranger résidant au Cameroun
                                @else
                                Hors du Cameroun
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Adresse </strong></td>
                            <td>{{Auth::user()->adresse}}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Ville </strong></td>
                            <td>{{Auth::user()->ville}}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Pays </strong></td>
                            <td>{{Auth::user()->pays}}</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>N° CNI </strong></td>
                            <td>@if(Auth::user()->numero_cni == null) Non renseigné @else {{Auth::user()->numero_cni}} @endif</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Date délivrance CNI </strong></td>
                            <td>@if(Auth::user()->date_delivrance_cni == null) Non renseigné @else {{Auth::user()->date_delivrance_cni}} @endif</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>N° Passport </strong></td>
                            <td>@if(Auth::user()->numero_passport == null) Non renseigné @else {{Auth::user()->numero_passport}} @endif</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Date délivrance Passport </strong></td>
                            <td>@if(Auth::user()->date_delivrance_passport == null) Non renseigné @else {{Auth::user()->date_delivrance_passport}} @endif</td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><strong>Rôle </strong></td>
                            <td>{{Auth::user()->role}}</td>
                        </tr>
                        <tr>
                            <td><strong>Email vérifié</strong></td>
                            <td>@if(Auth::user()->email_verified_at != null) <span class="label label-success">Vérifié</span> @else <span class="label label-danger">Non vérifié</span> @endif</td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Info Content -->
            </div>
            <!-- END Info Block -->
        </div>
        <!-- END Second Column -->
    </div>
    <!-- END User Profile Content -->
</div>

@endsection