<?php
session_start();
require_once '../models/UserModel.php';
require_once '../controllers/AuthController.php';
?>

<link rel="stylesheet" href="../public/style.css">

<h2 class="logo"><b>L<span>o</span>g<span>i</span>n</b></h2>
<section class="formulaire">
<form action="../controllers/AuthController.php" method="POST">

    <?php
    // Vérifier s'il y a des erreurs de registre
    if (isset($_GET['reg_err'])) {
        $reg_err = $_GET['reg_err'];
        if ($reg_err == 'input_length') {
            echo '<p class="error">Les champs doivent avoir une longueur maximale de 255 caractères.</p>';
        } elseif ($reg_err == 'email') {
            echo '<p class="error">Veuillez saisir une adresse e-mail valide.</p>';
        } elseif ($reg_err == 'password') {
            echo '<p class="error">Les mots de passe ne correspondent pas.</p>';
        } elseif ($reg_err == 'already') {
            echo '<p class="error">Cet utilisateur existe déjà.</p>';
        }
    }
    ?>

    <div>
        <label for="login"></label>
        <input type="email" name="login" id="login" required>
    </div>

    <div>
        <label for="prenom"></label>
        <input type="text" name="prenom" id="prenom" required>
    </div>

    <div>
        <label for="password"></label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="password_retype"></label>
        <input type="password" name="password_retype" id="password_retype" required>
    </div>

    <button type="submit" name="register" class="rainbow-button">S'inscrire</button>

</form>
<a href="login_form.php">connexion</a>
</section>

<?php
$Auth = new AuthController();
?>