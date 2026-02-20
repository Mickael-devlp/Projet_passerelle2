<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/defaut.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/images/favicon.ico" type="images/icon.ico">
    <title><?= $title ?? "Accueil" ?></title>
</head>
<body>
    <header class="image-header">
                <!-- logo à gauche -->
            <div class="header-left">
                <a href="index.php">
                    <img src="/MESBG/public/images/logo_poney.jpg" alt="logo" class="logo-left">
                </a>
            </div>
                <!-- Image au centre -->
            <div class="header-center">
                <img src="/MESBG/public/images/Title_header2.png" alt="Titre" class="header-main">
            </div>



            <!-- Là ou sont mes liens se co et s'inscrire et déco  -->
        <div class="header-right">
            <!-- Petite condition pour connaitre le statut si l'user est co ou non -->
            <?php if (isset($_SESSION['user'])): ?>
                <!-- Petit message de bienvenu, à styliser -->
                <span>Bienvenue <?= htmlspecialchars($_SESSION['user']['pseudonyme']) ?> !</span>
                <!-- Permet de se déconnecter direment sans passer par la page connexion pour se déco -->
                <a href="/MESBG/controllers/logout.php" class="btn-link">Se déconnecter</a>
            <?php else: ?>
                <!-- A styliser car moche, vraiment -->
                <a href="index.php?page=connexion" class="btn-link">Se connecter</a>
                <a href="index.php?page=inscription" class="btn-link">S’inscrire</a>
            <?php endif; ?>
        </div>
    </header>

    <section>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container justify-content-center">
                <ul class="navbar-nav menu-style">
                    <li class="nav-item mx-3"><a class="nav-link active" href="index.php">Accueil</a></li> 
                    <li class="nav-item mx-3"><a class="nav-link active" href="index.php?page=livre_mesbg_v6">MESBG V6</a></li> 
                    <li class="nav-item mx-3"><a class="nav-link active" href="index.php?page=livre_mesbg_v7">MESBG V7</a></li> 
                    <li class="nav-item mx-3"><a class="nav-link active" href="index.php?page=video">Les Vidéos</a></li> 
                    <li class="nav-item mx-3"><a class="nav-link active" href="index.php?page=rapportBataille">Les Rapports de Bataille</a></li> 
                    <li class="nav-item mx-3"><a class="nav-link active" href="index.php?page=tactica">L'Art de la Guerre</a></li> 
                    <!-- <li class="nav-item mx-3"><a class="nav-link active" href="index.php?page=connexion">Se Loguer</a></li>  -->
                </ul>
            </div>
        </nav>
    </section>
</body>
</html>
