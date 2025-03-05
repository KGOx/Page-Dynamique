<?php 
session_start();
$metaDescription = "description de la page actuelle...";
$pageTitre = "Contact";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php'; 
require_once __DIR__ . DIRECTORY_SEPARATOR . 'traitementForm_contact.php'; 
?>
<h2>Contact</h2>

<form action="traitementForm_contact.php" method="post">
    <div>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="Nom" placeholder="Jean Louis" minlength="2" maxlength="255" required>
    </div>

    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="Prenom" placeholder="Brogniard" minlength="2" maxlength="255">
    </div>

    <div>
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="E-Mail" placeholder="JeanlouisBrogniard@hotmail.fr" required>
    </div>

    <div>
        <label for="message">Un p'tit message :</label>
        <textarea name="message" id="message" placeholder="Je vais te frapper si tu lis pas Julien" required minlength="10" maxlength="3000"></textarea>
    </div>

    <input type="submit" value="Envoyer">
</form>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
