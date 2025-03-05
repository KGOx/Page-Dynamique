<?php 
session_start();
if (!isset($_SESSION["user_id"])) {
    header('Location: connexion.php');
    exit();
}
$metaDescription = "description de la page actuelle...";
$pageTitre = "Mon Premier Modèle de Page Dynamique";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php';
require_once 'connexion_bdd.php';
$pdo = connexion_bdd(); // Connexion à la BDD
if (!$pdo) {
    die("Erreur : Impossible de se connecter à la base de données.");
}

$uti_pseudo = $_SESSION["user_id"] ?? '';
// Récupération de l'ID utilisateur depuis la session
$user_id = $_SESSION["user_id"];

// Requête SQL pour récupérer les informations de l'utilisateur
$stmt = $pdo->prepare("SELECT uti_pseudo, uti_email FROM t_utilisateur_uti WHERE uti_pseudo = :pseudo");
$stmt->execute(['pseudo' => $uti_pseudo]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<h2>Profil</h2>

<p>Bonjour <strong><?= htmlspecialchars($user['uti_pseudo'] ?? 'Non renseigné') ?></strong> !</p>

<table>
    <tr>
        <td><strong>Email :</strong></td>
        <td><?= htmlspecialchars($user['uti_email'] ?? 'Non renseigné') ?></td>
    </tr>
    <tr>
        <td><strong>Pseudo :</strong></td>
        <td><?= htmlspecialchars($user['uti_pseudo'] ?? 'Non renseigné') ?></td>
    </tr>
</table>

<form action="logout.php" method="post">
    <button type="submit">Déconnexion</button>
</form>


<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>