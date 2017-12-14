<?php

    include_once("dataAccessCRUD/formations.php");
    //cette fonction identifie si le mot de passe et le login
    //rentré par un utilisateur existe dans la base de donnée
    function identifi($id, $mdp)
    {
        //connection à la base de donnée
        $connexion = connexion();

        //requête qui vérifie le nombre de lignes contenant l'id et le mdp rentrés dans l'appel de la fonction
        $requete = "select count(*) as nombre from salarie where id_Salarie = :id and Mdp_Salarie = :mdp";

        //préparation de la requête préparée, remplacement des :id et :mdp par les valeurs
        //rentrées dans l'appel de la fonction avec le BindValue
        $resultat = $connexion->prepare($requete);
        $resultat->BindValue(':id',$id);
        $resultat->BindValue(':mdp',$mdp);

        $execResultat = $resultat->execute();

        $tabResultat = $resultat->fetch();

        //variable pour vérifier si oui ou non les données rentrées existent
        $access = false;

        if($tabResultat[0]==1)
        {
            $access = true;
           
        }
        else $access = false;

        //retourne la réponse vrai si existe et false sinon
        return $access;

    }
    //fin de fonction identifi

    /**
     * Cette fonction a pour but de rediriger l'utilisateur vers une autre page
     *
     * @param [string] $cible
     * @return void
     */
    function redirection($cible) {
        
        header('Location:'.$cible, false);

    }
    //fin de fonction de redirection

?>