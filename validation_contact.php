<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Vérifie si le formulaire a bien été soumis
if (!isset($_SESSION['form_data'])) {
    header('Location: index.php'); // Redirige vers l'accueil si accès direct
    exit();
}

// Récupère les données enregistrées
$nom = htmlspecialchars($_SESSION['form_data']['Nom'] ?? '');
$email = htmlspecialchars($_SESSION['form_data']['E-Mail'] ?? '');

// Efface les données de session après confirmation
unset($_SESSION['form_data']);

$metaDescription = "Votre message a bien été envoyé.";
$pageTitre = "Confirmation de l'envoi du message";

require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message envoyé</title>
    <meta http-equiv="refresh" content="7;url=index.php"> <!-- Redirection automatique -->
</head>
<body>
    <h1>Merci, <?= $nom ?> !</h1>
    <p>Votre message a bien été envoyé.</p>
    <p>Nous vous contacterons bientôt à l'adresse <?= $email ?>.</p>
    <p>Vous serez redirigé vers l'accueil dans quelques secondes...</p>
</body>
</html>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
