<?php 
$metaDescription = "Connexion au compte";
$pageTitre = "Connexion";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php'; 
require_once 'gestionAuthentification.php';

if (est_connecte()) {
    header('Location: profil.php');
    exit();
}
?>
<h2>Connexion</h2>

<form method="post" action="traitementForm_connexion.php"> <!-- traitementForm_connexion.php sera le script pour traiter la connexion -->
    <div>
        <label for="connexion_pseudo">Nom d'utilisateur ou E-mail :</label>
        <input type="text" id="connexion_pseudo" name="connexion_pseudo" placeholder="Biohazar" minlength="2" maxlength="255" required>
    </div>

    <div>
        <label for="connexion_motDePasse">Mot de passe :</label>
        <input type="password" id="connexion_motDePasse" name="connexion_motDePasse" placeholder="Votre mot de passe" minlength="8" maxlength="72" required>
    </div>
    <p><a href="mot_de_passe_oublie.php">Mot de passe oublié ?</a></p> <!-- Lien pour réinitialiser le mot de passe -->

    <input type="submit" value="Se connecter">
    <p><a href="inscription.php">S'inscrire</a></p>
</form>


<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>