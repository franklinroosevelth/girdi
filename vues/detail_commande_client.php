<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Gestion de la boulangerie</title>
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
          <a class="sidebar-brand brand-logo" href="index.html" style="color:#fff; font-weight:bold"><!--<img src="assets/images/logo.svg" alt="logo" />-->G-Boulangerie</a>
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
            <?php 
              $_GET['nom_entite'] = 'commande';
              include_once('../controleurs/afficher_entite.php') ;
              ?>

              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste  des commandes du client <?php echo $liste_entites[0]['nom_client'].' '.$liste_entites[0]['postnom_client'].' '.$liste_entites[0]['prenom_client']; ?></h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> N° </th>
                            <th> Client </th>
                            <th> Produit </th>
                            <th> Montant</th>
                            <th> Payé </th>
                            <th> BP </th>
                            <th> BPP </th>
                            <th> Date manuelle </th>
                            <th> Date d'enregistrement </th>
                            <!--<th> Action </th>-->
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        foreach($liste_entites AS $entite)
                        {
                            if($entite['id_client'] == $_GET['id_client'])
                            {
                                ?>
                          <tr style="color:#fff">
                            <td> <?php echo $i++; ?></td>
                            <td> <?php echo $entite['nom_client'].' '.$entite['postnom_client'].' '.$entite['prenom_client']; ?> </td>
                            <td> Pain</td>
                            <td> <?php echo $entite['montant_commande']. ' Fc'; ?></td>
                            <td> <?php echo $entite['montant_payer_commande']. ' Fc'; ?></td>
                            <td><?php 
                            $detteRestant =($entite['montant_commande'] - ($entite['montant_payer_commande'] + $entite['dette_payer_commande']));
                            echo $detteRestant.' Fc'; ?></td>
                            <td> <?php  echo $entite['dette_payer_commande']. ' Fc'; ?></td>
                            <td> <?php echo $entite['date_manuelle_commande']; ?></td>
                            <td> <?php echo $entite['date_creation_commande']; ?></td>
                            <td>
                              <div class="badge badge-outline-success">
                                <a href="payer_dette.php?id_commande=<?php echo $entite['id_commande'];?>&dette_payer_commande=<?php echo $entite['dette_payer_commande'];?>&nom_client=<?php echo $entite['nom_client'].' '.$entite['postnom_client'].' '.$entite['prenom_client'];?>&dette_restant=<?php echo $detteRestant;?>&bpp=<?php echo $entite['dette_payer_commande'];?>&id_client=<?php echo $_GET['id_client'];?>">Payer une dette</a>
                              </div>
                            </td>
                          </tr>
                          <?php  }} ?>
                          <tr>
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Power by Din Concept</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
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
  </body>
</html>



<!--rechercher client, avoir un compte, gerer les acces -->