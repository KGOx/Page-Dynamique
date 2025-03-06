<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Enregistre l'utilisateur dans la session
 *
 * @param string $id Identifiant de l'utilisateur (pseudo ou ID)
 */
function connecter_utilisateur(string $id)
{
    $_SESSION['user_id'] = $id;
}

/**
 * Vérifie si l'utilisateur est connecté
 * @return bool True si connecté, sinon False
 */
function est_connecte(): bool
{
    return isset($_SESSION['user_id']);
}

/**
 * Déconnecte l'utilisateur en supprimant la session
 */
function deconnecter_utilisateur()
{
    session_unset(); // Supprime toutes les variables de session
    session_destroy(); // Détruit la session
}
