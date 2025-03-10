<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

    valider_champ('Prenom', 'required', $erreurs, 'Le prénom est requis.');
    valider_champ('Prenom', 'minlength', $erreurs, 2);
    valider_champ('Prenom', 'maxlength', $erreurs, 255);

    valider_champ('E-Mail', 'required', $erreurs, 'L\'email est requis.');
    valider_champ('E-Mail', 'email', $erreurs, 'L\'adresse e-mail est invalide.');

    valider_champ('message', 'required', $erreurs, 'Le message est requis.');
    valider_champ('message', 'minlength', $erreurs, 10);
    valider_champ('message', 'maxlength', $erreurs, 3000);

    
    if (!empty($erreurs))
    {
        $_SESSION['erreurs'] = $erreurs;
        $_SESSION['old'] = $_POST;
        header('Location: contact.php');
        exit();
    }
    else
    {
        // Sauvegarde les données du formulaire dans une session
        $_SESSION['form_data'] = $_POST;
        
        $nom = $_POST['Nom'];
        $prenom = $_POST['Prenom'];
        $email = $_POST['E-mail'];
        $message = $_POST['Message'];

        // Traitement des cookies
        setcookie('nom', $_POST['Nom'], time() + 3600, '/');
        setcookie('prenom', $_POST['Prenom'], time() + 3600, '/');
        setcookie('email', $_POST['E-Mail'], time() + 3600, '/');
        setcookie('message', $_POST['Message'], time() + 3600, '/');
            
        header('Location: validation_contact.php');
        exit();
     }
};
?>