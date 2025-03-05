
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metaDescription?>">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title><?=$pageTitre?></title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="image/Icone.png" alt="Accueil" style="width: 55px; height: 55px;">
                </a>
                <button class="navbar-toggler" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>

                        <?php if (!isset($_SESSION["user_id"])): ?> 
                            <li class="nav-item"><a class="nav-link" href="inscription.php">Inscription</a></li>
                            <li class="nav-item"><a class="nav-link" href="connexion.php">Connexion</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="profil.php">Mon profil</a></li>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script src="JavaScript/menu.js"></script>
    <main>
