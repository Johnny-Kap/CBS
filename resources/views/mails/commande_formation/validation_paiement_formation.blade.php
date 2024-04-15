@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_validation_paiement->users->name}} {{$commande_validation_paiement->users->prenom}},</h2>
<p>Le paiement de votre commande de location N°{{$commande_validation_paiement->numero_commande}} a été validée avec succès</p>
<p>Cette comande est désormais valide.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                                      | Intitule de la formation                               | Heure de debut                                           | Heure de fin                                           | Date formation                                                | Montant total                                         | Type de cours choisi                                                                       | Etat de la commande | Etat de paiement |
| -------------------------------------------------|:------------------------------------------------------:|:--------------------------------------------------------:|:------------------------------------------------------:|:-------------------------------------------------------------:| :----------------------------------------------------:|:------------------------------------------------------------------------------------------:|:-------------------:|:----------------:|
|{{$commande_validation_paiement->numero_commande}}| {{$commande_validation_paiement->formations->intitule}}|{{$commande_validation_paiement->formations->heure_debut}}|{{$commande_validation_paiement->formations->heure_fin}}| {{$commande_validation_paiement->formations->date_formation}} | {{$commande_validation_paiement->montant_total}} FCFA | @if($commande_validation_paiement->type_cours == 'ligne') En ligne @else Présentiel @endif | Validé              | Payé             |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent