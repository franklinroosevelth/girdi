<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GIRDI|Envoyer</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="index.html" style="color:#fff; font-weight:bold"><!--<img src="assets/images/logo.svg" alt="logo" />-->GIRDI</a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <?php include('menu_lateral.php'); ?>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav w-100">
              <li class="nav-item w-100">
                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item">
                <!--<a class="nav-link btn btn-success create-new-button" href="login.php">Se déconnecter</a>-->
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="assets/images/faces/face15.jpg" alt="">
                    <p class="mb-0 d-none d-sm-block navbar-profile-name" style="text-transform:capitalize">Bienvenue <?php echo $_SESSION['prenom'].' '.$_SESSION['nom']; ?></p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
         

            <div class="row">
            </div>
            
           
            
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="">Liste  des véhicules trouvés </h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                        <tr>
                            <th> N° </th>
                            <th> Date disparition </th>
                            <th> Date d'arrestation </th>
                            <th> Plaque</th>
                            <th> Couleur </th>
                            <th> Marque </th>
                            <th> Agent </th>
                          </tr>
                        </thead>
                        <tbody class="tbody_recherche" style="text-align:left; color:#fff">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <!--<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Power by Din Concept</span>-->
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script>
      $(document).ready(function(){
      
            function afficher_recherche()
            {
              var plaque = $(".input_plaque").val();

                $.ajax(
                  {
                    type:"GET",
                    url: "../controleurs/action_cascade/afficher_entite.php",
                    dataType:"json",
                    data:{nom_entite:"vehicule_trouver"},
                    success: function(response) 
                    {
                      var chaine_plainte = "";
                      j = 0;
                      for(var i in response)
                      { 
                        chaine_plainte += '<tr><td>'+(parseInt(j,10)+1)
                        +'</td><td>'+response[i].recherche_date_disparition+'</td><td>'
                        +response[i].vehicule_retrouve_date+'</td><td>'
                        +response[i].vehicule_numero_plaque+'</td><td>'
                        +response[i].vehicule_couleur+'</td><td>'
                        +response[i].vehicule_marque+'</td><td>'
                        +response[i].agent_nom+ ' ' +response[i].agent_prenom+'</td></tr>';
                        j++;
                      }
                      console.log(response);
                      $(".tbody_recherche").html(chaine_plainte);

                    }
                  });
            }
            afficher_recherche();
            //setInterval(afficher_recherche, 1000);

            function afficher_agent()
            {
              //var plaque = $(".input_plaque").val();

                $.ajax(
                  {
                    type:"GET",
                    url: "../controleurs/action_dynamique/afficher_entite.php",
                    dataType:"json",
                    data:{nom_entite:"agent", designation:""},
                    success: function(response) 
                    {
                      var chaine_agent = '<option value=""> </option>';
                      j = 0;
                      for(var i in response)
                      { 
                        chaine_agent += '<option value="'+response[i].agent_id+'">'+response[i].agent_nom +' '+response[i].agent_postnom+' '+response[i].agent_prenom
                        +'</option>';
                        j++;
                      }
                      //console.log(response);
                      $(".agent_id").html(chaine_agent);

                    }
                  });
            }
            afficher_agent();

    });
    </script>
  </body>
</html>