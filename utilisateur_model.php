<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'connexion_bdd.php';

// Les données provenant d'un formulaire d'inscription simplifié.
print_r($_POST);

try
{
    // Instancier la connexion à la base de données.
    $pdo = connexion_bdd();

    // La requête permettant d'ajouter un nouvel utilisateur à la table "t_utilisateur_uti".
    $requete = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_email, uti_motdepasse) VALUES (:pseudo, :email, :motdepasse)";

    // Préparer la requête SQL.
    $stmt = $pdo->prepare($requete);

    // Lier les variables aux marqueurs :
    $stmt->bindValue(':pseudo', $_POST['inscription_pseudo'], PDO::PARAM_STR);
    $stmt->bindValue(':email', $_POST['inscription_email'], PDO::PARAM_STR);
    $stmt->bindValue(':motdepasse', $_POST['inscription_mdp'], PDO::PARAM_STR);

    // Exécuter la requête.
    $stmt->execute();
}
catch(PDOException $e)
{
    echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
}
?>