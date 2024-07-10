@extends('layouts.template')

@push('style')

<style>
    .hidden {
        display: none;
    }
</style>

@endpush

@section('content')


<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>Formulaire de réservation d'un appartement / hotel</h1>
                <p class="account-subtitle">
                    Nous vous enverrons un e-mail après validation de la commande.
                </p>
                <form method="POST" action="{{ route('commande.reservation.appart.hotel.add') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Quelle réservation voudriez vous faire ? <span class="text-danger">*</span></label>
                        <select name="type_resevation" class="form-control" id="">
                            <option value="hotel">Hôtel</option>
                            <option value="appartement">Appartement</option>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label class="form-label">Date souhatée <span class="text-danger">*</span></label>
                        <input id="email" type="text" class="form-control datetimepicker" placeholder="04/02/2024" name="date_reservation" required />
                    </div> -->
                    <div class="form-group">
                        <label class="form-label">Période souhaitée de réservation <span class="text-danger">*</span> : </label>
                        <label>
                            <input type="radio" name="option" value="continu" id="continuRadio" checked> Continue
                        </label>
                        <label>
                            <input type="radio" name="option" value="multiples" id="multiplesRadio"> Multiples
                        </label>
                    </div>
                    <div id="continuField" class="hidden form-group">
                        <label for="continu">Période continue <span class="text-danger">*</span></label>
                        <input type="text" class="form-control datetimepicker" placeholder="04/02/2024" name="continu" id="continu">
                    </div>
                    <div id="multiplesField" class="hidden form-group">
                        <label for="multiple1">Période multiple 1 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control datetimepicker" placeholder="04/02/2024" name="multiple_1" id="multiple1">
                        <label for="multiple2">Période multiple 2 <span class="text-danger">*</span></label>
                        <input type="text" class="form-control datetimepicker" placeholder="04/02/2024" name="multiple_2" id="multiple2">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Ville <span class="text-danger">*</span></label>
                        <input id="situation_vehicule" type="text" class="form-control" name="ville" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Localité / Quartier </label>
                        <input id="situation_vehicule" type="text" class="form-control" name="localite" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Prix inférieur <span class="text-danger">*</span></label>
                        <input id="tel" type="number" class="form-control" required name="prix_inferieur" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Prix supérieur <span class="text-danger">*</span></label>
                        <input id="tel" type="number" class="form-control" required name="prix_superieur" />
                    </div>
                    <input type="hidden" value="{{$numero_abonnement_valide}}" name="numero_abonnement_valide">
                    <button type="submit" class="btn btn-outline-light w-100 btn-size mt-1">Valider</button>

                    <div class="text-center dont-have">
                        Lorsque vous validez votre commande, vous acceptez nos <a href="{{route('term_condition')}}">termes et conditions</a>
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
        const continuRadio = document.getElementById('continuRadio');
        const multiplesRadio = document.getElementById('multiplesRadio');
        const continuField = document.getElementById('continuField');
        const multiplesField = document.getElementById('multiplesField');
        const continuInput = document.getElementById('continu');
        const multiple1Input = document.getElementById('multiple1');
        const multiple2Input = document.getElementById('multiple2');

        function toggleFields() {
            if (continuRadio.checked) {
                continuField.classList.remove('hidden');
                multiplesField.classList.add('hidden');
                continuInput.setAttribute('required', 'required');
                multiple1Input.removeAttribute('required');
                multiple2Input.removeAttribute('required');
            } else if (multiplesRadio.checked) {
                continuField.classList.add('hidden');
                multiplesField.classList.remove('hidden');
                continuInput.removeAttribute('required');
                multiple1Input.setAttribute('required', 'required');
                multiple2Input.setAttribute('required', 'required');
            } else {
                continuField.classList.add('hidden');
                multiplesField.classList.add('hidden');
                continuInput.removeAttribute('required');
                multiple1Input.removeAttribute('required');
                multiple2Input.removeAttribute('required');
            }
        }

        continuRadio.addEventListener('change', toggleFields);
        multiplesRadio.addEventListener('change', toggleFields);

        // Initialize the fields
        toggleFields();
    });
</script>

@endpush