@component('mail::message')
<h2>Bonjour chèr(e) {{$validation_livraison->users->name}} {{$validation_livraison->users->prenom}},</h2>
<p>Votre commande de livraison de panier N°{{$validation_livraison->numero_commande}} a été <b>validée</b> avec succès</p>
<p>L'équipe CBS se mettra en oeuvre pour éffectuer votre commande.</p>

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent