@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_location_modifie->users->name}} {{$commande_location_modifie->users->prenom}},</h2>
<p>Votre commande de Location N°{{$commande_location_modifie->numero_commande}} a été <b>modifiée</b>.</p>
<p>Nous vous rappelons que les dates de locations ont été modifiées. Ceci affectera le prix de la prestation.<b></b></p>
<p>Nous vous prions de consulter votre historique de commande dans la section commande de location pour voir les détails.</p>

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent