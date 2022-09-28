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
        <ul class="nav">
      <li class="nav-item nav-category">
        <span class="nav-link">Menus</span>
      </li>
          
          <li class="nav-item menu-items">
            <a class="nav-link" href="envoyer_plainte.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Envoyer plainte</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Accueil</span>
            </a>
          </li>

        </ul>
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
            
            <div class="row "><div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4>Détail de la demande</h4>
                    <form class="forms-sample" method="post" action="../controleurs/action_dynamique/affecter_plaque.php" >
                    <div class="form-group" style="display:none;">
                        <input type="text" class="form-control vehicule_id" id="exampleInputName1" style="color:#fff" name="vehicule_id" required>
                      </div>
                    <div class="form-group">
                        <label for="exampleInputName2">Code de transaction de la demande</label>  
                        <input type="text" class="form-control code" id="exampleInputName1" style="color:#fff" name="plainte_noms" required>
                      </div>
                    
                    <div class="form-group">
                        <label for="exampleInputName2">Numéro chassis</label>  
                        <input type="text" class="form-control chassis" id="exampleInputName1" style="color:#fff" name="plainte_noms" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName2">Marque</label>  
                        <input type="text" class="form-control marque" id="exampleInputName1" style="color:#fff" name="plainte_telephone" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName2">Type</label>  
                        <input type="text" class="form-control type" id="exampleInputName1" style="color:#fff" name="plainte_numero_plaque" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName2">Année de fabrication</label>  
                        <input type="text" class="form-control annee" id="exampleInputName1" style="color:#fff;" name="plainte_cause" required>
                      </div>
                      
                      <div class="form-group">
                      <label for="exampleInputName2">Nombre de siège</label>  
                        <input type="text" class="form-control siege" id="exampleInputName1" style="color:#fff"  name="plainte_localisation" required>
                      </div>

                      <div class="form-group">
                      <label for="exampleInputName2">Noms du propriétaire</label>  
                        <input type="text" class="form-control noms" id="exampleInputName1" style="color:#fff"  name="plainte_localisation" required>
                      </div>

                      <div class="form-group">
                      <label for="exampleInputName2">Téléphone du proprétaire</label>  
                        <input type="text" class="form-control phone" id="exampleInputName1" style="color:#fff"  name="plainte_localisation" required>
                      </div>

                      <div class="form-group">
                      <label for="exampleInputName2">Email du proprétaire</label>  
                        <input type="text" class="form-control mail" id="exampleInputName1" style="color:#fff"  name="plainte_localisation" required>
                      </div>

                      <div class="form-group">
                      <label for="exampleInputName2">Adresse du proprétaire</label>  
                        <input type="text" class="form-control adresse" id="exampleInputName1" style="color:#fff"  name="plainte_localisation" required>
                      </div>
                      <h4>Affecter un numéro de plaque</h4>
                      <div class="form-group">
                      <label for="exampleInputName2">Date d'immatriculation</label>  
                        <input type="date" class="form-control localisation" id="exampleInputName1" style="color:#fff"  name="vehicule_date_immatriculation" required>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputName2">Numéro de la plaque</label>  
                        <input type="text" class="form-control localisation" id="exampleInputName1" style="color:#fff"  name="vehicule_numero_plaque" required>
                      </div>


                      <input type="submit" class="btn btn-primary mr-2" value="Affecter"/>
                    </form>
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
      
            function afficher_plainte()
            {
              //var plaque = $(".input_plaque").val();
              var vehicule_id = "<?php echo $_GET['id']; ?>";
              //alert(vehicule_id);
              //alert(plainte_id);

                $.ajax(
                  {
                    type:"GET",
                    url: "../controleurs/action_cascade/afficher_entite.php",
                    dataType:"json",
                    data:{nom_entite:"demande", designation:""},
                    success: function(response) 
                    {
                      j = 0;
                      for(var i in response)
                      { 
                        if(response[i].vehicule_id == vehicule_id)
                        {
                            $('.chassis').val(response[i].vehicule_numero_chassis);
                            $('.marque').val(response[i].vehicule_marque);
                            $('.type').val(response[i].vehicule_type);
                            $('.annee').val(response[i].vehicule_annee_fabrication);
                            $('.siege').val(response[i].vehicule_nombre_siege);

                            $('.noms').val(response[i].vehicule_noms_proprietaire);
                            $('.phone').val(response[i].vehicule_telephone_proprietaire);
                            $('.mail').val(response[i].vehicule_mail_proprietaire);
                            $('.adresse').val(response[i].vehicule_adresse_proprietaire);
                            $('.code').val(response[i].code_transaction_designation);
                            $('.vehicule_id').val(response[i].vehicule_id);
                           
                        }
                        j++;
                      }
                      $(".tbody_plainte").html(chaine_plainte);

                    }
                  })
            }
            afficher_plainte();
            //setInterval(afficher_plainte, 1000);

    });
    </script>
  </body>
</html>