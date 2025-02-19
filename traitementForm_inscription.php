<?php
require_once 'utilisateur_model.php';
session_start();

function valider_champ($champ, $regle, &$erreurs, $message) 
    {
        if (!isset($_POST[$champ]) || empty(trim($_POST[$champ]))) 
        {
            if ($regle === 'required') {
                $erreurs[$champ] = $message;
            }
        } 
        else 
        {
            if ($regle === 'minlength' && strlen(trim($_POST[$champ])) < $message) 
            {
                $erreurs[$champ] = "Doit contenir au moins $message caractères.";
            } 
            elseif ($regle === 'maxlength' && strlen(trim($_POST[$champ])) > $message) 
            {
                $erreurs[$champ] = "Ne doit pas dépasser $message caractères.";
            } 
            elseif ($regle === 'email' && !filter_var($_POST[$champ], FILTER_VALIDATE_EMAIL)) 
            {
                $erreurs[$champ] = "L'email n'est pas valide.";
            }
        }
    }

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $erreurs = [];

    valider_champ('Nom', 'required', $erreurs, 'Le nom est requis.');
    valider_champ('Nom', 'minlength', $erreurs, 2);
    valider_champ('Nom', 'maxlength', $erreurs, 255);

    valider_champ('E-Mail', 'required', $erreurs, 'L\'email est requis.');
    valider_champ('E-Mail', 'email', $erreurs, 'L\'adresse e-mail est invalide.');

    valider_champ('inscription_mdp', 'required', $erreurs, 'Le mot de passe est requis.');
    valider_champ('inscription_mdp', 'minlength', $erreurs, 8);
    valider_champ('inscription_mdp', 'maxlength', $erreurs, 72);

    if ($_POST['inscription_mdp'] !== $_POST['inscription_verification_verifmdp']) 
    {
        $erreurs['inscription_verification_verifmdp'] = "Les mots de passe ne correspondent pas.";
    }
    
    if (!empty($erreurs))
    {
        $_SESSION['erreurs'] = $erreurs;
        $_SESSION['old'] = $_POST;

        exit();
    }
    else
    {
        // Sauvegarde les données du formulaire dans une session
        $_SESSION['form_data'] = $_POST;

        $inscription_pseudo = $_POST['Nom'];
        $inscription_email = $_POST['E-Mail'];
        $inscription_mdp = $_POST['inscription_mdp'];

        $result = enregistrer_utilisateur($inscription_pseudo, $inscription_email, $inscription_mdp);

        if ($result)
        {
            // Traitement des cookies
            setcookie('nom', $_POST['Nom'], time() + 3600, '/');
            setcookie('prenom', $_POST['Prenom'], time() + 3600, '/');
            setcookie('email', $_POST['E-Mail'], time() + 3600, '/');
            header('Location: confirmation.php');
            exit();
        }
     }
};
?>