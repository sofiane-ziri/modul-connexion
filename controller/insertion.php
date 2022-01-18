<?php
require_once '../model/connect-bdd.php'; // connexion à la base de données

// Si les variables existent et qu'elles ne sont pas vides
if (!empty($_POST['login']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
    // Patch XSS
    $email = htmlspecialchars(trim($_POST['login']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $nom = htmlspecialchars(trim($_POST['nom']));
    $password = htmlspecialchars(trim($_POST['password']));
    $password_retype = htmlspecialchars(trim($_POST['password_retype']));

    // On vérifie si l'utilisateur existe
    $check = $bdd->prepare('SELECT login, prenom, nom, password FROM utilisateurs WHERE login = ?');
    $check->execute(array($email));
    $data = $check->fetchAll();
    $row = $check->rowCount();

    $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..


    // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
    if ($row == 0) {
        if (strlen($prenom) <= 255) { // On verifie que la longueur du pseudo <= 255
            if (strlen($nom) <= 255) {
                if (strlen($email) <= 255) { // On verifie que la longueur du mail <= 255
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Si l'email est de la bonne forme
                        if ($password === $password_retype) { // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 12
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);


                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (:login, :prenom, :nom, :password)');
                            $insert->execute(array(
                                'login' => $email,
                                'nom' => $nom,
                                'prenom' => $prenom,
                                'password' => $password,

                            ));
                            // On redirige avec le message de succès
                            header('Location:../index.php?reg_err=success');
                        } else {
                            header('Location: ../view/inscription.php?reg_err=password');
                            die();
                        }
                    } else {
                        header('Location: ../view/inscription.php?reg_err=email');
                        die();
                    }
                } else {
                    header('Location: ../view/inscription.php?reg_err=email_length');
                    die();
                }
            } else {
                header('Location: ../view/inscription.php?reg_err=nom_length');
                die();
            }
        } else {
            header('Location: ../view/inscription.php?reg_err=prenom_length');
            die();
        }
    } else {
        header('Location: ../view/inscription.php?reg_err=already');
        die();
    }
}
