@component('mail::message')
<h2>Bonjour chèr(e) {{$souscription_abonnement->users->name}} {{$souscription_abonnement->users->prenom}},</h2>
<p>Vous avez souscrit avec succès à l'abonnement {{$souscription_abonnement->abonnements->intitule}} pour une durée d'un mois.</p>
<p>Cette comande est <b>En attente de validation de paiement</b>.

<p>Voici les détails de l'abonnement :</p>

@component('mail::table')
| N° abonnement | Intitule de l'abonnement | Date d'expiration | Montant | Etat de l'abonnement|
| ----------------------------------------------|:--------------------------------------------------:|:-------------------------------------------:|:-------------------------------------------------:| -------------------:|
|{{$souscription_abonnement->numero_abonnement}}| {{$souscription_abonnement->abonnements->intitule}}|{{$souscription_abonnement->date_expiration}}|{{$souscription_abonnement->abonnements->montant}} | En attente |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent