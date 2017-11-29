<!-- Début du menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="decalage">
                <a class="navbar-brand" href="#"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Formation(s) Suivie(s)<span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                      <a class="nav-link" href="#">Offres de formation</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Historique des formations</a>


                    </li>
                  
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form>

            </div>
            

</nav> 
<hr color="white">
        <!-- Fin du menu !-->


        <!-- Début du tableau des formations !-->
        <div class="row">

            <div id="formations" class="col-md-10">



                <div class="list-group">
                    <?php      
                        nomFormation();
                    ?>
                </div>

            </div>

        </div>

 
    </div> <!-- fin container !-->