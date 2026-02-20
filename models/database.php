<!-- Connexion à la base de donnée -->

<?php
$pdo = new PDO('mysql:host=localhost;dbname=user_mesbg;charset=utf8;', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);