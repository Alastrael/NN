<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/authent.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/b8a3d61bd6.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="assets/js/erreurDeConnexion.js"></script>
    <?php
        //Destruction du cookie "moncooki" qui recueille l'identifiant de la personne identifiée.
        setcookie("moncookie","",time()-3600);
        //Chemin du fichier php qui permet d'accèder à la base de donnée et de pouvoir utiliser l'identification.
        include_once("dataAccessCRUD/identification.php");
    ?>
    <title>Portail d'accès</title>
</head>
<body>
    <div id="container" class="container-fluid center">
    
        <?php
            //affichage du header de la page de connexion
            include_once("vues/connexion_header.php");
        ?>

        <div id="identif" class="row">
            <div class="col-md-6">
                <h3>Log In</h3>
                <!-- Formulaire ayant pour but de renseigner l'identifiant et le mot de passe d'un utilisateur. Il contient également un bouton pour envoyer les données. -->
                <form id="form1" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
                    <table class="bordure">
                        <tr>
                            <td>Identifiant<input type="text" class="form-control" id="id" name="identifiant" placeholder="Votre identifiant..." maxlength="100"></td>
                        </tr>
                        <tr>
                            <td>Mot de passe<input type="password" id="" class="form-control" name="motdepasse" placeholder="Votre mot de passe..." maxlength="100"></td>
                        </tr>
                    </table>
                    <input type="submit" id="smbt" class="btn btn-warning" name="boutonConnexion" value=" Connexion "/>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Quelle est l'utilité de ce site ?</h3>
                <p>
                    Via l'interface intuitive de ce site, vous pourrez soumettre des demandes d'affectation à certaines formations. Vos choix de formations seront
                    acceptées ou non par votre chef d'équipe.<br>Vous pourrez également consulter les formations que vous avez déjà effectuées.
                </p>
            </div>

            <?php
                //Processus de vérification permettant la connexion
                if (isset($_POST['boutonConnexion'])) {
                    $id = $_POST['identifiant'];
                    $mdp = $_POST['motdepasse'];
                    if(identifi($id, $mdp)) {
                        setcookie("moncookie",$id);
                        setcookie("nomPage","authent");
                        $value = chef($id);
                        //Verification du statut de l'employé qui s'identifie
                        if($value[0] == $id) {
                            //Si il est chef.
                            $url = "_indexCHEF.php";
                            redirection($url);
                            exit();
                        }
                        else {
                            //Si c'est un employé.
                            $url = "index.php";
                            redirection($url);
                            exit();
                        }                          
                    }
                    //Si le mot de passe ou l'identifiant rentré est mauvais.    
                    else echo '<script>erreurConnexion()</script>';
                }
            ?>
        </div>
    </div>
</body>
</html>