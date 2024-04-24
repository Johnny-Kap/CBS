@component('mail::message')
<h2>Bonjour chèr(e) {{$livraison_annulee->users->name}} {{$livraison_annulee->users->prenom}},</h2>
<p>Votre commande de livraison de panier N°{{$livraison_annulee->numero_commande}} a été <b>annulée</b>.</p>
<p>Nous vous prions de contacter CBS pour plus de détails via l'adresse : hello@cbs-cameroun.com</p>

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent