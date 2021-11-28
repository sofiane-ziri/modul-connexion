<?php
    session_start(); // Démarrage de la session
    require_once 'connect-bdd.php'; // On inclut la connexion à la base de données

var_dump($_SESSION);

session_destroy()
?>