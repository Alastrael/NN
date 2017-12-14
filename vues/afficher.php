<?php    

    /**
     * Cette fonction va afficher les formations de la personne connectée au préalable dans l'onglet connexion
     *
     * @return void
     */
    function nomDeFormation()
    {
        $data= nomFormation($_COOKIE["moncookie"]);

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
                            
                            <button id='print' type='print' class='button'>
                                Imprimer
                            </button>
                        </div>
                    </div>
                <?php
        } //ferme le foreach
    } //ferme la fonction
?>