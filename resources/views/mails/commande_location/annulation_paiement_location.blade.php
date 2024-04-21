@component('mail::message')
<h2>Bonjour chèr(e) {{$paiement_commande_location_annule->users->name}} {{$paiement_commande_location_annule->users->prenom}},</h2>
<p>Votre paiement de la commande de location de véhicule N°{{$paiement_commande_location_annule->numero_commande}} a été <b>annulé</b> pour un paiement non recu / une preuve de paiement incorrecte.</p>
<p>Nous vous rappelons que le montant de la pestation est de {{$paiement_commande_location_annule->tarif}} FCFA.<b></b></p>
<p>Nous vous prions de procéder à nouveau dès à présent au paiement de la commande.</p>

@component('mail::button', ['url' => $url, 'color' => 'green'])
Paiement de la commande
@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent