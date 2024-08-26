@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Formations</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Blogs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Grid</li>
                    </ol> -->
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="blog-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach($formations_list as $item)
                    <div class="col-lg-6 col-md-6 d-lg-flex">
                        <div class="blog grid-blog">
                            <!-- <div class="blog-image">
                                <a href="blog-details.html"><img class="img-fluid" src="assets/img/blog/blog-1.jpg" alt="Post Image"></a>
                            </div> -->
                            <div class="blog-content">
                                <p class="blog-category">
                                    <a href="javascript:void(0)"><span>Transport</span></a>
                                </p>
                                <p class="blog-category">
                                    <a href="javascript:void(0)"><span>@if($item->moyen_diffusion == 'presentiel/ligne') Présentiel / En ligne @elseif($item->moyen_diffusion == 'presentiel') Présentiel @else En ligne @endif</span></a>
                                    @if($item->lieu != null) <a href="javascript:void(0)"><span>Lieu : {{$item->lieu}}</span></a> @endif
                                </p>
                                <h3 class="blog-title"><a href="{{ route('formation.details', ['id' => $item->id, 'name' => str_slug($item->theme)]) }}">{{$item->theme}}</a></h3>
                                <p class="blog-description">{!! html_entity_decode( str_limit($item->description, 300)) !!}</p>
                                <ul class="meta-item">
                                    <li>
                                        <div class="post-author">
                                            <!-- <div class="post-author-img">
                                                <img src="assets/img/profiles/avatar-13.jpg" alt="author">
                                            </div> -->
                                            <a href="javascript:void(0)"> <span> Formateur : {{$item->nom_formateur}} {{$item->prenom_formateur}} </span></a>
                                        </div>
                                    </li>
                                    <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> <span>{{$item->date_formation}}</span></li>
                                </ul>
                                <a href="{{ route('formation.details', ['id' => $item->id, 'name' => str_slug($item->theme)]) }}" class="viewlink btn btn-primary">Voir plus <i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="pagination">
                    {{ $formations_list->links() }}
                </div>

            </div>
            <div class="col-lg-4 theiaStickySidebar">
                <div class="rightsidebar">
                    <!-- <div class="card">
                        <h4><img src="assets/img/icons/details-icon.svg" alt="details-icon"> Filter</h4>
                        <div class="filter-content looking-input form-group mb-0">
                            <input type="text" class="form-control" placeholder="Pour la recherche, tapez et appuyez sur Entrée">
                        </div>
                    </div> -->
                    <div class="card">
                        <h4><img src="assets/img/icons/category-icon.svg" alt="details-icon"> Expréssion de besoin de formation</h4>
                        <span for="">Voulez-vous commander une formation selon votre choix ?</span>
                        <a href="{{route('besoin.formation.create')}}">Cliquez ici</a>
                    </div>
                    <!-- <div class="card tags-widget">
                        <h4><i class="feather-tag"></i> Tags</h4>
                        <ul class="tags">
                            <li>Air </li>
                            <li>Engine </li>
                            <li>Item </li>
                            <li>On Road </li>
                            <li>Rims </li>
                            <li>Speed </li>
                            <li>Make </li>
                            <li>Transmission </li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection