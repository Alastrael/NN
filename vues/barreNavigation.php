<!-- Début du menu -->

<nav class="navbar navbar-expand-lg navbar-light bg-light" id="decalage">
                <a class="navbar-brand" href="#"></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                      <a class="nav-link <?php if ($_COOKIE["nomPage"]=="index") echo "active"; ?>" href="index.php">Formation(s) Inscrite(s)<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link <?php if ($_COOKIE["nomPage"]=="offres") echo "active"; ?>" href="offres.php">Offres de formation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($_COOKIE["nomPage"]=="historique") echo "active"; ?>" href="historique_des_formations.php">Historique des formations</a>
                    </li>
                    <?php 
                        if(chef($_COOKIE["moncookie"]))echo "<li class='nav-item'><a class='nav-link ".(($_COOKIE['nomPage']=='equipe') ? 'active' : '')."' href='equipe.php'>Votre équipe</a></li>";
                    ?>
                </ul>

                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
                </form>

            </div>
            
</nav>

    <hr color="white">
    <!-- Fin du menu !-->
