@extends('layouts.template')

@section('content')

<div class="breadcrumb-bar">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title">Résultat de la recherche des locations</h2>
                <!-- <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Listings</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Car Listings</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </div>
</div>


<section class="section car-listing">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-12 col-12 theiaStickySidebar">
                <form action="{{route('location.search')}}" method="get" class="sidebar-form">
                    <div class="sidebar-heading">
                        <h3>Rechercher</h3>
                    </div>
                    <div class="product-search">
                        <div class="form-custom">
                            <input type="text" class="form-control typeahead" name="search" id="member_search1">
                            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-search"></i> Rechercher</button>
                        </div>
                    </div>
                </form>
                <form method="get" action="{{route('location.filter')}}">
                    <div class="accordion" id="accordionMain1">
                        <div class="card-header-new" id="headingOne">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Marque
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
                            <div class="card-body-chat">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="checkBoxes1">
                                            <div class="selectBox-cont">
                                                @foreach($marques as $item)
                                                <label class="custom_check w-100">
                                                    <input type="radio" value="{{$item->id}}" name="marque">
                                                    <span class="checkmark"></span> {{$item->intitule}}
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion" id="accordionMain2">
                        <div class="card-header-new" id="headingTwo">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    Catégorie
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                            <div class="card-body-chat">
                                <div id="checkBoxes2">
                                    <div class="selectBox-cont">
                                        @foreach($type_vehicules as $item)
                                        <label class="custom_check w-100">
                                            <input type="radio" value="{{$item->id}}" name="categorie">
                                            <span class="checkmark"></span> {{$item->intitule}}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion" id="accordionMain4">
                        <div class="card-header-new" id="headingFour">
                            <h6 class="filter-title">
                                <a href="javascript:void(0);" class="w-100 collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Prix
                                    <span class="float-end"><i class="fa-solid fa-chevron-down"></i></span>
                                </a>
                            </h6>
                        </div>
                        <div id="collapseFour" class="collapse mb-2" aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                            <div class="card-body-chat">
                                <div class="filter-range">
                                    <span><i class="fa fa-info-circle"></i> Pour utiliser comme critère le prix, rensigner obligatoirement les deux champs.</span>
                                </div>
                                <span>Activer/Désactiver ces champs</span>
                                <label for="chkYes">
                                    <input type="checkbox" id="enableInputCheckbox" />

                                </label>
                            </div>
                        </div>
                        <div id="collapseFour" class="collapse mb-2" aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                            <div class="card-body-chat">
                                <div class="filter-range">
                                    <span>Prix inférieur</span>
                                    <input type="text" name="prix_inferieur" id="prix_inferieur" disabled class="input-range form-control">
                                </div>
                            </div>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample4">
                            <div class="card-body-chat">
                                <div class="filter-range">
                                    <span>Prix supérieur</span>
                                    <input type="text" id="prix_superieur" name="prix_superieur" disabled class="input-range form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="d-inline-flex align-items-center justify-content-center btn w-100 btn-primary filter-btn">
                        <span><i class="fas fa-filter me-2"></i></span>Filtrer
                    </button>
                    <a href class="reset-filter">Réinitialiser le filtre</a>
                </form>
            </div>
            <div class="col-xl-9 col-lg-8 col-sm-12 col-12">
                <div class="row">¨
                    @foreach($results as $item)
                    <div class="listview-car">
                        <div class="card">
                            <div class="blog-widget d-flex">
                                <div class="blog-img">
                                    <a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->intitule)]) }}">
                                        <img src="{{ Storage::url($item->vehicules->image_illustrative) }}" style="width: 20rem; height: 10rem;" class="img-fluid" alt="blog-img">
                                    </a>
                                </div>
                                <div class="bloglist-content w-100">
                                    <div class="card-body">
                                        <div class="blog-list-head d-flex">
                                            <div class="blog-list-title">
                                                <h3><a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->intitule)]) }}">{{$item->intitule}}</a>
                                                </h3>
                                                <h6>Type de véhicule : <span>{{$item->vehicules->type_vehicules->intitule}}</span></h6>
                                            </div>
                                            <div class="blog-list-rate">
                                                <!-- <div class="list-rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <span>(5.0)</span>
                                                </div> -->
                                                <h6>{{$item->tarif}} FCFA <span>/ jour</span></h6>
                                            </div>
                                        </div>
                                        <div class="listing-details-group">
                                            <ul>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-05.svg" alt="Auto"></span>
                                                    <p>{{$item->vehicules->transmission}}</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-02.svg" alt="10 KM"></span>
                                                    <p>{{$item->vehicules->nombre_kilometrage}}</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-03.svg" alt="Petrol"></span>
                                                    <p>{{$item->vehicules->type_moteur}}</p>
                                                </li>
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-04.svg" alt="Power"></span>
                                                    <p>{{$item->vehicules->modele}}</p>
                                                </li>
                                                <!-- <li>
                                                    <span><img src="assets/img/icons/car-parts-05.svg" alt="2018"></span>
                                                    <p>{{$item->vehicules->annee_fabrication}}</p>
                                                </li> -->
                                                <li>
                                                    <span><img src="assets/img/icons/car-parts-06.svg" alt="Persons"></span>
                                                    <p>{{$item->vehicules->nombre_portieres}} portières</p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="blog-list-head list-head-bottom d-flex">
                                            <div class="blog-list-title">
                                                <div class="title-bottom">
                                                    <!-- <div class="car-list-icon">
                                                        <img src="assets/img/cars/car-list-icon-01.png" alt>
                                                    </div> -->
                                                    <!-- <div class="address-info">
                                                        <h5><a href>Toyota Of Lincoln Park</a></h5>
                                                        <h6><i class="fas fa-map-pin me-2"></i>Newyork, USA
                                                        </h6>
                                                    </div> -->
                                                </div>
                                            </div>
                                            <div class="listing-button">
                                                <a href="{{ route('location.details', ['id' => $item->id, 'name' => str_slug($item->intitule)]) }}" type="sumit" class="btn btn-order"><span><i class="fas fa-calendar me-2"></i></span>Louer maintenant</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="blog-pagination">
                    <nav>
                        {{ $results->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')

<script type="text/javascript">
    var path = "{{ route('location_list.action') }}";

    $('input.typeahead').typeahead({

        source: function(query, process) {

            return $.get(path, {
                query: query
            }, function(data) {

                return process(data);

            });

        }

    });
</script>

<script type="text/javascript">
    $(function() {
        $("input[name='chkPassPort']").click(function() {
            if ($("#chkYes").is(":checked")) {
                $("#txtPassportNumber").removeAttr("disabled");
                $("#txtPassportNumber").focus();
            } else {
                $("#txtPassportNumber").attr("disabled", "disabled");
            }
        });
    });
</script>

<script type="text/javascript">
    const enableInputCheckbox = document.getElementById('enableInputCheckbox');
    const textInput = document.getElementById('prix_inferieur');
    const textInput2 = document.getElementById('prix_superieur');

    // Ajouter un écouteur d'événement pour détecter les changements de la case à cocher
    enableInputCheckbox.addEventListener('change', function() {
        // Vérifier si la case à cocher est cochée
        if (this.checked) {
            // Activer l'input text si la case est cochée
            textInput.disabled = false;
            textInput2.disabled = false;
        } else {
            // Désactiver l'input text si la case est décochée
            textInput.disabled = true;
            textInput2.disabled = true;
        }
    });
</script>

@endpush