<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande rejetée</title>
</head>
<body>
    <h2>Bonjour {{ $demande->nom_complet }},</h2>
    <p>Nous regrettons de vous informer que votre demande pour le service <strong>{{ $demande->service }}</strong> a été rejetée.</p>
    <p>Nous vous remercions pour votre intérêt et vous encourageons à soumettre une nouvelle demande à l'avenir.</p>
    <p>Cordialement,</p>
    <p>L'équipe</p>
</body>
</html>
