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
                    <p class="mb-0 d-none d-sm-block navbar-profile-name" style="text-transform:capitalize">Bienvenue </p>
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
                    <h4>Envoyer une plainte</h4>
                    <form class="forms-sample" method="post" action="../controleurs/action_dynamique/envoyer_plainte.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputName2">Saisisser votre nom complet</label>  
                        <input type="text" class="form-control" id="exampleInputName1" style="color:#fff" placeholder="Saisisser votre nom complet" name="plainte_noms" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName2">Saisisser votre numéro de téléphone</label>  
                        <input type="text" class="form-control" id="exampleInputName1" style="color:#fff" placeholder="Saisisser votre nom complet" name="plainte_telephone" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName2">Saisisser le numéro de la plaque</label>  
                        <input type="text" class="form-control" id="exampleInputName1" style="color:#fff" placeholder="Saisisser le numéro de la plaque" name="plainte_numero_plaque" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName2">Saisisser la cause</label>  
                        <textarea type="text" class="form-control" id="exampleInputName1" style="color:#fff; height:70px" placeholder="Décrivez la cause de la plainte" name="plainte_cause" required></textarea>
                      </div>
                      
                      <div class="form-group">
                      <label for="exampleInputName2">Précisez la localisation de l'évènement</label>  
                        <input type="text" class="form-control" id="exampleInputName1" style="color:#fff" placeholder="Précisez la localisation" name="plainte_localisation" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName2" style="text-decoration:underline">Joindre un fichier (Photo ou Vidéo)</label>
                        <input type="file" class="form-control" id="exampleInputName2" name="plainte_photo" style="display:none">
                       
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Envoyer</button>
                    </form>
                  </div>
                </div>
              </div>
            
              <!--<div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste  des agents enregistrés</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                        <tr>
                            <th> N° </th>
                            <th> Objet </th>
                            <th> Contenu </th>
                            <th> Date </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody class="tbody_courrier" style="text-align:left; color:#fff">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div> -->
              
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
      
            function afficher_courrier()
            {
                var user_id = "<?php echo $_SESSION['user_id']; ?>"
                //alert(user_id);
                $.ajax(
                  {
                    type:"POST",
                    url: "../controleurs/action_cascade/afficher_detail_entite.php?nom_entite=courrier",
                    dataType:"json",
                    data:{designation_cle:"user_id", valeur_cle:user_id},
                    success: function(response) 
                    {
                      var chaine_courrier = "";
                      console.log(response);
                      for(var i in response)
                      {
                        status = response[i].courrier_status;
                        status_texte="";
                        if(status == 0 || status == null)
                        {
                            status_texte = "Non lu";
                        }
                        if(status == 1)
                        {
                            status_texte = "Lu";
                        }
                        chaine_courrier += "<tr><td>"+(parseInt(i,10)+1)
                        +"</td><td>"+response[i].courrier_titre+"</td><td>"
                        +response[i].courrier_contenu+"</td><td>"
                        response[i].courrier_create_datetime+"</td><td>"+
                        status_texte+"</td><td>Ouvrir</td></tr>";
                      }
                      $(".tbody_courrier").html(chaine_courrier);

                    }
                  })
            }
            afficher_courrier();
      //setInterval(afficher_agent, 1000);

    });
    </script>
  </body>
</html>