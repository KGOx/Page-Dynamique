<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header('Location: connexion.php');
    exit();
}
session_destroy(); // Supprime la session
header("Location: index.php"); // Redirige vers l'accueil
exit();
