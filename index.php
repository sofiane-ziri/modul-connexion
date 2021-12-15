<!-- Une page d’accueil qui présente votre site (index.php) -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://img.icons8.com/ios/50/000000/connectdevelop.png" type="image/x-con">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="style.css" rel="stylesheet">
    <title>Connexion</title>
</head>

<body>
    <div class="login-form">
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Connexion</title>
        </head>

        <body>
            <div class="login-form">
                <form action="connexion.php" method="post">
                    <h2 class="text-center">Connexion</h2>
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
                            }
                        }
                        if (isset($_GET['login_err'])) {
                            $err = htmlspecialchars($_GET['login_err']);

                            switch ($err) {
                                case 'password':
                                ?>
                                    <div class="alert alert-danger">
                                        <strong>Erreur</strong> mot de passe incorrect
                                    </div>
                                <?php
                                    break;

                                case 'email':
                                ?>
                                    <div class="alert alert-danger">
                                        <strong>Erreur</strong> email incorrect
                                    </div>
                                <?php
                                    break;

                                case 'already':
                                ?>
                                    <div class="alert alert-danger">
                                        <strong>Erreur</strong> compte non existant
                                    </div>
                        <?php
                                    break;
                            }
                        }
                        ?>
                        <div class="form-group">
                            <input type="text" name="prenom" class="form-control" placeholder="Prenom" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
                        </div>
                </form>
                <p class="text-center"><a href="inscription.php">Inscription</a></p>
                <p class="text-center"><a href="https://github.com/sofiane-ziri/modul-connexion">Github</a></p>

            </div>
        </body>

        </html>