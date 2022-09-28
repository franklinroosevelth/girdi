<?php 
  session_start(); 
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GIRDI | Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
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
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <h1 style="position:absolute;top:47px;left:34%">GIRDI</h1>
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Se connecter</h3>
                <form method="post" action="/../infraction/controleurs/user/se_connecter.php">
                  <div class="form-group">
                  <?php 
                    if(isset($_GET['message'])) 
                      echo '<label style="color:#2fbf2f;font-weight:bold">'.$_GET['message'].'</label><br><br>';
                    ?>
                    <label>Pseudo*</label>
                    <input type="text" style="color:#fff" class="form-control p_input" name="user_pseudo">
                  </div>
                  <div class="form-group">
                    <label>Mot de passe *</label>
                    <input type="password" style="color:#fff" class="form-control p_input" name="user_password">
                  </div> 
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Se connecter</button>
                  </div>
                  <a href="index.php">Retour</a>
                  
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>