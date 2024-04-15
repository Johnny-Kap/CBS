@component('mail::message')
<h2>Bonjour chèr(e) {{$validation_paiement_expression_besoin->users->name}} {{$validation_paiement_expression_besoin->users->prenom}},</h2>
<p>Le paiement de votre expression dubesoin de formation N°{{$validation_paiement_expression_besoin->numero_commande}} a été validée avec succès</p>
<p>Cette comande est désormais disponible. Vous recevrez vos différentes modalités pour cette formation par la directon CBS.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')

| N° commande                                               | Intitule de la formation                         | Heure de debut                                         | Heure de fin                                         | Date de formation                                          | Etat de paiement |
| ----------------------------------------------------------|:------------------------------------------------:|:------------------------------------------------------:|:----------------------------------------------------:|:----------------------------------------------------------:|:----------------:|
|{{$validation_paiement_expression_besoin->numero_commande}}| {{$validation_paiement_expression_besoin->theme}}| {{$validation_paiement_expression_besoin->heure_debut}}| {{$validation_paiement_expression_besoin->heure_fin}}| {{$validation_paiement_expression_besoin->date_formation}} | Payé             |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent