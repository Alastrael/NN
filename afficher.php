<?php    

    function connexion()
    {

        $host = "localhost";
        $dbname = "bdd_m2l";
        $user = "root";
        $mdp = "";

        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $mdp)
            or die ("Problème de connexion à la base de donnée");

        return $pdo;

    }


    function nomFormation()
    {

        $pdo = connexion();

        $requete = "select contenu_formation from formation order by id_Formation";
        $execRequete = $pdo->query($requete);

        $data = $execRequete->fetch();

        foreach ($data as $valeur) {
            echo "<a class='list-group-item list-group-item-action'>".$valeur."</a>";
        }


        return $data;

    }



?>