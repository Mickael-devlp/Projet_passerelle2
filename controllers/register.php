<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=user_mesbg;charset=utf8;', 'root', '',);

if (isset($_POST['register'])) {
    

    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['pseudonyme'])) {

    // Création de mes variables
        $email = htmlspecialchars($_POST['email']);
        $pseudonyme = htmlspecialchars($_POST['pseudonyme']);
        $password = $_POST['password'];

        if (strlen($password) < 6) {
            header("Location: ../connexion.php?error=password");
            exit;
        }

        $checkUser = $bdd->prepare("SELECT id FROM users WHERE email = ?");
        $checkUser->execute([$email]);

        if ($checkUser->rowCount() > 0) {
            die("Cet email est déjà utilisé.");
        }
// Système de chiffrement meilleur que sha1, à test
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $insertUser = $bdd->prepare("INSERT INTO users(pseudonyme, email, password) VALUES(?, ?, ?)");
        $insertUser->execute([$pseudonyme, $email, $hash]);

        $_SESSION['id'] = $bdd->lastInsertId();
        $_SESSION['email'] = $email;
        $_SESSION['pseudonyme'] = $pseudonyme;

        header("Location: /MESBG/index.php");
        // echo "Redirection vers index...";
        exit;

    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>

