<?php
    require_once("dataAccessCRUD/afficher.php");
?>

<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css" href="vues/accueil.css">


    <link rel="stylesheet" type="text/css" href="doc/css/bootstrap.min.css">

    <script src="doc/js/bootstrap.min.js"></script>
    <script src="vues/deconnexion.js"></script>

    <script src="https://use.fontawesome.com/b8a3d61bd6.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    <title>Accueil - M2L</title>

</head>

<body>

        <?php
            include_once("vues/header.php");

            include_once("vues/landing.php");

            include_once("vues/footer.php");

        ?>       
       
</body>

</html>