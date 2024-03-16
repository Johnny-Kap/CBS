@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_validation_paiement_main->users->name}} {{$commande_validation_paiement_main->users->prenom}},</h2>
<p>Le paiement de votre commande de maintenance N°{{$commande_validation_paiement_main->numero_commande}} a été validée avec succès</p>
<p>Cette comande est désormais disponible.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                                           | Intitule de la panne                            | Date de maintenance                                    | Situation du véhicule                                    | Tarif                                               | Etat du paiement |
| ------------------------------------------------------|:-----------------------------------------------:|:------------------------------------------------------:|:--------------------------------------------------------:|:---------------------------------------------------:| ----------------:|
|{{$commande_validation_paiement_main->numero_commande}}| {{$commande_validation_paiement_main->intitule}}|{{$commande_validation_paiement_main->date_maintenance}}|{{$commande_validation_paiement_main->situation_vehicule}}| {{$commande_validation_paiement_main->montant}} FCFA| Payé             |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent