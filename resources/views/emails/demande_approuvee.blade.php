<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande approuvée</title>
</head>
<body>
    <h2>Félicitations, {{ $demande->nom_complet }} !</h2>
    <p>Nous sommes heureux de vous informer que votre demande pour le service <strong>{{ $demande->service }}</strong> a été approuvée.</p>
    <p>Merci de votre patience.</p>
</body>
</html>
