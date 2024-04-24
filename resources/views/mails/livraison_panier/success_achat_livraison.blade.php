@component('mail::message')
<h2>Bonjour chèr(e) {{$success_achat_livraison->users->name}} {{$success_achat_livraison->users->prenom}},</h2>
<p>Votre commande N°{{$success_achat_livraison->numero_commande}} a été enregistrée avec succès</p>
<p>Cette comande est <b>En attente de validation</b>. Vous recevrez un mail lors de la validation de la commande
par l'administrateur.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                                 | Type de prestation                            | Date de livraison                          | Montant                                  | Etat de la commande |
| --------------------------------------------|:---------------------------------------------:|:------------------------------------------:|:----------------------------------------:|:-------------------:|
|{{$success_achat_livraison->numero_commande}}| {{$success_achat_livraison->type_prestation}} |{{$success_achat_livraison->date_livraison}}|{{$success_achat_livraison->montant}} FCFA| En attente          |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent