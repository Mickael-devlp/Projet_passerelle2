<?php 
session_start();

$page = $_GET['page'] ?? 'home';

// Inclure le header en dur dans toute les pages sans le mettre dans switch
require('views/templates/header.php');


// On va mettre un switch pour que ça charge la page demandé

switch ($page) {

// Chaque case correspondra à une page que j'appelerai.

    case 'livre_mesbg_v6':
        $title = "MESBG V6";
        require('views/templates/livre_mesbg_v6.php');
        break;

    case 'livre_mesbg_v7':
        $title = "MESBG V7";
        require('views/templates/livre_mesbg_v7.php');
        break;

    case 'video':
        $title = "Vidéos";
        // require('views/templates/video.php'); Pour une raison inconnu, sans le DIR ce lien ne fonctionne pas
        require(__DIR__ . '/views/templates/video.php');
        break;
    
    case 'rapportBataille':
        $title = "Rapport de Battaille";
        require('views/templates/rapportBataille.php');
        break;

    case 'tactica':
        $title = "tactica";
        require('views/templates/tactica.php');
        require('views/templates/commentaire.php');
        break;

    case 'connexion':
        $title = "Connexion";
        require('views/templates/connexion.php');
        break;
        


// Par défaut ça sera toujours Home que l'on appelera
    default:
        $title = "Accueil"; 
        require('views/templates/home.php');

}

// Inclure le footer en dur
require ('views/templates/footer.php');



/*  */
?>