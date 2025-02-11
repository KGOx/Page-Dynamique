<?php
session_start();

// Affiche un message si nécessaire
// if (!isset($_SESSION['form_data'])) {
//     header('Location: index.php'); // Redirige vers l'accueil si accès direct
//     exit();
// }

// Affiche les données enregistrées (facultatif, pour démonstration)
$nom = htmlspecialchars($_SESSION['form_data']['Nom'] ?? '');
$email = htmlspecialchars($_SESSION['form_data']['E-Mail'] ?? '');

// Efface les données de session après confirmation
unset($_SESSION['form_data']);

$metaDescription = "description de la page actuelle...";
$pageTitre = "Confirmation";

require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
    <meta http-equiv="refresh" content="777;url=index.php"> <!-- Redirection automatique -->
</head>
<body>
    <h1>Merci pour votre inscription, <?= $nom ?> !</h1>
    <p>Un email a été envoyé à <?= $email ?> pour confirmer votre compte.</p>
    <p>Vous serez redirigé vers la page d'accueil dans quelques secondes...</p>
</body>
</html>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>