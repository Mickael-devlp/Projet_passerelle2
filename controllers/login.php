<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=user_mesbg;charset=utf8;', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

if (isset($_POST['login'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];
        
        $selectUser = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $selectUser->execute([$email]);

        if ($selectUser->rowCount() > 0) {
            $user = $selectUser->fetch();

            if (password_verify($password, $user['password'])) {
                if (isset($_POST['remember'])) {
                    setcookie('user_email', $email, time() + 60*60*24*30, "/"); 
                    setcookie('user_pseudo', $user['pseudonyme'], time() + 60*60*24*30, "/"); 
                }

                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'pseudonyme' => $user['pseudonyme']
                ];

                header("Location: /MESBG/index.php");
                exit;

            } else {
                // Erreur de mot de passe
                header("Location: http://localhost/MESBG/index.php?page=connexion&login_error=wrong");
                exit;
            }
        } else {
            // Email inconnu
            header("Location: http://localhost/MESBG/index.php?page=connexion&login_error=wrong");
            exit;
        }
    } else {
        // Champs vides
        header("Location: http://localhost/MESBG/index.php?page=connexion&login_error=empty");
        exit;
    }
}
?>