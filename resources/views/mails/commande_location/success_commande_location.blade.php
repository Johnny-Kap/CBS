@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_location->users->name}} {{$commande_location->users->prenom}},</h2>
<p>Votre commande N°{{$commande_location->numero_commande}} a été enregistrée avec succès</p>
<p>Cette commande est <b>En attente</b>. Vous recevrez un mail lors de la validation de la commande
par l'administrateur pour passer ensuite au paiement.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                           | Intitule de la location                    | Date debut                       | Date fin                       | Tarif                         | Rabais                           |Montant Rabais                            | Etat de la commande |
| --------------------------------------|:------------------------------------------:|:--------------------------------:|:------------------------------:|:-----------------------------:|:---------------------------------|:----------------------------------------:| -------------------:|
|{{$commande_location->numero_commande}}| {{$commande_location->locations->intitule}}|{{$commande_location->date_debut}}|{{$commande_location->date_fin}}| {{$commande_location->tarif}} | {{$commande_location->rabais}} % | {{$commande_location->tarif_rabais}} FCFA| En attente          |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent