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



    <?php
        setcookie("moncookie","",time()-3600);
    //Chemin du fichier php qui permet d'accèder à la base de donnée et de pouvoir utiliser
    //l'identification
        include_once("dataAccessCRUD/identification.php");
    ?>
    
    <title>Portail d'accès</title>

</head>

<body>

<div id="container" class="container-fluid center">

    <?php

        include_once("vues/connexion_header.php");

    ?>

    <div class="row">

        <div class="col-md-5"></div>

        <div class="col-md-5">

            <form id="form1" name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
                <table border="1">
                    <tr>
                        <td><input type="text" class="form-control" id="id" name="identifiant" placeholder="Votre identifiant..." maxlength="100"></td>
                    </tr>

                    <tr>
                        <td><input type="password" id="mdp" class="form-control" name="motdepasse" placeholder="Votre mot de passe..." maxlength="100"></td>
                    </tr>
        
                </table>
            
                <input type="submit" id="smbt" name="envoyer" value=" ENVOYER "/>

            </form>

        </div>

        <?php
            if (isset($_POST['envoyer']))
                {
                    $id = $_POST['identifiant'];
                    $mdp = $_POST['motdepasse'];

                    if(identifi($id, $mdp))
                        {
                            setcookie("moncookie",$id);
                            $url = "index.php";
			                redirection($url);
			                exit();
                        }
                    else echo "<div class='col-md-2'>Vous avez rentré un mauvais login ou mot de passe.</div>";
	            }
	    ?>

    </div>

</div>

</body>

</html>