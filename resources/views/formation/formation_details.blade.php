@extends('layouts.template')

@section('content')

<div class="blogbanner">
    <div class="blogbanner-content">
        <span class="blog-hint">Transport</span><br> <span class="blog-hint">@if($formationShow->moyen_diffusion == 'presentiel/ligne') Présentiel / En ligne @elseif($formationShow->moyen_diffusion == 'presentiel') Présentiel @else En ligne @endif</span>
        <h1>{{$formationShow->theme}}</h1>
        <ul class="entry-meta meta-item justify-content-center">
            <li>
                <div class="post-author">
                    <a href="javascript:void(0)"><span> <i class="fa-solid fa-usd"></i> Coût : {{$formationShow->montant}} FCFA </span></a>
                </div>
            </li>
            <li class="date-icon"><i class="fa-solid fa-calendar-days"></i> Date de formation : {{$formationShow->date_formation}}</li>
            <li class="date-icon"><i class="fa-solid fa-clock"></i> Heure début : {{$formationShow->heure_debut}}</li>
            <li class="date-icon"><i class="fa-solid fa-clock"></i> Heure fin : {{$formationShow->heure_fin}}</li>
            <li class="date-icon"><i class="fa-solid fa-universal-access"></i> Nombre de place : {{$nb_place_restant}}</li>
        </ul>
    </div>
</div>

<div class="blog-section">
    <div class="container">
        <h4 class="mb-4">Description :</h4>
        <blockquote class="">
            {!! html_entity_decode($formationShow->description) !!}
        </blockquote>
        <div class="share-postsection">
            <div class="row">
                <div class="col-lg-4">
                    <div class="sharelink d-flex align-items-center">
                        <a href="#modal-user" data-bs-toggle="modal" class="share-img"><i class="fas fa-cart-arrow-down"></i></a>
                        <a href="#modal-user" data-bs-toggle="modal" class="share-text">Passer la commande</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tag-list">
                        <ul class="tags">
                            <li>Nom(s) et Prénom(s) formateur : {{$formationShow->nom_formateur}} {{$formationShow->prenom_formateur}} </li>
                            <!-- <li>Make </li>
                            <li>Transmission </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-user" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="form-header text-start mb-0">
                    <h4 class="mb-0 text-dark fw-bold">Confirmer votre commande</h4>
                </div>
            </div>
            <form action="{{route('passer.commande.formation')}}" method="get">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                        <label for="" class="">Choisir le type de cours :</label>
                            <div class="available-for-ride">
                                <select name="moyen_diffusion" class="form-control" id="">
                                    <option value="presentiel">Présentiel</option>
                                    <option value="ligne">En ligne</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                        <label for="" class="">Entrer le nombre de place :</label>
                            <div class="available-for-ride">  
                                <input type="number" class="form-control" name="nb_place_commande" id="">
                                <input type="hidden" name="formation_id" value="{{$formationShow->id}}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection