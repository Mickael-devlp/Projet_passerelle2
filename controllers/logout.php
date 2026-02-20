<?php
session_start();

// Supprime toutes les variables de session
$_SESSION = [];

// Détruit la session
session_destroy();

// Pour détruire les cookies des emails et pseudo
setcookie('user_email', '', time() - 3600, "/");
setcookie('user_pseudo', '', time() - 3600, "/");

// Redirection vers la page d'accueil
header("Location: /MESBG/index.php");
exit;

// test pour voir si une cession est bien détruite, commentez le header pour test
// echo "Session détruite";
// var_dump($_SESSION);
// exit;


?>




