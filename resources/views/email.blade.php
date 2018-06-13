<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <p>Bonjour <i>{{ $user->prenom }} {{ $user->nom }}</i>,</p>
        <p>
            Une nouvelle demande d'intérvention vous a été soumise:
        </p>

        <div class="links">
            <p>Vous pouvez:
                <a href="http://localhost/ProjWeb-Back/public/api/soumissions/{requete_id}/{junior_id}/{hash}">Accepter</a>
                 ou
                <a href="http://localhost/ProjWeb-Back/public/api/soumissions/{requete_id}/{junior_id}/{hash}">Refuser</a>
            </p>
        </div>

        <p>
            Avec nos meilleures salutations,
        </p>
        <p>
            L'équipe de GénérationConnect
        </p>
    </body>
</html>
