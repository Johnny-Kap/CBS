@component('mail::message')
<h2>Bonjour chèr(e) {{$paiement_achat_livraison_valide->users->name}} {{$paiement_achat_livraison_valide->users->prenom}},</h2>
<p>Le paiement de votre commande d'achat et livraison N°{{$paiement_achat_livraison_valide->numero_commande}} a été validée avec succès</p>
<p>Cette comande est désormais disponible. Vous pouvez dès à présent passer récupérer votre véhicule.</p>

<p>Voici les détails de votre commande :</p>

@component('mail::table')
| N° commande                                         | Type de prestation                                    | Date de livraison                                  | Montant                                          | Etat de paiement |
| ----------------------------------------------------|:-----------------------------------------------------:|:--------------------------------------------------:|:------------------------------------------------:|:----------------:|
|{{$paiement_achat_livraison_valide->numero_commande}}| {{$paiement_achat_livraison_valide->type_prestation}} |{{$paiement_achat_livraison_valide->date_livraison}}|{{$paiement_achat_livraison_valide->montant}} FCFA| Payé             |

@endcomponent

Cordialement !<br>

Merci pour la confiance,<br>
Equipe CBS.
@endcomponent