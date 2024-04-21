@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_maintenance_annulee->users->name}} {{$commande_maintenance_annulee->users->prenom}},</h2>
<p>Votre commande de maintenance automobile N°{{$commande_maintenance_annulee->numero_commande}} a été <b>annulée</b>.</p>
<p>Nous vous prions de contacter CBS pour plus de détails via l'adresse : hello@cbs-cameroun.com</p>

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent