<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Courriel</title>
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
          <a class="sidebar-brand brand-logo" href="index.html" style="color:#fff; font-weight:bold"><!--<img src="assets/images/logo.svg" alt="logo" />-->Courriel</a>
          <a class="sidebar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <?php include('menu_lateral.php'); ?>
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
                    <h4 class="card-title">Enregistrer un agent</h4>
                    <form class="forms-sample" method="post" action="../controleurs/action_dynamique/creer_compte.php">
                      <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom" name="identite_nom" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Postnom</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Postnom" name="identite_postnom" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Prénom</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Prénom" name="identite_prenom" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Genre</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="identite_sexe" required>
                          <option value=""></option>
                          <option value="Masculin">Masculin</option>
                          <option value="Féminin">Féminin</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Etat-civil</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="identite_etat_civil" required>
                          <option value=""></option>
                          <option value="Célibataire">Célibataire</option>
                          <option value="Marié(e)">Marié(e)</option>
                          <option value="Divorcé(e)">Divorcé(e)</option>
                          <option value="Veuf(ve)">Veuf(ve)</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Fonction</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="identite_fonction" required>
                          <option value=""></option>
                          <option value="Receptionniste">Receptionniste</option>
                          <option value="Secretaire">Secretaire</option>
                          <option value="Directeur de Finance">Directeur de Finance</option>
                          <option value="Directeur informatique">Directeur informatique</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Date de naissance</label>
                        <input type="date" class="form-control" id="exampleInputName1" placeholder="Date de naissance" name="identite_date_naissance" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Tranche d'age</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="identite_tranche_age" required>
                          <option value=""></option>
                          <option value="Moins de 25">Moins de 25</option>
                          <option value="26 - 35 ans">26 - 35 ans</option>
                          <option value="36 - 45 ans">36 - 45 ans</option>
                          <option value="46 - 55 ans">46 - 55 ans</option>
                          <option value="Plus de 55 ans">Plus de 55 ans</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Profil</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="user_profil" required>
                          <option value=""></option>
                          <option value="Receptionniste">Receptionniste</option>
                          <option value="Secretaire">Secretaire</option>
                        </select>
                      </div>
                      
                      <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                      <button class="btn btn-dark" reset>Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            

              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste  des agents enregistrés</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> N° </th>
                            <th> Nom </th>
                            <th> Prénom </th>
                            <th> Genre </th>
                            <th> Etat-civil </th>
                            <th> Date d'enregistrement </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody class="tbody_agent">
                       
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

                $.ajax(
                  {
                    type:"GET",
                    url: "../controleurs/action_cascade/afficher_entite_1.php",
                    dataType:"json",
                    data:{nom_entite:"identite"},
                    success: function(response) 
                    {
                      var chaine_agent = "";
                      for(var i in response)
                      {
                        chaine_agent += "<tr><td>"+(parseInt(i,10)+1)
                        +"</td><td>"+response[i].identite_nom+"</td><td>"
                        +response[i].identite_prenom+"</td><td>"
                        +response[i].identite_sexe+"</td><td>"+
                        response[i].identite_etat_civil+"</td><td>"+
                        response[i].identite_create_datetime+"</td></tr>";
                      }
                      //console.log(chaine_agent);
                      $(".tbody_agent").html(chaine_agent);

                    }
                  })
            }
            afficher_agent();
      //setInterval(afficher_agent, 1000);

    });
    </script>
  </body>
</html>