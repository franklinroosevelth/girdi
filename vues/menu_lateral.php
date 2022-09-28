<ul class="nav">
      <li class="nav-item nav-category">
        <span class="nav-link">Menus</span>
      </li>
     
          <?php if($_SESSION['user_profil']=="admin_police") {?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="enregistrer_agent_police.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Enregistrer policier</span>
            </a>
          </li>
          <?php }?>
          <?php if($_SESSION['user_profil']=="admin_dgi") {?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="enregistrer_agent_dgi.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Enregistrer agent dgi </span>
            </a>
          </li>
          <?php }?>
          <?php if($_SESSION['user_profil']=="admin_police" OR $_SESSION['user_profil']=="agent_police") {?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="liste_plaintes.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Liste des plaintes</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="liste_vehicule_trouver.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Véhicules trouvés</span>
            </a>
          </li>

          <?php }?>
          <?php if($_SESSION['user_profil']=="admin_dgi" OR $_SESSION['user_profil']=="agent_dgi") {?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="liste_demande.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Liste des demandes</span>
            </a>
          </li>
          <?php }?>
          <!--<li class="nav-item menu-items">
            <a class="nav-link" href="envoyer_demande_immatriculation.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Immatriculation</span>
            </a>
          </li>-->
          <?php if($_SESSION['user_profil']=="admin_dgi" OR $_SESSION['user_profil']=="agent_dgi") {?>
          <li class="nav-item menu-items">
            <a class="nav-link" href="enregistrer_code_transaction.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Code transaction</span>
            </a>
          </li>
          <?php }?>
          <li class="nav-item menu-items">
            <a class="nav-link" target="_blank" href="https://www.gmail.com">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Envoyer mail</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="liste_vehicule.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Liste des  véhicules</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="liste_recherche.php">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Véhicules recherchés</span>
            </a>
          </li>

        </ul>