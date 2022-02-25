<?php

//Check if credentials are valid
include "./lib/functions.php";
require "./Classe/DB.php";

if (issetPostParams('username', 'password')) {
    $bdd = DB::getInstance();

    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    // je récupère que le nom de l'utilisateur
    $stmt = $bdd->prepare("SELECT * FROM user WHERE username = '$username'");

    $stmt->execute();

    foreach ($stmt->fetchAll() as $user) {
        // Je vérifie que le mdp cripté sur ma base de donnée que j'ai récupéré grace à la boucle '$user['password']' correpond au mdp entré par l'utilisateur
        if (password_verify($password, $user['password'])) {
            // Si les 2 mdp correspondent alors on ouvre la session et on stocke les données de l'utilisateur dans une session.
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $user['email'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];

            // on redirige l'utilisateur à la page bienvenue.
            header("Location: bienvenue.php");
        }
        else {
            echo '<body onLoad="alert(\'Membre non reconnu !\')">';
            echo '<meta http-equiv="refresh" content="0;URL=login.php">';
        }
    }
}
else {
    echo "Aucun compte associé à ce nom d'utilistaur ou mot de passe";
}
