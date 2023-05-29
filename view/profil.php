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
    <title>Document <?php echo($_users) ?></title>
</head>
<body>
    <h1>bonjour</h1>
    <form method="post">
    <button type="submit" name="logout">Déconnexion</button>
    </form>
   
</body>
</html>

<?php
$Auth = new AuthController();
if (isset($_POST['logout'])){
    $Auth->logout();
}
?>