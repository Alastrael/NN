<?php

    /**
     * Cette fonction a pour but de se connecter à notre base de donnée bdd_m2l
     *
     * @return PDO
     */
    function connexion()
    {

        $host = "localhost";
        $dbname = "bdd_m2l";
        $user = "root";
        $mdp = "";

        $pdo=new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))
            or die ("Problème de connexion à la base de donnée");

        //retourne une connection à la base de donnée
        return $pdo;
    }
    //fin fonction connexion



    /**
     * Cette fonction a pour but de renvoyer toutes les informations des formations ordonnées par les id
     *
     * @param [string] $id
     * @return void
     */
    function nomFormation($id)
    {

        $pdo = connexion();

        $requete = "select * from salarie natural join participer natural join formation where (statut=1 or statut=2) and salarie.id_Salarie = :id";

        $prepReq = $pdo->prepare($requete);
        $prepReq->BindValue(':id',$id);

        $execPrepReq = $prepReq->execute();

        $data = $prepReq->fetchAll();

        return $data;
    }
    //fin nomFormation



    /**
     * Cette fonction a pour but de rechercher une formation avec son id
     *
     * @param [string] $id
     * @return void
     */
    function offreFormationDispo($id)
    {
        $dbh = connexion();
        $requete = "select * from salarie natural join participer natural join formation where statut='0' and salarie.id_Salarie = :id";
        
        $prepReq = $dbh->prepare($requete);
        $prepReq->BindValue(':id',$id);

        $execPrepReq = $prepReq->execute();
        
        $data = $prepReq->fetchAll();
        
        return $data;
    }
    //fin de fonction


    /**
     * Cette fonction a pour but de renvoyer le nom du salarié
     *
     * @param [string] $id
     * @return void
     */
    function nomSalarie($id) {

        $connection = connexion();

        $requete = "select nom_salarie from salarie where id_Salarie = :id";

        $prepReq = $connection->prepare($requete);
        $prepReq->BindValue(':id',$id);

        $execPrepReq = $prepReq->execute();

        $tab = $prepReq->fetch();

        return $tab[0];

    }
    //fin fonction nomSalarie

    function rediriger($cible) {
        
        header('Location:'.$cible, false);

    }
?>
