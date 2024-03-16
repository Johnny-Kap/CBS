@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_maintenance->users->name}} {{$commande_maintenance->users->prenom}},</h2>
<p>Votre commande de maintenance N°{{$commande_maintenance->numero_commande}} a été enregistrée avec succès</p>
<p>Cette comande est <b>En attente</b>. Vous recevrez un mail lors de la validation de la commande
par l'administrateur pour passer ensuite au paiement.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                              | Intitule de la panne               | Date de maintenance                       | Situation du véhicule                       | Tarif                                  | Etat de la commande |
| -----------------------------------------|:----------------------------------:|:-----------------------------------------:|:-------------------------------------------:|:--------------------------------------:| -------------------:|
|{{$commande_maintenance->numero_commande}}| {{$commande_maintenance->intitule}}|{{$commande_maintenance->date_maintenance}}|{{$commande_maintenance->situation_vehicule}}| {{$commande_maintenance->montant}} FCFA| En attente          |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent