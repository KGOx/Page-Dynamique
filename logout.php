<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'gestionAuthentification.php';

deconnecter_utilisateur();
header("Location: confirmation_deconnection.php");
exit();
