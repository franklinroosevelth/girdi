<?php 
session_start();
include_once('requete_se_connecter.php');
include_once('../action_dynamique/requete_entite.php');

$requeteUser = new Requete_user();

$userProfil = 0;
$requeteDonnees = array();
echo $requeteDonnees['code_transaction_noms_demandeur'] = trim(htmlspecialchars($_POST['code_transaction_noms_demandeur']));
echo $requeteDonnees['code_transaction_designation'] = trim(htmlspecialchars($_POST['code_transaction_designation']));

   $userProfil = $requeteUser->verifier_login_code_transaction($requeteDonnees);
        
   #print_r($userProfil);
   //Vérifier s'il le nombre des user_profil est inférieur à 1 pour confirmer qu'il n'y a aucun user_profil avec ce pseudo ou password
   if(count($userProfil) < 1)
   {
       $message = "une demande avec ce code et ce nom n'existe"; 
       header("Location: /../infraction/vues/login.php?message=".$message."");
   }
   else
   {
       $_SESSION['nom'] = $userProfil[0]['code_transaction_noms_demandeur'];
       $_SESSION['code_transaction_id'] = $userProfil[0]['code_transaction_id'];
       header("Location: /../infraction/vues/envoyer_demande_immatriculation.php");
   }
    
?>
 