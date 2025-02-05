<?php
function connexion_bdd(): ?PDO
{
    $nomDuServeur = "localhost";
    $nomUtilisateur = "root";
    $motDePasse = "";
    $nomBDD = "bdd_projet_web";

    try
    {
        // Instancier une nouvelle connexion.
        $pdo = new PDO("mysql:host=$nomDuServeur;dbname=$nomBDD", $nomUtilisateur, $motDePasse);

        // Définir le mode d'erreur sur "exception".
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retourner l'objet PDO après la connexion.
        return $pdo;
    }
    catch(PDOException $e)
    {
        // Relancer l'exception pour qu'elle soit capturée par le bloc "try/catch" parent.
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
    }
}
?>