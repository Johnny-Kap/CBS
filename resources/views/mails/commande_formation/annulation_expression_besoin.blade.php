@component('mail::message')
<h2>Bonjour chèr(e) {{$expression_besoin_annulee->users->name}} {{$expression_besoin_annulee->users->prenom}},</h2>
<p>Votre expression du besoin de formation N°{{$expression_besoin_annulee->numero_commande}} a été <b>annulée</b>.</p>
<p>Nous vous prions de contacter CBS pour plus de détails via l'adresse : hello@cbs-cameroun.com</p>

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent