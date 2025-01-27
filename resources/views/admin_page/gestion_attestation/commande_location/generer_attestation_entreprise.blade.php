<html>

<head>
    <title>
        Attestation de Service Rendu
    </title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header-logo {
            width: 100px;
        }

        .header-text {
            display: inline-block;
            vertical-align: top;
            margin-left: 10px;
        }

        .header-text h1 {
            font-size: 24px;
            margin: 0;
        }

        .header-text p {
            margin: 0;
            font-size: 12px;
        }

        .title {
            text-align: center;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .info-table {
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 5px;
        }

        .service-table {
            width: 100%;
            border-collapse: collapse;
        }

        .service-table th,
        .service-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        .service-table th {
            background-color: #f2dede;
        }

        .service-table .large-cell {
            height: 100px;
            /* Adjust the height as needed */
        }

        .signature-section {
            margin-top: 40px;
        }

        .signature-section div {
            display: inline-block;
            width: 45%;
            text-align: center;
        }

        .signature-section p {
            margin-top: 60px;
        }
    </style>
</head>

<body>
    <div class="header">
        <img alt="Company Logo" class="header-logo" height="50"
            src="https://cbs-cameroun.com/assets/img/img_site/logo_slogan_2.png"
            width="100" />
        <div class="header-text">
            <h1>
                CAR BOOKING SERVICES SARL
            </h1>
            <p>
                Location de véhicules - Prestations de services automobiles - Conseils et Assistance diverses
            </p>
        </div>
    </div>
    <p class="text-end" style="margin-top: 50px;">
        Douala, le {{ $date }}
    </p>
    <h2 class="title" style="margin-top: 50px;">
        ATTESTATION DE SERVICE RENDU N°{{$attestation->id}} Du {{ date('d/m/Y') }}
    </h2>
    <table class="info-table">
        <tr>
            <td>
                <strong>
                    CLIENT :
                </strong>
                {{$attestation->commandes->users->name}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    N° Commande de location :
                </strong>
                {{$attestation->commandes->numero_commande}}
            </td>
        </tr>
        <!-- <tr>
            <td>
                <strong>
                    IMMATRICULATION :
                </strong>
                {{$attestation->commandes->immatriculation}}
            </td>
        </tr>
        <tr>
            <td>
                <strong>
                    KILOMETRAGE :
                </strong>
                {{$attestation->commandes->kilometrage}} KM
            </td>
        </tr> -->
        <tr>
            <td>
                <strong>
                    DATE :
                </strong>
                {{ date('d/m/Y') }}
            </td>
        </tr>
    </table>
    <table class="service-table">
        <thead>
            <tr>
                <th>
                   Intitulé du véhicule
                </th>
                <th>
                    Statuts
                </th>
                <th>
                    Observations
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="large-cell">
                    &nbsp;
                </td>
                <td class="large-cell">
                    &nbsp;
                </td>
                <td class="large-cell">
                    &nbsp;
                </td>
            </tr>
        </tbody>
    </table>
    <div class="signature-section" style="margin-top: 200px;">
        <div>
            <p>
                AGENT CBS
            </p>
            <p>
                (Signature et cachet avec la mention livrée conforme)
            </p>
        </div>
        <div>
            <p>
                AGENT {{$attestation->commandes->users->name}}
            </p>
            <p>
                (Signature et cachet avec la mention réceptionnée conforme)
            </p>
        </div>
    </div>
</body>

</html>