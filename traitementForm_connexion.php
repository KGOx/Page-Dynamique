<?php
session_start(); // Démarrer la session

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=bdd_projet_web;charset=utf8", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération et sécurisation des données
    $identifiant = trim($_POST["connexion_pseudo"]);
    $motDePasse = $_POST["connexion_motDePasse"];

    if (empty($identifiant) || empty($motDePasse)) {
        die("Tous les champs doivent être remplis.");
    }

    // Vérifier si l'utilisateur existe (email ou nom d'utilisateur)
    $stmt = $pdo->prepare("SELECT * FROM t_utilisateur_uti WHERE uti_email = :identifiant OR uti_pseudo = :identifiant");
    $stmt->execute(["identifiant" => $identifiant]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Vérification du mot de passe haché
        if (password_verify($motDePasse, $user["uti_motdepasse"])) {
            // Connexion réussie, on enregistre l'utilisateur en session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["uti_pseudo"] = $user["uti_pseudo"];
            $_SESSION["uti_email"] = $user["uti_email"];

            echo "Connexion réussie ! Redirection...";
            header("Location: connexion_granted.php"); // Redirige vers le tableau de bord
            exit();
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Aucun compte trouvé avec cet identifiant.";
    }
}
?>
