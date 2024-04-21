@component('mail::message')
<h2>Bonjour chèr(e) {{$expression_besoin_paiement_annulee->users->name}} {{$expression_besoin_paiement_annulee->users->prenom}},</h2>
<p>Votre paiement d'expression du besoin de formation N°{{$expression_besoin_paiement_annulee->numero_commande}} a été <b>annulé</b> pour  paiement non recu / une preuve de paiement incorrecte.</p>
<p>Nous vous rappelons que le montant de la pestation est de {{$expression_besoin_paiement_annulee->montant}} FCFA.<b></b></p>
<p>Nous vous prions de procéder à nouveau dès à présent au paiement de la commande.</p>

@component('mail::button', ['url' => $url, 'color' => 'green'])
Paiement de la commande
@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent