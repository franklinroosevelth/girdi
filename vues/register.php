<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Courriel | S'inscrire</title>
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
          <h1 style="position:absolute;top:47px;left:34%">COURRIEL</h1>
            <div class="card col-lg-4 mx-auto" style="margin-top: 80px;">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Créer un compte</h3>
                <form method="post" action="../controleurs/action_dynamique/register.php">
                
                <div class="form-group">
                    <select class="form-control select_categorie" id="exampleSelectGender" style="color:#eee" name="categorie" required>
                          <option value="">Selectionner votre catégorie</option>
                          <option value="1">Entreprise</option>
                          <option value="2">Personne tiers</option>
                        </select>
                  </div>
                  <div class="form-group entreprise">
                    <label>Désignation</label>
                    <input type="text" class="form-control p_input" name="entreprise_designation">
                  </div>
                  <div class="form-group entreprise">
                    <label>Numéro RCCN</label>
                    <input type="text" class="form-control p_input" name="entreprise_rccn">
                  </div>
                  <div class="form-group entreprise">
                    <label>Identification nationale</label>
                    <input type="text" class="form-control p_input" name="entreprise_idnat">
                  </div>
                <div class="form-group tiers">
                    <?php 
                    if(isset($_GET['message'])) 
                    echo '<label style="color:#2fbf2f;font-weight:bold">'.$_GET['message'].'</label><br><br>';
                    ?>
                    <label>Nom</label>
                    <input type="text" class="form-control p_input" name="identite_nom">
                  </div>
                  <div class="form-group tiers">
                    <label>Prénom</label>
                    <input type="text" class="form-control p_input" name="identite_prenom">
                  </div>
                  <div class="form-group tiers">
                    <label>Genre</label>
                    <select class="form-control select_categorie" id="exampleSelectGender" style="color:#eee" name="identite_sexe" required>
                          <option value="">Selectionner votre sexe</option>
                          <option value="1">Masculin</option>
                          <option value="2">Féminin</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label>Pseudo</label>
                    <input type="text" class="form-control p_input" name="user_pseudo">
                  </div>
                 
                  <div class="form-group">
                    <label>Mot de passe</label>
                    <input type="password" class="form-control p_input" name="user_password">
                  </div>
                  
                  <div class="form-group">
                    <label>Repétez mot de passe</label>
                    <input type="password" class="form-control p_input" name="user_password_1">
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Créer compte</button>
                  </div>
                  Si vous avez déjà un compte, <br><a href="login.php">connectez-vous</a>
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
    <script src="assets/js/jquery.min.js"></script>
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
    <script>
      $(document).ready(function(){
      $(".entreprise").hide();
      $(".select_categorie").click(function(){
        if($(".select_categorie").val()=="1")
        {
          $(".tiers").hide();
          $(".entreprise").show();
        }
        else if($(".select_categorie").val()=="2")
        {
          $(".entreprise").hide();
          $(".tiers").show();
        }
      })
            
      });
    </script>
    <!-- endinject -->
  </body>
</html>