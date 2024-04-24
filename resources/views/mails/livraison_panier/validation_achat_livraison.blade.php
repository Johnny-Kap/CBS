@component('mail::message')
<h2>Bonjour chèr(e) {{$validation_achat_livraison->users->name}} {{$validation_achat_livraison->users->prenom}},</h2>
<p>Votre commande d'achat et livraison de panier N°{{$validation_achat_livraison->numero_commande}} a été <b>validée</b> avec succès</p>
<p>Nous vous prions de procéder dès à présent au paiement de la commande.</p>

@component('mail::button', ['url' => $url, 'color' => 'green'])
Paiement de la commande de location
@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent