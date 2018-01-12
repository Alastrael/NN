<?php    

    
    /**
     * Cette fonction va afficher les formations de la personne connectée au préalable dans l'onglet connexion
     *
     * @return void
     */
    function nomDeFormation()
    {
        include_once("dataAccessCRUD/idFormation.php");

        $data= nomFormation($_COOKIE["moncookie"]);

        foreach ($data as $valeur) 
        {
            echo 
            "
            <a class='list-group-item list-group-item-action' data-toggle='collapse' href='#"
            .$valeur['id_Formation']."' aria-expanded='false' aria-controls='collapseExample'>
            ";
            
            echo $valeur['nom_formation']; 

            if ($valeur['statut']=='2') {
                echo " <em>~ En attente de validation. ~</em>";
            }
        
    
?>

            <i class='fa fa-arrow-circle-down' aria-hidden='true'></i>
            </a> 

            
            <div class='collapse' id='<?php echo $valeur['id_Formation']?>'>
        
                    <div class='card card-body espace'> 

                            <?php echo $valeur['contenu_formation'] ?>
                            <div class='espace'>
                                <p>
                                    Qui commencera le : <?php echo $valeur['Date_formation'] ?>
                                </p>
                            </div>
                            <div class='espace'>
                                <p>
                                    Elle durera : <?php echo $valeur['Duree_formation'] ?>
                                    sur <?php echo $valeur['NbrJour_formation'] ?>
                                    , et cette formation se déroulera à/en <?php echo $valeur['lieu_formation'] ?>
                                </p>
                            </div>
                            <div class='espace'>
                                <p>
                                    Prérequis pour la formation : <?php echo $valeur['prerequis_formation'] ?>
                                </p>
                            </div>
                            
                            <button id='print' type='print' class='button'>
                                Imprimer
                            </button>
                        </div>
                    </div>
            <?php
        }//ferme le foreach
    }//ferme la fonction nomDeFormations


    function OffresFormations()
    {
        $data = offreFormationDispo($_COOKIE["moncookie"]);

        foreach ($data as $valeur) 
        {
            echo 
            "
            <a class='list-group-item list-group-item-action' data-toggle='collapse' href='#"
            .$valeur['id_Formation']."' aria-expanded='false' aria-controls='collapseExample'>
            ";
            
            echo $valeur['nom_formation']; 
        
    
            ?>

            <i class='fa fa-arrow-circle-down' aria-hidden='true'></i>
            </a> 

            
            <div class='collapse' id='<?php echo $valeur['id_Formation']?>'>
        
                    <div class='card card-body espace'> 

                            <?php echo $valeur['contenu_formation'] ?>
                            <div class='espace'>
                                <p>
                                    Qui commencera le : <?php echo $valeur['Date_formation'] ?>
                                </p>
                            </div>
                            <div class='espace'>
                                <p>
                                    Elle durera : <?php echo $valeur['Duree_formation'] ?>
                                    sur <?php echo $valeur['NbrJour_formation'] ?>
                                    , et cette formation se déroulera à/en <?php echo $valeur['lieu_formation'] ?>
                                </p>
                            </div>
                            <div class='espace'>
                                <p>
                                    Prérequis pour la formation : <?php echo $valeur['prerequis_formation'] ?>
                                </p>
                            </div>

                            <!--
                            <button id='print' type='print' class='button' onclick='inscrire('')'>
                                S'inscrire
                            </button> -->

                            <form action="vues/update.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                                
                                <!-- <button type="submit" value="S'inscrire à cette formation" name="<?php //echo $valeur['id_Formation'];?>"></button> -->
                                <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                                <input type="submit" value="S'inscrire à cette formation">
                            </form>
                            

                            
                        </div>
                    </div>
                <?php
                //<?php echo "inscrit".$valeur['id_Formation']
        } //ferme le foreach
    } //ferme la fonction
?>