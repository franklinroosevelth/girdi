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
                    <h4 class="">Enregistrer un agent de la DGI</h4>
                    <form class="forms-sample" method="post" action="../controleurs/action_dynamique/enregistrer_agent.php?categorie=2">
                      <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom" name="agent_nom" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Postnom</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Postnom" name="agent_postnom" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Prénom</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Prénom" name="agent_prenom" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Sexe</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="agent_sexe" required>
                          <option value=""></option>
                          <option value="M">Masculin</option>
                          <option value="F">Féminin</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Date de naissance</label>
                        <input type="date" class="form-control" id="exampleInputName1" placeholder="Date de naissance" name="agent_date_naissance" required>
                      </div>

                      
                      <div class="form-group">
                        <label for="exampleSelectGender">Grade</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="agent_grade" required>
                          <option value=""></option>
                          <option value="Caporal">Directeur</option>
                          <option value="Capitain">Chef de bureau</option>
                          <option value="Major">Attaché de bureau</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleSelectGender">Affectation</label>
                        <select class="form-control" id="exampleSelectGender" style="color:#eee" name="agent_affectation" required>
                          <option value=""></option>
                          <option value="Receptionniste">RP Ngaba</option>
                          <option value="Secretaire">Victoire</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Telephone</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Telephone" name="agent_telephone" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">E-mail</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Mail" name="agent_mail" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Adresse physique</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Adresse physique" name="agent_adresse" required>
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
                    <h4 class="">Liste  des agents enregistrés</h4>
                    <form>
                      <div class="form-group">
                        <input type="text" class="form-control input_nom" id="exampleInputName1" placeholder="Rechercher par nom, postnom ou prenom" required>
                    </div>
                    </form>
                    <div class="table-responsive">
                      <table class="table" style="color:#fff">
                        <thead>
                        <tr>
                            <th> N° </th>
                            <th> Nom </th>
                            <th> Postnom </th>
                            <th> Prénom </th>
                            <th> Sexe </th>
                            <th> Né(e) le</th>
                            <th> Grade</th>
                            <th> Affectation</th>
                            <th> Téléphone</th>
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