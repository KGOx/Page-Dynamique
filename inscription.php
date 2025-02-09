<?php 
$metaDescription = "description de la page actuelle...";
$pageTitre = "Inscription";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php'; 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'traitementform.php';
?>
<h2>Inscription</h2>

<form action="traitementform.php" method="POST">
    <div>
        <label for="inscription_pseudo">Nom d'utilisateur :</label>
        <input type="text" id="inscription_pseudo" name="inscription_pseudo" placeholder="Jean Louis" minlength="2" maxlength="255" required>
    </div>

    <div>
        <label for="inscription_email">E-mail :</label>
        <input type="email" id="inscription_email" name="inscription_email" placeholder="JeanlouisBrogniard@hotmail.fr" required>
    </div>

    <div>
        <label for="inscription_mdp">Mot de passe :</label>
        <input type="password" id="inscription_mdp" name="inscription_mdp" placeholder="motdepassebidon" minlength="8" maxlength="72" required>
    </div>
    <div>
        <label for="inscription_verification_mdp">Confirmez le mot de passe :</label>
        <input type="password" id="inscription_verification_verifmdp" name="inscription_verification_verifmdp" placeholder="motdepassebidonverif" minlength="8" maxlength="72" required>
    </div>
   

    <input type="submit" value="Envoyer">
</form>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>