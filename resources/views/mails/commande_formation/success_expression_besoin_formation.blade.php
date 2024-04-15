@component('mail::message')
<h2>Bonjour chèr(e) {{$expression_besoin->users->name}} {{$expression_besoin->users->prenom}},</h2>
<p>Votre commande en expression de besoin d'une formation N°{{$expression_besoin->numero_commande}} a été enregistrée avec succès</p>
<p>Cette commande est <b>En attente</b>. Vous recevrez un mail lors de la validation de la commande
par l'administrateur pour passer ensuite au paiement.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')

| N° commande                           | Intitule de la formation     | Heure de debut                     | Heure de fin                     | Date de formation                      | Etat de la commande |
| --------------------------------------|:-------------- -------------:|:----------------------------------:|:--------------------------------:|:--------------------------------------:|:-------------------:|
|{{$expression_besoin->numero_commande}}| {{$expression_besoin->theme}}| {{$expression_besoin->heure_debut}}| {{$expression_besoin->heure_fin}}| {{$expression_besoin->date_formation}} | En attente          |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent