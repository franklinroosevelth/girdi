<?php 
session_start();
include_once('requete_se_connecter.php');

$requeteUser = new Requete_user();

//déclaration et initialisation des parametres ou variables à utiliser
    $test = 0;
    $connect = 0;
    $userProfil = '';
    
    $requeteDonnees = array();

    echo $requeteDonnees['user_pseudo'] = trim(htmlspecialchars($_POST['user_pseudo']));
    echo $requeteDonnees['user_password'] = trim(htmlspecialchars($_POST['user_password']));
    $userProfil = $requeteUser->verifier_login($requeteDonnees);
        
    #print_r($userProfil);
    //Vérifier s'il le nombre des user_profil est inférieur à 1 pour confirmer qu'il n'y a aucun user_profil avec ce pseudo ou password
    if(count($userProfil) < 1)
    {
        $message = "Connexion échoué car ce compte n'existe pas"; 
        header("Location: /../infraction/vues/login.php?message=".$message."");
    }
    else
    {
        $_SESSION['user_id'] = $userProfil[0]['user_id'];
        $_SESSION['user_profil'] = $userProfil[0]['user_profil'];
        //$_SESSION['agent_idl'] = $userProfil[0]['user_profil'];
        if($_SESSION['user_profil']=="admin_dgi" OR $_SESSION['user_profil']=="agent_dgi")
            header("Location: /../infraction/vues/liste_demande.php");
        elseif($_SESSION['user_profil']=="admin_police" OR $_SESSION['user_profil']=="agent_police")
            header("Location: /../infraction/vues/liste_plaintes.php");
    }
    
    #echo json_encode($resultat);
    
?>
 