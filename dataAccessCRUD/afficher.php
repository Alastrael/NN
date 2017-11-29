<?php    

    function connexion()
    {

        $host = "localhost";
        $dbname = "bdd_m2l";
        $user = "root";
        $mdp = "";

        $pdo=new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))
            or die ("Problème de connexion à la base de donnée");

           

        return $pdo;

    }


    function nomFormation()
    {

        $pdo = connexion();

        $requete = "select * from formation order by id_Formation";
      
        $execRequete = $pdo->query($requete);

        $data = $execRequete->fetchAll();

        foreach ($data as $valeur) {
            echo 
            "
            <a class='list-group-item list-group-item-action' data-toggle='collapse' href='#"
            .$valeur['id_Formation']."' aria-expanded='false' aria-controls='collapseExample'>

            ".$valeur['nom_formation']."  
                <i class='fa fa-arrow-circle-down' aria-hidden='true'></i>
            </a> 
            
            <div class='collapse' id='".$valeur['id_Formation']."'>
                <div class='card card-body'> 
                    ".$valeur['contenu_formation'].
                    "<br><br>
                    Qui commencera le : ".$valeur['Date_formation']."
                    <br><br>
                    Elle durera : ".$valeur['Duree_formation']." sur ".$valeur['NbrJour_formation']
                    .". Cette formation se déroulera à/en ".$valeur['lieu_formation']."
                    <br><br>
                    Prérequis pour la formation : ".$valeur['prerequis_formation']."
                    <br><br>
                    <button id='print' type='print' class='button'>
                    Imprimer
                    </button>
                </div>
            </div>
            ";
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