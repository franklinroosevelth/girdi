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
                    <h4 class="">Liste des demandes</h4>
                    <form class="forms-sample" >
                      <div class="form-group">
                        <input type="text" class="form-control input_code" id="exampleInputName1" placeholder="Rechercher par code de transaction" required>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            

              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Liste  des demandes</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> N° </th>
                            <th> Numero du chassis </th>
                            <th> Marque </th>
                            <th> Type </th>
                            <th> Fabrication </th>
                            <th> Siège </th>
                            <th> Couleur </th>
                            <th> Propriétaire</th>
                            <th> Téléphone </th>
                            <th> Mail </th>
                            <th> Code </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody class="tbody_plainte">
                       
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
      
            function afficher_demande()
            {
              var code = $(".input_code").val();

                $.ajax(
                  {
                    type:"GET",
                    url: "../controleurs/action_cascade/afficher_entite.php",
                    dataType:"json",
                    data:{nom_entite:"demande", designation:code},
                    success: function(response) 
                    {
                      var chaine_demande = "";
                      j = 0;
                      for(var i in response)
                      { 
                        var status =' <a href="affecter_plaque.php?id='+response[i].vehicule_id+'">Affecter</a>';
                        if(response[i].vehicule_numero_plaque != null)
                        {
                          status = "";
                        }
                       
                        chaine_demande += '<tr><td>'+(parseInt(j,10)+1)
                        +'</td><td>'+response[i].vehicule_numero_chassis+'</td><td>'
                        +response[i].vehicule_marque+'</td><td>'
                        +response[i].vehicule_type+'</td><td>'+
                        response[i].vehicule_annee_fabrication+'</td><td>'+
                        response[i].vehicule_nombre_siege+'</td><td>'+
                        response[i].vehicule_couleur+'</td><td>'+
                        response[i].vehicule_noms_proprietaire+'</td><td>'+
                        response[i].vehicule_telephone_proprietaire+'</td><td>'+
                        response[i].vehicule_mail_proprietaire+'</td><td>'+
                        response[i].code_transaction_designation+'</td><td>'+
                        response[i].vehicule_create_datetime+'</td><td><a href="confirmer_suppression_plainte.php?id='+response[i].demande_immatriculation_id+'">Supprimer</a>'+status+'</td></tr>';
                        j++;
                      }
                      console.log(chaine_demande);
                      $(".tbody_plainte").html(chaine_demande);

                    }
                  })
            }
            //afficher_demande();
            setInterval(afficher_demande, 1000);

    });
    </script>
  </body>
</html>