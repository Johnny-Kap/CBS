@component('mail::message')
<h2>Bonjour chèr(e) {{$validation_paiement_abo->users->name}} {{$validation_paiement_abo->users->prenom}},</h2>
<p>Le paiement de la souscription d'abonnement N°{{$validation_paiement_abo->numero_abonnement}} a été validée avec succès</p>
<p>Cet abonnement est désormais disponible. Vous pouvez dès à présent l'utiliser et avoir accès à nos autres services.</p>

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent