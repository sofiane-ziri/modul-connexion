<?php

require_once '../models/UserModel.php';

class AuthController
{
    private $bdd;
// Fonction de connexion a la base de données
    public function __construct()
    {
        $dbConnection = new DatabaseConnection();
        $this->bdd = $dbConnection->getConnection();
    }
// fonction d'inscription
    public function register()
    {
        
        if (isset($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['password'], $_POST['password_retype'])) {
            $login = trim($_POST['login']);
            $prenom = trim($_POST['prenom']);
            $nom = trim($_POST['nom']);
            $password = trim($_POST['password']);
            $password_retype = trim($_POST['password_retype']);

            $maxInputLength = 255;
            if (strlen($login) > $maxInputLength || strlen($prenom) > $maxInputLength || strlen($nom) > $maxInputLength) {
                header('Location: ../view/register_form.php?reg_err=input_length');
                die();
            }

            $login = htmlspecialchars($login);
            $prenom = htmlspecialchars($prenom);
            $nom = htmlspecialchars($nom);
            $login = strtolower($login);

            if (!filter_var($login, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../view/register_form.php?reg_err=email');
                die();
            }

            $check = $this->bdd->prepare('SELECT login FROM utilisateurs WHERE login = ?');
            $check->execute(array($login));
            $row = $check->rowCount();

            if ($row == 0) {
                if ($password === $password_retype) {
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                    $insert = $this->bdd->prepare('INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (:login, :prenom, :nom, :password)');
                    $insert->execute(array(
                        'login' => $login,
                        'prenom' => $prenom,
                        'nom' => $nom,
                        'password' => $password,
                    ));

                    header('Location: ../view/login_form.php?reg_err=success');
                    die();
                } else {
                    header('Location: ../view/register_form.php?reg_err=password');
                    die();
                }
            } else {
                header('Location: ../view/register_form.php?reg_err=already');
                die();
            }
        }
    }
// fonction de connexion 
    public function login()
    {
        if (isset($_POST['login'], $_POST['password'], $_POST['password_retype'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $password_retype = htmlspecialchars($_POST['password_retype']);
        
            $login = strtolower($login);
            $check = $this->bdd->prepare('SELECT login, prenom, nom, id, password FROM utilisateurs WHERE login = ?');
            $check->execute(array($login));
            $data = $check->fetch();
            $row = $check->rowCount();
        
            if ($row > 0) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['user'] = $data;
                    header('Location: ../view/profil.php');
                    exit();
                } else {
                    header('Location: ../view/login_form.php?login_err=incorrect_password');
                    die();
                }
            } else {
                header('Location: ../view/login_form.php?login_err=user_not_found');
                die();
            }
        }        
        
    }    
// fonction deconnexion 
    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ../view/login_form.php');
        die();
    }
}

$Auth = new AuthController();

if (isset($_POST['register'])) {
    $Auth->register();
}

if (isset($_POST['login'])) {
    $Auth->login();
}
if (isset($_POST['logout'])) {

    $Auth->logout();
}
