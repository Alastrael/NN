<!DOCTYPE html>
<html lang="en">
<?php
    include_once("../dataAccessCRUD/formations.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        //echo $_POST['selectOption']." &  ".$_POST['idSalarie'];
        $connexion = connexion();
        $requete = "update participer set statut = '1' where participer.id_Salarie = :nom and participer.id_Formation = :id";
        $prepRequete = $connexion->prepare($requete);
        $prepRequete->bindValue(':id',$_POST["selectOption"]);
        $prepRequete->bindValue(':nom',$_POST["idSalarie"]);
        $execRequete = $prepRequete->execute();

        $url = "../equipe.php";
        rediriger($url);
    ?>
</body>
</html>