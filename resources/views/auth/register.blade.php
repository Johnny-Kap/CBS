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


<div class="main-wrapper login-body">
    <header class="log-header">
        <img class="img-fluid logo-dark" src="assets/img/logo_first.png" alt="Logo" />
    </header>

    <div class="login-wrapper">
        <div class="loginbox">
            <div class="login-auth">
                <div class="login-auth-wrap">
                    <div class="sign-group">
                        <a href="{{url('/')}}" class="btn sign-up"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                            Retour accueil</a>
                    </div>
                    <h1>S'inscrire</h1>
                    <p class="account-subtitle">
                        Nous vous enverrons un code de confirmation à votre adresse e-mail.

                    </p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nom <span class="text-danger">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Prénom </label>
                            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" autocomplete="prenom" />

                            @error('prenom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Profession <span class="text-danger">*</span></label>
                            <input id="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession" />

                            @error('profession')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Téléphone <span class="text-danger">*</span></label>
                            <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" />

                            @error('tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Zone de résidence : <span class="text-danger">*</span></label>
                            <select name="residence" id="mySelect" class="form-control">
                                <option value="">Selectionner votre lieu de résidence</option>
                                <option value="cameroun">Je réside au cameroun</option>
                                <option value="etranger_cameroun">Je suis étranger résidant au Cameroun</option>
                                <option value="hors_cameroun">Je réside hors du cameroun</option>
                            </select>
                        </div>
                        <div class="form-group content-div" id="div_numero_cni">
                            <label class="form-label">Numéro de CNI <span class="text-danger">*</span></label>
                            <input id="input_numero_cni" type="text" class="form-control @error('numero_cni') is-invalid @enderror" name="numero_cni" value="{{ old('numero_cni') }}" autocomplete="numero_cni" />

                            @error('numero_cni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group content-div" id="div_date_cni">
                            <label class="form-label">Date de délivrance CNI <span class="text-danger">*</span></label>
                            <input id="input_date_cni" type="text" class="form-control datetimepicker @error('date_delivrance_cni') is-invalid @enderror" placeholder="04/11/2023" name="date_delivrance_cni" value="{{ old('date_delivrance_cni') }}" autocomplete="date_delivrance_cni">

                            @error('date_delivrance_cni')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group content-div" id="div_numero_passport">
                            <label class="form-label">Numéro de Passport <span class="text-danger">*</span></label>
                            <input id="input_numero_passport" type="text" class="form-control @error('numero_passport') is-invalid @enderror" name="numero_passport" value="{{ old('numero_passport') }}" autocomplete="numero_passport" />

                            @error('numero_passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group content-div" id="div_date_passport">
                            <label class="form-label">Date de délivrance Passport <span class="text-danger">*</span></label>
                            <input id="input_date_passport" type="text" class="form-control datetimepicker @error('date_delivrance_passport') is-invalid @enderror" placeholder="04/11/2023" name="date_delivrance_passport" value="{{ old('date_delivrance_passport') }}" autocomplete="date_delivrance_passport">

                            @error('date_delivrance_passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Adresse <span class="text-danger">*</span></label>
                            <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse" />

                            @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ville <span class="text-danger">*</span></label>
                            <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville" />

                            @error('ville')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label class="form-label">NIU (Numéro d'Identification Unique) </label>
                            <input id="adresse" type="text" class="form-control @error('niu') is-invalid @enderror" name="niu" value="{{ old('niu') }}" autocomplete="niu" />

                            @error('niu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Mot de passe <span class="text-danger">*</span></label>
                            <div class="pass-group">
                                <input id="password" type="password" class="form-control pass-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" />
                                <span class="fas fa-eye toggle-password"></span>

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Confirmation de mot de passe <span class="text-danger">*</span></label>
                            <div class="pass-group">
                                <input id="password-confirm" type="password" class="form-control pass-input" name="password_confirmation" required autocomplete="new-password" />
                                <span class="fas fa-eye toggle-password"></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-light w-100 btn-size mt-1">S'inscrire</button>

                        <div class="text-center dont-have">
                            Avez-vous déja un compte ? <a href="{{route('login')}}">Se connecter</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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