<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GIRDI</title>
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
            <a class="nav-link" href="envoyer_demande_immatriculation.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Immatriculation</span>
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
        <?php include('header.php'); ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
         

            <div class="row">
            </div>
            
            <div class="row "><div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="">Soumettre une demande d'immatriculation</h4>
                    <form class="forms-sample" method="post" action="../controleurs/action_dynamique/envoyer_demande.php">
                      <!--<div class="form-group">
                        <label for="exampleInputName1">Plaque</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Plaque" name="vehicule_numero_plaque" >
                      </div>-->

                      <div class="form-group">
                        <label for="exampleInputName1">Chassis</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Chassis" name="vehicule_numero_chassis" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Marque</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="vehicule_marque" required>
                          <option value=""></option>
                          <option value="Mercedes 320">Mercedes 320</option>
                          <option value="Toyota IST">Toyota IST</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Type</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="vehicule_type" required>
                          <option value=""></option>
                          <option value="Type A">Type A</option>
                          <option value="Type B">Type B</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Année de fabrication</label>
                        <input type="number" class="form-control" id="exampleInputName1" placeholder="Année de fabrication" name="vehicule_annee_fabrication" required>
                      </div>

                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Nombre de siège</label>
                        <input type="number" class="form-control" id="exampleInputName1" placeholder="Nombre de siège" name="vehicule_nombre_siege" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Couleur</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="vehicule_couleur" required>
                          <option value=""></option>
                          <option value="Noire">Noire</option>
                          <option value="Blanche">Blanche</option>
                          <option value="Rouge">Rouge</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Nom complet du proprietaire</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom complet du propriétaire" name="vehicule_noms_proprietaire" value="<?php echo $_SESSION['nom'] ?>" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">E-mail</label>
                        <input type="mail" class="form-control" id="exampleInputName1" placeholder="Mail" name="vehicule_mail_proprietaire" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Téléphone</label>
                        <input type="mail" class="form-control" id="exampleInputName1" placeholder="Téléphone" name="vehicule_telephone_proprietaire" required>
                      </div>
                      <div class="form-group"y>
                        <label for="exampleInputName1">Adresse physique</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Adresse physique" name="vehicule_adresse_proprietaire" required>
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                    </form>
                  </div>
                </div>
              </div>
            
             

              
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block"></span>
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
      
        function afficher_agent()
            {
              var nom = $(".input_nom").val();

                $.ajax(
                  {
                    type:"GET",
                    url: "../controleurs/action_dynamique/afficher_entite.php",
                    dataType:"json",
                    data:{nom_entite:"agent", nom:nom},
                    success: function(response) 
                    {
                      var chaine_agent = "";
                      for(var i in response)
                      {
                        if(response[i].agent_categorie==2)
                        {
                          chaine_agent += '<tr><td>'+(parseInt(i,10)+1)
                          +'</td><td>'+response[i].agent_nom+'</td><td>'
                          +response[i].agent_postnom+'</td><td>'
                          +response[i].agent_prenom+'</td><td>'+
                          response[i].agent_sexe+'</td><td>'+
                          response[i].agent_date_naissance+'</td><td>'+
                          response[i].agent_grade+'</td><td>'+
                          response[i].agent_affectation+'</td><td>'+
                          response[i].agent_telephone+
                          '</td><td><a href="confirmer_suppression_agent.php?id='+
                          response[i].agent_id+'&categorie=2">Supprimer</a></td></tr>';
                        }
                      }
                      //console.log(chaine_agent);
                      $(".tbody_agent").html(chaine_agent);

                    }
                  })
            }
      //      afficher_agent();
      setInterval(afficher_agent, 1000);

    });
    </script>
  </body>
</html>