<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Email</title>
</head>
<body>
    Bonjour, {{ $nom }}

Détail de l'email
Nom : {{ $nom }}
Email : {{ $email }}
Téléphone : {{ $telephone }}
Sujet : {{ $sujet }}
Message : {!! $contenu !!}
Merci
</body>
</html>
