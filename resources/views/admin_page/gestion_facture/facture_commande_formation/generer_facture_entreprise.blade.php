<!DOCTYPE html>
<html>

<head>
    <title>Invoice PDF</title>
</head>
<style type="text/css">
    body {
        font-family: 'Roboto Condensed', sans-serif;
    }

    .m-0 {
        margin: 0px;
    }

    .p-0 {
        padding: 0px;
    }

    .pt-5 {
        padding-top: 5px;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100%;
    }

    .w-50 {
        width: 50%;
    }

    .w-85 {
        width: 85%;
    }

    .w-15 {
        width: 15%;
    }

    .logo img {
        width: 45px;
        height: 45px;
        padding-top: 30px;
    }

    .logo span {
        margin-left: 8px;
        top: 19px;
        position: absolute;
        font-weight: bold;
        font-size: 25px;
    }

    .gray-color {
        color: #5D5D5D;
    }

    .text-bold {
        font-weight: bold;
    }

    .border {
        border: 1px solid black;
    }

    table tr,
    th,
    td {
        border: 1px solid #d2d2d2;
        border-collapse: collapse;
        padding: 7px 8px;
    }

    table tr th {
        background: #F4F4F4;
        font-size: 15px;
    }

    table tr td {
        font-size: 13px;
    }

    table {
        border-collapse: collapse;
    }

    .box-text p {
        line-height: 10px;
    }

    .float-left {
        float: left;
    }

    .total-part {
        font-size: 16px;
        line-height: 12px;
    }

    .total-right p {
        padding-right: 20px;
    }
</style>

<body>
    <div class="add-detail mt-10">
        <div class="w-50 float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">N° Facture - <span class="gray-color">#CL{{$facture->id}}</span></p>
            <p class="m-0 pt-5 text-bold w-100">N° Commande - <span class="gray-color">{{$facture->commande_formations->numero_commande}}</span></p>
            <p class="m-0 pt-5 text-bold w-100">Date de commande - <span class="gray-color">{{$facture->commande_formations->created_at}}</span></p>
        </div>
        <div class="">
            <img src="https://cbs-cameroun.com/img_site/logo_first.png" width="120" height="100">
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Entreprise</th>
                <th class="w-50">Client</th>
            </tr>
            <tr>
                <td>
                    <div class="box-text">
                        <p>Car Booking services</p>
                        <p>Adresse : Bonapriso - Douala</p>
                        <p>Email : hello@cbs-cameroun.com</p>
                        <p>Contact : +237 659826528 / +237 653100205</p>
                    </div>
                </td>
                <td>
                    <div class="box-text">
                        <p>Nom de l'entreprise : {{$facture->commande_formations->users->name}}</p>
                        <p>BP: {{$facture->commande_formations->users->boite_postale}}</p>
                        <p>Adresse : {{$facture->commande_formations->users->adresse}}</p>
                        <p>Email : {{$facture->commande_formations->users->email}}</p>
                        <p>Tel : {{$facture->commande_formations->users->tel}}</p>
                        <p>SIRET : {{$facture->commande_formations->users->siret}}</p>
                        <p>SIREN : {{$facture->commande_formations->users->siren}}</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Mode de paiement</th>
                <!-- <th class="w-50">Shipping Method</th> -->
            </tr>
            <tr class="text-center">
                <td>{{$facture->commande_formations->mode_paiements->intitule}}</td>
                <!-- <td>Free Shipping - Free Shipping</td> -->
            </tr>
        </table>
    </div>
    <div class="table-section bill-tbl w-100 mt-10">
        <table class="table w-100 mt-10">
            <tr>
                <th class="w-50">Intitule de formation</th>
                <th class="w-50">Heure de début</th>
                <th class="w-50">Heure de fin</th>
                <th class="w-50">Nbre de place</th>
                <th class="w-50">Tarif / place</th>
                <th class="w-50">Date de formation</th>
                <th class="w-50">Etat de la commande</th>
                <th class="w-50">Etat de paiement</th>
            </tr>
            <tr align="center">
                <td>{{$facture->commande_formations->formations->theme}}</td>
                <td>{{$facture->commande_formations->formations->heure_debut}}</td>
                <td>{{$facture->commande_formations->formations->heure_fin}}</td>
                <td>{{$facture->commande_formations->nb_place_commande}}</td>
                <td>{{$facture->commande_formations->formations->montant}} FCFA</td>
                <td>{{$facture->commande_formations->formations->date_formation}}</td>
                <td>@if($facture->commande_formations->etat_commande == 'attente') <span class="badge bg-secondary">En attente</span> @elseif($facture->commande_formations->etat_commande == 'canceled') <span class="label label-danger">Annulé</span> @else <span class="label label-success">Validé</span> @endif</td>
                <td>@if($facture->commande_formations->etat_paiement == 'yes') Payée @else Non payée @endif</td>
            </tr>
            <tr>
                <td colspan="8">
                    <div class="total-part">
                        <div class="total-left w-85 float-left" align="right">
                            <p>Total : </p>
                        </div>
                        <div class="total-right float-left text-bold" align="right">
                            <p>{{$facture->commande_formations->montant_total}} FCFA</p>
                        </div>
                        <div style="clear: both;"></div>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="add-detail mt-10">
        <div class="float-left mt-10">
            <p class="m-0 pt-5 text-bold w-100">Le délai de contestation de cette facture est de 30 jours. Passé ce délai, Elle est réputé conforme et dû.</p>
            <p class="m-0 pt-5 text-bold w-100">Merci pour la confiance,</p>
            <p class="m-0 pt-5 text-bold w-100">Team CBS</p>
        </div>
    </div>

</html>