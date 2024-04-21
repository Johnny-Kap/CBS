@component('mail::message')
<h2>Bonjour chèr(e) {{$paiement_abonnement_annule->users->name}} {{$paiement_abonnement_annule->users->prenom}},</h2>
<p>Votre paiement de l'abonnement N°{{$paiement_abonnement_annule->numero_abonnement}} a été <b>annulé</b> pour un paiement non recu / une preuve de paiement incorrecte.</p>
<p>Nous vous rappelons que le montant de la pestation est de {{$paiement_abonnement_annule->montant}} FCFA.<b></b></p>
<p>Nous vous prions de procéder à nouveau dès à présent au paiement de l'abonnement.</p>

@component('mail::button', ['url' => $url, 'color' => 'green'])
Paiement de l'abonnement
@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent