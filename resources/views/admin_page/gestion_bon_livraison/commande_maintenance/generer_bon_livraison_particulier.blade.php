<html>

<head>
    <title>
        Car Booking Services SARL
    </title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
        }

        .header h1 {
            font-size: 24px;
            margin-left: 10px;
        }

        .content {
            margin: 20px;
        }

        .content h2 {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }

        .content .details {
            margin-bottom: 20px;
        }

        .content .details p {
            margin: 0;
        }

        .content .details .right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="">
        <div class="header" style="margin-top: 20px;">
            <img alt="CBS logo" height="100" src="https://cbs-cameroun.com/assets/img/img_site/logo_slogan_2.png" width="100" />
            <h1 style="margin-top: 30px;">
                CAR BOOKING SERVICES SARL
            </h1>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <p>
                        Location de véhicules - Prestations de services automobiles - Conseils et Assistance diverses
                    </p>
                </div>
            </div>
            <div class="row" style="margin-top: 100px;">
                <div class="col-6">
                </div>
                <div class="col-6 text-end">
                    <p>
                        Nom(s) et Prénom(s) : {{$bon_livraison->commandes->users->name}} {{$bon_livraison->commandes->users->prenom}}
                    </p>
                    <p>
                        Email: {{$bon_livraison->commandes->users->email}}
                    </p>
                    <p>
                        Adresse : {{$bon_livraison->commandes->users->adresse}}
                    </p>
                    <p>
                        TEL: {{$bon_livraison->commandes->users->tel}}
                    </p>
                    <!-- <p>
                        SIRET: M0197000030909
                    </p>
                    <p>
                        SIREN: RC017755
                    </p> -->
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-12 text-start">
                    <p>
                        Douala, le {{$date}}
                    </p>
                </div>
            </div>
            <h2 style="margin-top: 50px;">
                BON DE LIVRAISON VEHICULE N° {{$bon_livraison->id}}/{{ date('m/Y') }}
            </h2>
            <div class="row">
                <div class="col-6">
                    <p>
                        VEHICULE : {{$bon_livraison->commandes->marque_vehicule}}
                    </p>
                    <p>
                        Immatriculation: {{$bon_livraison->commandes->immatriculation}}
                    </p>
                    <p>
                        Kilométrage : {{$bon_livraison->commandes->kilometrage}} KM
                    </p>
                </div>
                <div class="col-6">
                    <p>
                        DEVIS N°: CBS{{$bon_livraison->id}}/{{ date('m/Y') }}
                    </p>
                    <p>
                        Réf Bon de commande : @if($bon_livraison->commandes->etat_commande == 'yes') Validé @else En attente @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>