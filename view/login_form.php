<?php
session_start();
require_once '../models/UserModel.php';
require_once '../controllers/AuthController.php';
?>


<form action="../controllers/AuthController.php" method="POST">
    <h2 class="logo">Connexion</h2>

    <?php
    // Vérifier s'il y a des erreurs de registre
    // if (isset($_GET['reg_err'])) {
    //     $reg_err = $_GET['reg_err'];
    //     if ($reg_err == 'input_length') {
    //         echo '<p class="error">Les champs doivent avoir une longueur maximale de 255 caractères.</p>';
    //     } elseif ($reg_err == 'email') {
    //         echo '<p class="error">Veuillez saisir une adresse e-mail valide.</p>';
    //     } elseif ($reg_err == 'password') {
    //         echo '<p class="error">Les mots de passe ne correspondent pas.</p>';
    //     } elseif ($reg_err == 'not_exist') {
    //         echo '<p class="error">Utilisateur introuvable.</p>';
    //     }        
    // }
    ?>

    <div>
        <label for="login">Adresse e-mail :</label>
        <input type="email" name="login" id="login" required>
    </div>

    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="password_retype">Confirmer le mot de passe :</label>
        <input type="password" name="password_retype" id="password_retype" required>
    </div>

    <button type="submit" name="login">connexion</button>
    <a href="register_form.php">S'inscrire</a>

</form>


<?php
$Auth = new AuthController();
?>