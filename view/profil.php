<?php
session_start();
require_once '../models/UserModel.php';
require_once '../controllers/AuthController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>bonjour</h1>
    <button type="submit" name="logout">Déconnexion</button>
   
</body>
</html>

<?php
$Auth = new AuthController();
$Auth->logout();
?>