@component('mail::message')
<h2>Bonjour chèr(e) {{$validation_expression_besoin->users->name}} {{$validation_expression_besoin->users->prenom}},</h2>
<p>Votre expression du besoin de formation N°{{$validation_expression_besoin->numero_commande}} a été <b>validée</b> avec succès.</p>
<p>Le montant de la pestation est de {{$validation_expression_besoin->montant}} FCFA.<b></b></p>
<p>Nous vous prions de procéder dès à présent au paiement de la commande.</p>

@component('mail::button', ['url' => $url, 'color' => 'green'])
Paiement de la commande de location
@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent