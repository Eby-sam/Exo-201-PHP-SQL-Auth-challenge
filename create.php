<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Randonnées, ajout</title>
        <link rel="stylesheet" href="css/basics.css">
    </head>
    <body>
    <form method="post" action="./public/createHiking.php">
        <input type="text" name="name" placeholder="Nom de la randonnée" required>
        <select name="difficulty" id="difficulty" required>
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très difficile">Très difficile</option>
        </select>
        <input type="number" name="distance" placeholder="Distance (km)" required>
        <input type="time" name="duration" required>
        <input type="number" name="height_difference" placeholder="Dénivelé (m)" required>
        <input type="text" name="available" placeholder="Available">
        <input id="enter" type="submit" name="Enter" value="ajouter">
    </form>
    </body>
    </html>

    <?php
}