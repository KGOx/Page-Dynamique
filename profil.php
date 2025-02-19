<?php 
session_start();
echo "ID Utilisateur : " . ($_SESSION["user_id"] ?? "Non connecté");
$metaDescription = "description de la page actuelle...";
$pageTitre = "Mon Premier Modèle de Page Dynamique";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php'; ?>



<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>