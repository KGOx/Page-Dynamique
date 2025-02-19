<?php
session_start();

// Vérifie si l'utilisateur est bien connecté
if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit();
}

// Récupère les informations de session
$nomUtilisateur = htmlspecialchars($_SESSION["nom_utilisateur"]);
$email = htmlspecialchars($_SESSION["email"]);

// Efface les données de session si nécessaire
// unset($_SESSION["nom_utilisateur"], $_SESSION["email"]);

$metaDescription = "Connexion réussie.";
$pageTitre = "Bienvenue, $nomUtilisateur";

require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion réussie</title>
    <meta http-equiv="refresh" content="7;url=index.php">
</head>
<body>
    <h1>Bienvenue, <?= $nomUtilisateur ?> !</h1>
    <p>Vous êtes maintenant connecté.</p>
    <p>Vous serez redirigé vers l'accueil dans quelques secondes...</p>
</body>
</html>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
