<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'connexion_bdd.php';

function enregistrer_utilisateur($inscription_pseudo, $inscription_email, $inscription_mdp)
{
    try
    {
        // Instancier la connexion à la base de données.
        $pdo = connexion_bdd();

        $MotdepasseCrypted = password_hash($inscription_mdp, PASSWORD_DEFAULT);

        // La requête permettant d'ajouter un nouvel utilisateur à la table "t_utilisateur_uti".
        $requete = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_email, uti_motdepasse) VALUES (:pseudo, :email, :motdepasse)";

        // Préparer la requête SQL.
        $stmt = $pdo->prepare($requete);

        // Lier les variables aux marqueurs :
        $stmt->bindValue(':pseudo', $inscription_pseudo, PDO::PARAM_STR);
        $stmt->bindValue(':email', $inscription_email, PDO::PARAM_STR);
        $stmt->bindValue(':motdepasse', $MotdepasseCrypted, PDO::PARAM_STR);

        // Exécuter la requête.
        $stmt->execute();

        return true;
    }
    catch(PDOException $e)
    {
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
        return false;
    }
}
?>