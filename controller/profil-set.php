<?php
session_start();
require_once '../model/connect-bdd.php'; // On inclut la connexion à la base de données
// si la session existe pas soit si l'on est pas connecté on redirige
if (!isset($_SESSION['user'])) {
    header('Location:../index.php');
    die();
}

// On récupere les données de l'utilisateur
$req = $bdd->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>
