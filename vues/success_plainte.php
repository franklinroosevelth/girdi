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
        <?php #include('menu_lateral.php'); ?>
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
                    <!--<h4 class="card-title">Envoyer une plainte</h4>-->
                    <form class="forms-sample">
                      <br>
                      <center> <h4>Votre plainte a été envoyée avec succès</h4>  <br>
                        <a href="envoyer_plainte.php" class="btn btn-primary mr-2">Retourner sur la page de demande</a>
                        <br>
                      <center>
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