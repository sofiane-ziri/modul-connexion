<?php
session_start(); // Démarrage de la session
require_once '../model/connect-bdd.php'; // On inclut la connexion à la base de données
if ($_SESSION['user']['id'] == 1) {


    $check = $bdd->prepare('SELECT * FROM utilisateurs');
    $check->execute();
    $data = $check->fetchAll();

?>

    <head>
        <title>Espace membre</title>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet">
        <link rel="shortcut icon" href="https://img.icons8.com/ios-filled/50/000000/apple-settings.png" type="image/x-con">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body class="background">
        <div class="admin">
            <h1 class="title"><?php echo $_SESSION['user']['prenom']; ?></h1>

            <table>
                <th>id</th>
                <th>Mail</th>
                <th>Prenom</th>
                <th>Nom</th>


                <?php for ($i = 0; isset($data[$i]); $i++) { ?>
                    <tr>
                        <form action=../controller/admin-set.php method="post">
                            <td><?= $data[$i]['id'] ?></td>
                            <td><input type="text" name="email" class="form-control" value="<?= $data[$i]['login'] ?>"></td>
                            <td><input type="text" name="prenom" class="form-control" value="<?= $data[$i]['prenom'] ?>"></td>
                            <td><input type="text" name="nom" class="form-control" value="<?= $data[$i]['nom'] ?>"></td>

                            <td>
                                <button type="submit" class="btn btn-info btn-lg" name="update" value="<?= $data[$i]['id'] ?>">Modifier</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger btn-lg" name="delete" value="<?= $data[$i]['id'] ?>">Supprimmer</button>
                            </td>
                        </form>
                    </tr>

            <?php }
            } else {
                header("Location:../index.php");
            } ?>
            </table>
            <a class="btn btn-primary" href="profil.php" role="button">Retour</a>
            <div class="login-form">
                <form action="../controller/admin-set.php" method="post">
                    <div class="form-group">
                        <?php
                        if (isset($_GET['reg_err'])) {
                            $err = htmlspecialchars($_GET['reg_err']);

                            switch ($err) {
                                case 'success':
                        ?>
                                    <div class="alert alert-success">
                                        <strong>Succès</strong> inscription réussie !
                                    </div>
                                <?php
                                    break;

                                case 'password':
                                ?>
                                    <div class="alert alert-danger">
                                        <strong>Erreur</strong> mot de passe différent
                                    </div>
                                <?php
                                    break;

                                case 'already':
                                ?>
                                    <div class="alert alert-danger">
                                        <strong>Erreur</strong> compte deja existant
                                    </div>
                        <?php

                            }
                        }
                        ?>
                        <input type="email" name="login" class="form-control" placeholder="Email" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="prenom" class="form-control" placeholder="Prenom" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password_retype" class="form-control" placeholder="Validez le mot de passe" required="required" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-lg">Ajoutez un utilisateur</button>
                    </div>
                </form>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </div>
        </div>
    </body>

    </html>