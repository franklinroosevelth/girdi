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
    <title>GIRDI | Accueil</title>
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
                <h3 class="card-title text-left mb-3"></h3>
                <div>
                  <div class="text-center">
                    <a href="login_demande.php" class="btn btn-primary btn-block enter-btn">Demande d'immatriculation</a>
                  </div>
                  <br>
                  <div class="text-center">
                    <a href="envoyer_plainte.php" class="btn btn-primary btn-block enter-btn">Soumettre une plainte</a>
                  </div>
                  <br>
                  <div class="text-center">
                    <a href="login.php" class="btn btn-primary btn-block enter-btn">Agent de la DGI</a>
                  </div>
                  <br>
                  <div class="text-center">
                    <a href="login.php" class="btn btn-primary btn-block enter-btn">Agent de la police</a>
                  </div>
                  <br>
                </div>
              </div>
            </div>
          </div>
          <marquee></marquee>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/js/jquery.min.js"></script>
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
    <script>
      $(document).ready(function(){
      
            function afficher_recherche()
            {
              var plaque = $(".input_plaque").val();

                $.ajax(
                  {
                    type:"GET",
                    url: "../controleurs/action_cascade/afficher_entite.php",
                    dataType:"json",
                    data:{nom_entite:"recherche"},
                    success: function(response) 
                    {
                      var chaine_plainte = "";
                      j = 0;
                      for(var i in response)
                      { 
                        if(response[i].plainte_status  == 0)
                        {
                          chaine_plainte += '<label> n° '+(j+1)+
                          ', Plaque : '+response[i].plainte_numero_plaque+', Couleur : '+
                          response[i].vehicule_couleur+', Marque : '+response[i].vehicule_marque+'</label>  | ';
                          j++;
                        }
                      }
                      //console.log(chaine_plainte);
                      $("marquee").html('<label>Avis de recherche : </label> '+chaine_plainte);

                    }
                  })
            }
            //afficher_recherche();
            setInterval(afficher_recherche, 1000);

    });
    </script>
  </body>
</html>