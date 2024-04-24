@component('mail::message')
<h2>Bonjour chèr(e) {{$success_livraison->users->name}} {{$success_livraison->users->prenom}},</h2>
<p>Votre commande N°{{$success_livraison->numero_commande}} a été enregistrée avec succès</p>
<p>Cette comande est <b>En attente de validation</b>. Vous recevrez un mail lors de la validation de la commande
par l'administrateur.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                           | Type de prestation                      | Date de livraison                    | Etat de la commande |
| --------------------------------------|:---------------------------------------:|:------------------------------------:|:-------------------:|
|{{$success_livraison->numero_commande}}| {{$success_livraison->type_prestation}} |{{$success_livraison->date_livraison}}| En attente          |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent