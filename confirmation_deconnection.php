<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$metaDescription = "Déconnexion réussie.";
$pageTitre = "Déconnexion";

require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once 'gestionAuthentification.php';
if (est_connecte()) {
    header('Location: profil.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déconnexion</title>
    <meta http-equiv="refresh" content="5;url=connexion.php"> <!-- Redirection automatique -->
</head>
<body>
    <h1>Vous avez bien été déconnecté.</h1>
    <p>Merci de votre visite, à bientôt !</p>
    <p>Vous allez être redirigé dans quelques secondes...</p>
</body>
</html>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
