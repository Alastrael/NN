<div id="container" class="container-fluid center">
<!-- Début du haut de page !-->

        <div class="row">
        
                <div id="logo" class="col-md-2">
                    <img src="assets\img\Mansion.jpg" alt="Not found">
                    <p>
                        <?php
                            echo "Session : ".nomSalarie($_COOKIE["moncookie"]);
                        ?>
                    </p>
                </div>
                    
                <div id="titre" class="arrondis col-md-4">
                    <h1>Maison des ligues</h1>
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-danger logout" onclick="deco()">Déconnexion</button>
                </div>

        </div>
    <hr color="white">

<!-- Fin du haut de page !--> 