<?php
session_start(); // Démarrage de la session
require_once 'connect-bdd.php'; // On inclut la connexion à la base de données
if ($_SESSION['user']['id'] == 1) {


    $check = $bdd->prepare('SELECT * FROM utilisateurs');
    $check->execute();
    $data = $check->fetchAll();
    if (isset($_POST['update'])) {
        $nom = htmlspecialchars(trim($_POST['nom']));
        $prenom = htmlspecialchars(trim($_POST['prenom']));
        $email = htmlspecialchars(trim($_POST['email']));
        $id = htmlspecialchars(trim($_POST['update']));

        $update = $bdd->prepare('UPDATE utilisateurs SET login = :login, prenom=:prenom, nom=:nom WHERE id = :id');
        $update->execute(array(
            "id" => $id,
            "login" => $email,
            "nom" => $nom,
            "prenom" => $prenom,
        ));
        header("Location:admin.php");
    }
    if (isset($_POST['delete'])) {
        $id = htmlspecialchars(trim($_POST['delete']));
        $delete = $bdd->prepare('DELETE FROM `utilisateurs` WHERE id = :id');
        $delete->execute(array(
            "id" => $id,
        ));
        header("Location:admin.php");
    }
?>

    <head>
        <title>Espace membre</title>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body class="background"> 
        <div class="admin">
            <h1 class="p-5"><?php echo $_SESSION['user']['prenom']; ?></h1>
            <div class="login-form">


                <table>
                    <th>id</th>
                    <th>Mail</th>
                    <th>Prenom</th>
                    <th>Nom</th>

                    <?php for ($i = 0; isset($data[$i]); $i++) { ?>
                        <tr>
                            <form method="post">
                                <td><?= $data[$i]['id'] ?></td>
                                <td><input type="text" name="email" value="<?= $data[$i]['login'] ?>"></td>
                                <td><input type="text" name="prenom" value="<?= $data[$i]['prenom'] ?>"></td>
                                <td><input type="text" name="nom" value="<?= $data[$i]['nom'] ?>"></td>
                                <td>
                                    <button type="submit" class="btn btn-info btn-lg" name="update" value="<?= $data[$i]['id'] ?>">Modifier</button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-info btn-lg" name="delete" value="<?= $data[$i]['id'] ?>">Supprimmer</button>
                                </td>
                            </form>
                        </tr>
                <?php }
                } else {
                    header("Location:index.php");
                } ?>
                </table>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            </div>
            <p class="Add-Button"><a href="inscription.php">ajouter un utilisateur</a></p>
            <p class="text-left"><a href="profil.php">retour</a></p>
        </div>
    </body>

    </html>