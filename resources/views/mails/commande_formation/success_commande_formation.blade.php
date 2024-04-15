@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_formation->users->name}} {{$commande_formation->users->prenom}},</h2>
<p>Votre commande N°{{$commande_formation->numero_commande}} a été enregistrée avec succès</p>
<p>Cette comande est <b>En attente de validation de paiement</b>. Vous recevrez un mail lors de la validation de paiement de la commande
par l'administrateur.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                            | Intitule de la formation                   | Heure de debut                                 | Heure de fin                                 | Tarif total                                 |
| ---------------------------------------|:------------------------------------------:|:----------------------------------------------:|:--------------------------------------------:|:-------------------------------------------:|
|{{$commande_formation->numero_commande}}| {{$commande_formation->formations->theme}} |{{$commande_formation->formations->heure_debut}}|{{$commande_formation->formations->heure_fin}}| {{$commande_formation->montant_total}} FCFA |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent