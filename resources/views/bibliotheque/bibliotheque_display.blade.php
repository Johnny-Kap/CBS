@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">La bibliothèque </h2>
            </div>
        </div>
    </div>
</div>


<div class="section gallery-section">
    <div class="container">
        <div class="row">
            @foreach($bibliotheque_display as $item)
            <div class="col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-down">
                <div class="gallery-widget">
                    <p class="h3 text-center">{{$item->titre}}</p>
                    <label class="form-label align-center">{!! html_entity_decode($item->description) !!}</label>
                    <p><a class="align-center" href="{{Storage::url($item->pdf)}}">Télécharger ! (pdf)</a></p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="media-items animation-fadeInQuickInv" data-category="book">
                    <div class="media-items-options text-left">
                        <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                    </div>
                    <div class="media-items-content">
                        <i class="fi fi-pdf fa-5x text-warning"></i>
                    </div>
                    <h4>
                        <strong>HTML Tutorials</strong>.pdf<br>
                        <small>500 Pages | 6.2MB</small>
                    </h4>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection