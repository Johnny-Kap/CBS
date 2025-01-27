@extends('layouts.template')

@push('style')

<style>
    .content-div {
        display: none;
        /* Masque les divs par défaut */
    }
</style>
@endpush

@section('content')

<div class="header-inner bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="candidates-user-info">
                    <div class="jobber-user-info">
                        <div class="profile-avatar">
                            @if (Auth::user()->image == null)
                            <img class="img-fluid" style="width: 110px; height:90px; border-radius : 50%;" src="/../assets/img/no-profile-pic-icon-0.jpg" alt="">
                            @else
                            <img class="img-fluid" style="width: 110px; height:120px; border-radius : 50%;" src="{{ Storage::url(Auth::user()->image) }}" alt="">
                            @endif
                            {{-- <i class="fas fa-pencil-alt"></i> --}}
                        </div>
                        <div class="profile-avatar-info ms-4">
                            <h3>{{ Auth::user()->prenom }} {{ Auth::user()->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--=================================
                                                                                                              inner banner -->

<section class="space-ptb mb-5">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="browse-job justify-content-center d-flex border-0 pb-3">
                    <div class="mb-4 mb-md-0">
                        <ul class="nav nav-tabs justify-content-center d-flex" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Gérer mon profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Modifier mot de passe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="profile" aria-selected="false">Modifier mon email</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">
                    <!-- Profile -->
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="user-dashboard-info-box">
                                    <div class="section-title-02 mb-2 d-grid">
                                        <h4>Informations de base</h4>
                                    </div>
                                    <div class="">
                                        <div class="">
                                            <form action="{{route('myprofile.parametres.photo.change')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <label for="formFile" class="form-label">Modifier la photo de
                                                        profil</label>
                                                    <div class="form-group mb-3 col-md-4">
                                                        <input class="form-control" name="file" type="file" id="formFile">
                                                    </div>
                                                    <div class="form-group mb-3 col-md-6">
                                                        <button type="submit" class="" style="border-color: transparent; background-color:transparent;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <form method="post" action="{{route('myprofile.parametres.update.profil')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">Nom de l'entreprise</label>
                                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">Boite postale</label>
                                                <input type="text" class="form-control" name="boite_postale" value="{{ Auth::user()->boite_postale }}">
                                            </div>
                                            <!-- <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">Profession</label>
                                                <input type="text" class="form-control" name="profession" value="{{ Auth::user()->profession }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6 datetimepickers">
                                                <label class="form-label">Date de naissance</label>
                                                <div class="input-group">
                                                    <input type="datetime-local" class="form-control" value="{{ Auth::user()->date_naiss }}" name="date_naiss">
                                                </div>
                                            </div> -->
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">Téléphone</label>
                                                <input type="text" name="tel" class="form-control" value="{{ Auth::user()->tel }}">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="form-label">Zone de résidence : <span class="text-danger">*</span></label>
                                                <select name="residence" id="mySelect" class="form-control">
                                                    <option value="">Selectionner votre lieu de résidence</option>
                                                    <option value="cameroun">Je réside au cameroun</option>
                                                    <option value="etranger_cameroun">Je suis étranger résidant au Cameroun</option>
                                                    <option value="hors_cameroun">Je réside hors du cameroun</option>
                                                </select>
                                            </div> -->
                                            <!-- <div class="form-group mb-3 col-md-6 content-div" id="div_numero_cni">
                                                <label class="form-label">N° CNI</label>
                                                <input type="text" id="input_numero_cni" class="form-control" name="numero_cni" required value="{{ Auth::user()->numero_cni }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6 datetimepickers content-div" id="div_date_cni">
                                                <label class="form-label">Date de délivrance CNI</label>
                                                <div class="input-group">
                                                    <input type="datetime-local" id="input_date_cni" class="form-control" value="{{ Auth::user()->date_delivrance_cni }}" required name="date_delivrance_cni">
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 col-md-6 content-div" id="div_numero_passport">
                                                <label class="form-label">N° passport</label>
                                                <input type="text" id="input_numero_passport" class="form-control" name="numero_passport" value="{{ Auth::user()->numero_passport }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6 datetimepickers content-div" id="div_date_passport">
                                                <label class="form-label">Date de délivrance passport</label>
                                                <div class="input-group">
                                                    <input type="datetime-local" id="input_date_passport" class="form-control" value="{{ Auth::user()->date_delivrance_passport }}" required name="date_delivrance_passport">
                                                </div>
                                            </div> -->
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">Adresse</label>
                                                <input type="text" name="adresse" class="form-control" value="{{ Auth::user()->adresse }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">Ville</label>
                                                <input type="text" name="ville" class="form-control" value="{{ Auth::user()->ville }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">Pays : <span class="text-danger">*</span></label>
                                                <select name="pays" class="form-control">
                                                    <option value="" selected="selected">Sélectionner un pays</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Afrique du Sud">Afrique du Sud</option>
                                                    <option value="Albanie">Albanie</option>
                                                    <option value="Algérie">Algérie</option>
                                                    <option value="Allemagne">Allemagne</option>
                                                    <option value="Andorre">Andorre</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antarctique">Antarctique</option>
                                                    <option value="Antilles Néerlandaises">Antilles Néerlandaises</option>
                                                    <option value="Arabie Saoudite">Arabie Saoudite</option>
                                                    <option value="Argentine">Argentine</option>
                                                    <option value="Arménie">Arménie</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australie">Australie</option>
                                                    <option value="Autriche">Autriche</option>
                                                    <option value="Azerbaïdjan">Azerbaïdjan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahreïn">Bahreïn</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbade">Barbade</option>
                                                    <option value="Bélarus">Bélarus</option>
                                                    <option value="Belgique">Belgique</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Bénin">Bénin</option>
                                                    <option value="Bermudes">Bermudes</option>
                                                    <option value="Bhoutan">Bhoutan</option>
                                                    <option value="Bolivie">Bolivie</option>
                                                    <option value="Bosnie-Herzégovine">Bosnie-Herzégovine</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brésil">Brésil</option>
                                                    <option value="Brunéi Darussalam">Brunéi Darussalam</option>
                                                    <option value="Bulgarie">Bulgarie</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodge">Cambodge</option>
                                                    <option value="Cameroun">Cameroun</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cap-Vert">Cap-Vert</option>
                                                    <option value="Chili">Chili</option>
                                                    <option value="Chine">Chine</option>
                                                    <option value="Chypre">Chypre</option>
                                                    <option value="Colombie">Colombie</option>
                                                    <option value="Comores">Comores</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Corée du Nord">Corée du Nord</option>
                                                    <option value="Corée du Sud">Corée du Sud</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                                                    <option value="Croatie">Croatie</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Danemark">Danemark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominique">Dominique</option>
                                                    <option value="Égypte">Égypte</option>
                                                    <option value="Émirats Arabes Unis">Émirats Arabes Unis</option>
                                                    <option value="Équateur">Équateur</option>
                                                    <option value="Érythrée">Érythrée</option>
                                                    <option value="Espagne">Espagne</option>
                                                    <option value="Estonie">Estonie</option>
                                                    <option value="Eswatini">Eswatini</option>
                                                    <option value="États-Unis">États-Unis</option>
                                                    <option value="Éthiopie">Éthiopie</option>
                                                    <option value="Fidji">Fidji</option>
                                                    <option value="Finlande">Finlande</option>
                                                    <option value="France">France</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambie">Gambie</option>
                                                    <option value="Géorgie">Géorgie</option>
                                                    <option value="Géorgie du Sud-et-les Îles Sandwich du Sud">Géorgie du Sud-et-les Îles Sandwich du Sud</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Grèce">Grèce</option>
                                                    <option value="Groenland">Groenland</option>
                                                    <option value="Grenade">Grenade</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinée">Guinée</option>
                                                    <option value="Guinée-Bissau">Guinée-Bissau</option>
                                                    <option value="Guinée Équatoriale">Guinée Équatoriale</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Guyane Française">Guyane Française</option>
                                                    <option value="Haïti">Haïti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hongrie">Hongrie</option>
                                                    <option value="Île Bouvet">Île Bouvet</option>
                                                    <option value="Île Christmas">Île Christmas</option>
                                                    <option value="Île Norfolk">Île Norfolk</option>
                                                    <option value="Îles Caïmans">Îles Caïmans</option>
                                                    <option value="Îles Cook">Îles Cook</option>
                                                    <option value="Îles Féroé">Îles Féroé</option>
                                                    <option value="Îles Malouines">Îles Malouines</option>
                                                    <option value="Îles Mariannes du Nord">Îles Mariannes du Nord</option>
                                                    <option value="Îles Marshall">Îles Marshall</option>
                                                    <option value="Îles Mineures Éloignées des États-Unis">Îles Mineures Éloignées des États-Unis</option>
                                                    <option value="Îles Salomon">Îles Salomon</option>
                                                    <option value="Îles Turques-et-Caïques">Îles Turques-et-Caïques</option>
                                                    <option value="Îles Vierges Britanniques">Îles Vierges Britanniques</option>
                                                    <option value="Îles Vierges des États-Unis">Îles Vierges des États-Unis</option>
                                                    <option value="Inde">Inde</option>
                                                    <option value="Indonésie">Indonésie</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Irak">Irak</option>
                                                    <option value="Irlande">Irlande</option>
                                                    <option value="Islande">Islande</option>
                                                    <option value="Israël">Israël</option>
                                                    <option value="Italie">Italie</option>
                                                    <option value="Jamahiriya Arabe Libyenne">Jamahiriya Arabe Libyenne</option>
                                                    <option value="Jamaïque">Jamaïque</option>
                                                    <option value="Japon">Japon</option>
                                                    <option value="Jordanie">Jordanie</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kirghizistan">Kirghizistan</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Koweït">Koweït</option>
                                                    <option value="Lao (République Démocratique Populaire)">Lao (République Démocratique Populaire)</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Lettonie">Lettonie</option>
                                                    <option value="Liban">Liban</option>
                                                    <option value="Libéria">Libéria</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lituanie">Lituanie</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macao">Macao</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malaisie">Malaisie</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malte">Malte</option>
                                                    <option value="Maroc">Maroc</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Maurice">Maurice</option>
                                                    <option value="Mauritanie">Mauritanie</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexique">Mexique</option>
                                                    <option value="Micronésie">Micronésie</option>
                                                    <option value="Moldavie">Moldavie</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolie">Mongolie</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibie">Namibie</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Népal">Népal</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigéria">Nigéria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norvège">Norvège</option>
                                                    <option value="Nouvelle-Calédonie">Nouvelle-Calédonie</option>
                                                    <option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Ouganda">Ouganda</option>
                                                    <option value="Ouzbékistan">Ouzbékistan</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palaos">Palaos</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papouasie-Nouvelle-Guinée">Papouasie-Nouvelle-Guinée</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Pays-Bas">Pays-Bas</option>
                                                    <option value="Pérou">Pérou</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Pologne">Pologne</option>
                                                    <option value="Polynésie Française">Polynésie Française</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Porto Rico">Porto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="République Arabe Syrienne">République Arabe Syrienne</option>
                                                    <option value="République Centrafricaine">République Centrafricaine</option>
                                                    <option value="République de Corée">République de Corée</option>
                                                    <option value="République Démocratique du Congo">République Démocratique du Congo</option>
                                                    <option value="République Dominicaine">République Dominicaine</option>
                                                    <option value="République Tchèque">République Tchèque</option>
                                                    <option value="Roumanie">Roumanie</option>
                                                    <option value="Royaume-Uni">Royaume-Uni</option>
                                                    <option value="Russie (Fédération de)">Russie (Fédération de)</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Sahara Occidental">Sahara Occidental</option>
                                                    <option value="Sainte-Hélène">Sainte-Hélène</option>
                                                    <option value="Saint-Kitts-et-Nevis">Saint-Kitts-et-Nevis</option>
                                                    <option value="Saint-Marin">Saint-Marin</option>
                                                    <option value="Saint-Pierre-et-Miquelon">Saint-Pierre-et-Miquelon</option>
                                                    <option value="Saint-Vincent-et-les-Grenadines">Saint-Vincent-et-les-Grenadines</option>
                                                    <option value="Sainte-Lucie">Sainte-Lucie</option>
                                                    <option value="Salvador">Salvador</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="Sao Tomé-et-Principe">Sao Tomé-et-Principe</option>
                                                    <option value="Sénégal">Sénégal</option>
                                                    <option value="Serbie-et-Monténégro">Serbie-et-Monténégro</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapour">Singapour</option>
                                                    <option value="Slovaquie">Slovaquie</option>
                                                    <option value="Slovénie">Slovénie</option>
                                                    <option value="Somalie">Somalie</option>
                                                    <option value="Soudan">Soudan</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Suède">Suède</option>
                                                    <option value="Suisse">Suisse</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard et Jan Mayen">Svalbard et Jan Mayen</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Tadjikistan">Tadjikistan</option>
                                                    <option value="Tanzanie">Tanzanie</option>
                                                    <option value="Tchad">Tchad</option>
                                                    <option value="Territoire Palestinien Occupé">Territoire Palestinien Occupé</option>
                                                    <option value="Thaïlande">Thaïlande</option>
                                                    <option value="Timor-Leste">Timor-Leste</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinité-et-Tobago">Trinité-et-Tobago</option>
                                                    <option value="Tunisie">Tunisie</option>
                                                    <option value="Turkménistan">Turkménistan</option>
                                                    <option value="Turquie">Turquie</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Viet Nam">Viet Nam</option>
                                                    <option value="Wallis-et-Futuna">Wallis-et-Futuna</option>
                                                    <option value="Yémen">Yémen</option>
                                                    <option value="Zambie">Zambie</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">SIREN</label>
                                                <input type="text" name="siren" class="form-control" value="{{ Auth::user()->siren }}">
                                            </div>
                                            <div class="form-group mb-3 col-md-6">
                                                <label class="form-label">SIRET</label>
                                                <input type="text" name="siret" class="form-control" value="{{ Auth::user()->siret }}">
                                            </div>
                                            <div class="form-group mb-0 col-md-12">
                                                <label class="mb-2">Description</label>
                                                <textarea class="form-control form--control user-text-editor" name="bio" rows="10" cols="40">{!! html_entity_decode(Auth::user()->description) !!}</textarea>
                                                <div class="d-flex align-items-center pt-2">
                                                    <div class="mr-3">
                                                        ``` <code class="badge bg-gray border border-gray text-gray">code</code>
                                                        ```
                                                    </div>
                                                    <div class="mr-3    fw-bold">**gras**</div>
                                                    <div class="mr-3 font-italic">*italique*</div>
                                                    <div>&gt;quote</div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <!-- <div class="user-dashboard-info-box">
                                    <div class="section-title-02 mb-3">
                                        <h4>Liens sociaux</h4>
                                    </div>

                                    <div class="row">
                                        <div class="form-group mb-3 col-md-6">
                                            <label class="form-label">Facebook</label>
                                            <input type="text" name="facebook" class="form-control" value="{{ Auth::user()->facebook }}">
                                        </div>
                                        <div class="form-group mb-3 col-md-6">
                                            <label class="form-label">Twitter</label>
                                            <input type="email" name="twitter" class="form-control" value="{{ Auth::user()->twitter }}">
                                        </div>
                                        <div class="form-group mb-0 col-md-6">
                                            <label class="form-label">Linkedin</label>
                                            <input type="text" name="linkedin" class="form-control" value="{{ Auth::user()->linkedin }}">
                                        </div>
                                        <div class="form-group mb-0 col-md-6">
                                            <label class="form-label">Site internet</label>
                                            <input type="text" name="site_internet" class="form-control" value="{{ Auth::user()->site_internet }}">
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="user-dashboard-info-box">
                                    <div class="form-group mb-0">
                                        <h4 class="mb-3">Adresse</h4>
                                        <div class="form-group mb-3">
                                            <label class="form-label">Entrez votre emplacement</label>
                                            <input type="text" name="adresse" class="form-control" value="{{ Auth::user()->Adresse }}">
                                        </div>
                                    </div>
                                </div> -->
                                <button type="submit" class="btn btn-md btn-primary">Sauvegarder</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Change password -->
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="user-dashboard-info-box">
                                    <div class="section-title-02 mb-4">
                                        <h4>Changer le mot de passe</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <form class="row" method="POST" action="{{route('myprofile.parametres.update.password')}}">
                                                @csrf
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="form-label">Mot de passe actuel</label>
                                                    <input type="password" name="old_password" class="form-control" value="">
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="form-label">Nouveau mot de passe</label>
                                                    <input type="password" name="new_password" class="form-control" value="">
                                                </div>
                                                <div class="form-group col-md-12 mb-0">
                                                    <label class="form-label">Confirmez le mot de passe</label>
                                                    <input type="password" name="confirm_password" class="form-control" value="">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-primary" type="submit">Changer mot de passe</button>
                            </div>
                            </form>
                        </div>
                    </div><!-- Change email -->
                    <div class="tab-pane fade show" id="email" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="user-dashboard-info-box">
                                    <div class="section-title-02 mb-4">
                                        <h4>Changer email</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="{{route('myprofile.parametres.update.email')}}" method="post" class="row">
                                                @csrf
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="form-label">Mon Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary">Changer e-mail</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('mySelect');
        const div1 = document.getElementById('div_numero_cni');
        const div2 = document.getElementById('div_numero_passport');
        const div3 = document.getElementById('div_date_cni');
        const div4 = document.getElementById('div_date_passport');
        const input1 = document.getElementById('input_numero_cni');
        const input2 = document.getElementById('input_numero_passport');
        const input3 = document.getElementById('input_date_cni');
        const input4 = document.getElementById('input_date_passport');

        // Masquer les divs et rendre les champs non obligatoires au départ
        div1.style.display = 'none';
        div2.style.display = 'none';
        div3.style.display = 'none';
        div4.style.display = 'none';
        input1.required = false;
        input2.required = false;
        input3.required = false;
        input4.required = false;

        selectElement.addEventListener('change', function() {
            const selectedValue = selectElement.value;

            if (selectedValue === 'cameroun') {
                div1.style.display = 'block';
                div3.style.display = 'block';
                input1.required = true;
                input3.required = true;
                div2.style.display = 'none';
                div4.style.display = 'none';
                input2.required = false;
                input4.required = false;
            } else if (selectedValue === 'hors_cameroun') {
                div1.style.display = 'none';
                div3.style.display = 'none';
                input1.required = false;
                input3.required = false;
                div2.style.display = 'block';
                div4.style.display = 'block';
                input2.required = true;
                input4.required = true;
            } else if (selectedValue === 'etranger_cameroun') {
                div1.style.display = 'none';
                div3.style.display = 'none';
                input1.required = false;
                input3.required = false;
                div2.style.display = 'block';
                div4.style.display = 'block';
                input2.required = true;
                input4.required = true;
            } else {
                div1.style.display = 'none';
                div3.style.display = 'none';
                input1.required = false;
                input3.required = false;
                div2.style.display = 'none';
                div4.style.display = 'none';
                input2.required = false;
                input4.required = false;
            }
        });
    });
</script>

@endpush