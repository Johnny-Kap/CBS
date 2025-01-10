@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_validation_paiement->users->name}} {{$commande_validation_paiement->users->prenom}},</h2>
<p>Le paiement de votre commande de location N°{{$commande_validation_paiement->numero_commande}} a été validée avec succès</p>
<p>Cette comande est désormais disponible. Vous pouvez dès à présent passer récupérer votre véhicule.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                                      | Intitule de la location                               | Date debut                                  | Date fin                                  | Tarif                                    | Etat du paiement |
| -------------------------------------------------|:-----------------------------------------------------:|:-------------------------------------------:|:-----------------------------------------:|:----------------------------------------:| ----------------:|
|{{$commande_validation_paiement->numero_commande}}| {{$commande_validation_paiement->locations->intitule}}|{{$commande_validation_paiement->date_debut}}|{{$commande_validation_paiement->date_fin}}| @if($commande_validation_paiement->rabais == 0) {{$commande_validation_paiement->tarif}} @else {{$commande_validation_paiement->tarif_rabais}} @endif | Payé             |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent