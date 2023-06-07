<?php
session_start();
require_once '../models/UserModel.php';
require_once '../controllers/AuthController.php';

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user'])) {
    $prenom = $_SESSION['user']['prenom'];
} else {
    // Rediriger l'utilisateur vers la page de connexion s'il n'est pas connecté
    header('Location: login_form.php');
    exit();
}
$title = 'Profil';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document <?php echo $title ?></title>
</head>
<body>
    <h1>Bonjour, <?php echo $prenom; ?> !</h1>
    <form method="post">
    <button type="submit" name="logout">Déconnexion</button>
    </form>
</body>
</html>

<?php
// $Auth = new AuthController();
// if (isset($_POST['logout'])){
//     $Auth->logout();
// }
?>
