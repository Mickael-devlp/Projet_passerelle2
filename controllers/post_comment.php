<?php
session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=user_mesbg;charset=utf8;', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

if (isset($_POST['contenu']) && !empty($_POST['contenu'])) {
    
    // On vérifie que l'utilisateur est bien connecté
    if (isset($_SESSION['user']['id'])) {
        
        // Nettoyage des données
        $contenu = htmlspecialchars($_POST['contenu']);
        $user_id = $_SESSION['user']['id'];
        
        // On récupère l'ID de l'article, INTVAL sert à sécurisé les données en particulier les ID (peut etre remplacé par : (int)$_POST['article_id']  )
        $article_id = isset($_POST['article_id']) ? intval($_POST['article_id']) : null;

        try {
            // Insertion dans la table, comme dans register
            $query = $bdd->prepare("INSERT INTO comments (contenu, user_id, article_id) VALUES (?, ?, ?)");
            $query->execute([$contenu, $user_id, $article_id]);

            // Redirection vers la page de l'article avec un succès
            header("Location: /MESBG/index.php?page=tactica&id=" . $article_id . "&status=comment_ok");
            exit;

        } catch (Exception $e) {
            // Affiche l'erreur SQL si l'insertion échoue
            die("Erreur SQL : " . $e->getMessage());
        }

    } else {
        // Redirige si l'utilisateur n'est pas connecté
        header("Location: /MESBG/index.php?page=connexion");
        exit;
    }
} else {
    // Si le champ est vide
    header("Location: " . $_SERVER['HTTP_REFERER']); // Retourne à la page précédente
    exit;
}