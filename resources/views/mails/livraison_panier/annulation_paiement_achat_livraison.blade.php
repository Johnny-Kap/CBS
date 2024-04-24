@component('mail::message')
<h2>Bonjour chèr(e) {{$paiement_achat_livraison_annule->users->name}} {{$paiement_achat_livraison_annule->users->prenom}},</h2>
<p>Votre paiement de la commande d'achat et livraison N°{{$paiement_achat_livraison_annule->numero_commande}} a été <b>refusé</b> pour un paiement non recu / une preuve de paiement incorrecte.</p>
<p>Nous vous rappelons que le montant de la pestation est de {{$paiement_achat_livraison_annule->montant}} FCFA.<b></b></p>
<p>Nous vous prions de procéder à nouveau dès à présent au paiement de la commande.</p>

@component('mail::button', ['url' => $url, 'color' => 'green'])
Paiement de la commande
@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent