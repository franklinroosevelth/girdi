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
                    <h4 class="">Enregistrer le code de transaction</h4>
                    <form class="forms-sample" method="post" action="../controleurs/action_dynamique/enregistrer_code.php">
                      <div class="form-group">
                        <label for="exampleInputName1">Code de transaction</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Code de transaction" name="code_transaction_designation" required>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputName1">Nom complet du demandeur</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nom complet du demandeur" name="code_transaction_noms_demandeur" required>
                      </div>

                      <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                    </form>
                  </div>
                </div>
              </div>
            

              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="">Liste  des codes enregistr??s</h4>
                    <form>
                      <div class="form-group">
                        <input type="text" class="form-control input_code" id="exampleInputName1" placeholder="Rechercher par le nom du demandeur" required>
                    </div>
                    </form>
                    <div class="table-responsive">
                      <table class="table" style="color:#fff">
                        <thead>
                          <tr>
                            <th> N?? </th>
                            <th> Nom complet </th>
                            <th> Code </th>
                            <th> ID agent</th>
                            <th> Date </th>
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
      
            function afficher_code()
            {
              var code = $(".input_code").val();
                $.ajax(
                  {
                    type:"GET",
                    url: "../controleurs/action_dynamique/afficher_entite.php",
                    dataType:"json",
                    data:{nom_entite:"code_transaction", designation:code},
                    success: function(response) 
                    {
                      var chaine_agent = "";
                      for(var i in response)
                      {
                        
                          chaine_agent += '<tr><td>'+(parseInt(i,10)+1)
                          +'</td><td>'+response[i].code_transaction_noms_demandeur+'</td><td>'
                          +response[i].code_transaction_designation+'</td><td>'
                          +response[i].agent_id+'</td><td>'+
                          response[i].code_transaction_create_datetime+'</td></tr>';
                        
                      }
                      //console.log(chaine_agent);
                      $(".tbody_agent").html(chaine_agent);

                    }
                  })
            }
            //afficher_code();
      setInterval(afficher_code, 1000);

    });
    </script>
  </body>
</html>