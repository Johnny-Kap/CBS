@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_validation_maintenance->users->name}} {{$commande_validation_maintenance->users->prenom}},</h2>
<p>Votre commande de maintenance N°{{$commande_validation_maintenance->numero_commande}} a été <b>validée</b> avec succès</p>
<p>Nous vous prions de procéder dès à présent au paiement de la commande.</p>

@component('mail::button', ['url' => $url, 'color' => 'green'])
Paiement de la commande de maintenance
@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent