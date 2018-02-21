<?php    
    /**
     * Cette fonction va afficher les formations de la personne connectée au préalable dans l'onglet connexion
     *
     * @return void
     */
    function nomDeFormation(){
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

    function OffresFormations(){
        $data = offreFormationDispo($_COOKIE["moncookie"]);
        foreach ($data as $valeur) {
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
                        <form action="vues/update.php" method="POST" id="form<?php echo $valeur['id_Formation'];?>">
                            <input type="hidden" name="idFormation" value="<?php echo $valeur['id_Formation'];?>">
                            <input type="submit" value="S'inscrire à cette formation">
                        </form>                                    
                    </div>
                </div>
            <?php
        }//ferme le foreachs
    }//ferme la fonction OffresFormations
    
    function historiqueDesFormations(){
        $data = formationsFinie($_COOKIE["moncookie"]);

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
                                
                            </form>                                    
                        </div>
                    </div>
                <?php
        }
            
    }//ferme la fonction historiqueDesFormations

    function equipeAffichage(){
        $data = equipier($_COOKIE["moncookie"]);

        //print_r($data);

        foreach ($data as $valeur) {
            $formations = formationsEnAttente($valeur['id_Salarie']);
            //print_r($formations);
            echo 
            "
            <a class='list-group-item list-group-item-action' data-toggle='collapse' href='#"
            .$valeur['id_Salarie']."' aria-expanded='false' aria-controls='collapseExample'>
            ";
            echo $valeur['nom_Salarie']; 
            ?>

            <i class='fa fa-arrow-circle-down' aria-hidden='true'></i>
            </a>
            <div class='collapse' id='<?php echo $valeur['id_Salarie']?>'>
                <div class='card card-body espace'> 
                    <div class='espace'>
                        <p>
                            <?php echo $valeur['nom_Salarie'] ?> a demandé de suivre les formations suivantes : <br>
                            <?php 
                                $message = "";
                                foreach ($formations as $valeur) {
                                    print_r($valeur);
                                    if(count($formations)>=1){
                                        if($valeur['nom_formation']) $message = "Aucune.";
                                        else {
                                            echo "- ".$valeur['nom_formation']."<br>";
                                        $message = "";
                                        }
                                    } 
                                }
                                if($message == "Aucune") echo $message;
                            ?>
                        </p>
                    </div>
                    <?php if($message != "Aucune."){ echo"
                    <form action='vues/_updateCHEF.php' method='POST' id='".$valeur['id_Salarie']."'>
                        <div class='form-group'>
                            <label for='exampleFormControlSelect1'>Selectionnez la formation que vous autorisez : </label>
                            <select class='form-control' id='exampleFormControlSelect1' name='identifiantFormation'>";
                            foreach ($formations as $formation) {
                                echo "<option value='".$formation['id_Formation']."'>".$formation['nom_formation']."</option>";
                            }
                            echo "     
                            </select>
                            </div>
                                <select class='form-control' id='cacher' name='identifiantSalarie'>
                                    <option value='".$valeur['id_Salarie']."'>".$valeur['id_Salarie']."</option>;  
                                </select>
                            <div class='form-group'>
                                <select class='form-control' name='decision'>
                                    <option value='accepter'>accepter</option>;  
                                    <option value='refuser'>refuser</option>; 
                                </select>
                            </div>

                            <input type='submit' value='Valider'>
                        </form> 
                    ";}?>                                   
                </div>
            </div>
        <?php
        }
    }//ferme la fonction equipeAffichage

?>