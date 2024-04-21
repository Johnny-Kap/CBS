@component('mail::message')
<h2>Bonjour chèr(e) {{$commande_reservation_success->users->name}} {{$commande_reservation_success->users->prenom}},</h2>
<p>Votre commande N°{{$commande_reservation_success->numero_commande}} a été enregistrée avec succès</p>
<p>Cette commande est <b>En attente</b>. Vous recevrez un mail lors de la validation de la commande.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                                      | Type de reservation                                | Date reservation                                  | Ville                                  | Localite                                    | Etat de la commande |
| -------------------------------------------------|:--------------------------------------------------:|:-------------------------------------------------:|:--------------------------------------:|:-------------------------------------------:| -------------------:|
|{{$commande_reservation_success->numero_commande}}| {{$commande_reservation_success->type_reservation}}|{{$commande_reservation_success->date_reservation}}|{{$commande_reservation_success->ville}}| {{$commande_reservation_success->localite}} | En attente          |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent