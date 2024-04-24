@component('mail::message')
<h2>Bonjour chèr(e) {{$achat_livraison_annulee->users->name}} {{$achat_livraison_annulee->users->prenom}},</h2>
<p>Votre commande d'achat et de livraison de panier N°{{$achat_livraison_annulee->numero_commande}} a été <b>annulée</b>.</p>
<p>Nous vous prions de contacter CBS pour plus de détails via l'adresse : hello@cbs-cameroun.com</p>

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent