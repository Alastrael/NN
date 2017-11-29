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
        $counter = "select count(contenu_formation) from formation";

        $execRequete = $pdo->query($requete);
        $execCounter = $pdo->query($counter);

        $data = $execRequete->fetchAll();

        foreach ($data as $valeur) {
            echo "<a class='list-group-item list-group-item-action'>".$valeur['contenu_formation']."</a>";
        } 


    }

    function nbrPrint()
    {
        $pdo = connexion();
        
                $requete = "select contenu_formation from formation order by id_Formation";
                $counter = "select count(contenu_formation) from formation";
        
                $execRequete = $pdo->query($requete);
                $execCounter = $pdo->query($counter);
        
                $data = $execRequete->fetchAll();
        
                foreach ($data as $valeur) {
                    echo "<button id='print' type='print'>Imprimer</button>";
                } 
    }


?>