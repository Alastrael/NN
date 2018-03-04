<!DOCTYPE html>
<html>
    <?php
        include_once("../dataAccessCRUD/formations.php");
        include_once("../dataAccessCRUD/identification.php")
    ?>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>exists</h1>

    <?php
        $connexion = connexion();
        if(chef($_COOKIE["moncookie"])) $requete = "update participer set statut = '1' where participer.id_Salarie = :nom and participer.id_Formation = :id";
        else $requete = "update participer set statut = '2' where participer.id_Salarie = :nom and participer.id_Formation = :id";
        $prepRequete = $connexion->prepare($requete);
        $prepRequete->bindValue(':id',$_POST["idFormation"]);
        $prepRequete->bindValue(':nom',$_COOKIE["moncookie"]);
        $execRequete = $prepRequete->execute();

        $url = "../offres.php";
        rediriger($url);
    ?>

</body>
</html>