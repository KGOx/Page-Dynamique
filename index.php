<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$metaDescription = "Page d'accueil du site";
$pageTitre = "Accueil";
require_once __DIR__ . DIRECTORY_SEPARATOR . 'header.php'; ?>
<h2>Bienvenue sur votre site web !</h2>


<p>Coucou Julie. (C'est toi julien)</p>
<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime recusandae, enim voluptate ea optio iusto incidunt. Vel vero accusamus eligendi ab dolores, in doloremque, eveniet ipsa numquam eaque suscipit minus?</p>

<p>Modi ex consequatur aperiam, assumenda officiis quae neque laboriosam. Veniam quod laudantium ratione facilis, quidem unde quis consequatur! Cupiditate eaque vero asperiores dolorem cum rerum nam, voluptatem suscipit exercitationem fuga?</p>

<?php require_once __DIR__ . DIRECTORY_SEPARATOR . 'footer.php'; ?>
