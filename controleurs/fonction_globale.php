<?php 

//Importer des requetes pour user_profil et requete_profil_permission
include_once("user_profil/requete_user_profil.php");
include_once("profil_permission/requete_profil_permission.php");

//créer la fonction permettant de verifier si le user est autorisé à exécuter une action donnée
function verifier_permission_utilisateur($requeteDonnees)
{
    //instancier des classes Requetes pour user_profil, Reque
    $requeteUserProfil = new Requete_user_profil();
    $requeteProfilPermission = new Requete_profil_permission();
    //recupérer un user_profil
    $userProfilActive = $requeteUserProfil->selectionner_user_profil($requeteDonnees);
    $userProfilActive[0]['user_profil_active_status'];
    
    //verifier si le user_profil est actif
    if($userProfilActive[0]['user_profil_active_status'] == 1)
    {
        $requeteDonnees['profil_id'] = $userProfilActive[0]['profil_id'];
        $listePermissionDesignation = $requeteProfilPermission->selectionner_profil_permission($requeteDonnees);
  
        //verifier si le la designation de la permission est vide et retourne 0 car elle n'existe
        if($listePermissionDesignation[0]['permission_designation'] == '')
        {
            $reponseDonnees['autorisation'] = 0;
            $reponseDonnees['message'] = "Cet utilisateur n'est pas autorisé à exécuter cette action.";
        }
        else
        {
            //si la designation de la permission n'est pas vide alors retourner 1 car elle existe
            $reponseDonnees['autorisation'] = 1;
        }
    } 
    //si le user_profil n'est pas actif, retourner 0
    else 
    {
        $reponseDonnees['autorisation'] = 0;
        $reponseDonnees['message'] = "Cet user_profil n'est pas actif.";
    }

    return $reponseDonnees;
}



function est_dans_tableau($element, $tableau)
{
    $estDansTableau = 0;
    foreach ($tableau as $tab)
        if($tab == $element)
            $estDansTableau = 1;
    return $estDansTableau;
}

function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function generer_code_unique($requeteDonnees)
{
    //recupérer la date actuelle
    $chaine_a_coder = date('d-m-y h:i:s');
    //Recupérer l'adresse mac de l'ordinateur du client
    $mac = exec('getmac');
    $mac = strtok($mac, ' ');
    foreach ($requeteDonnees as $donnee)
    {
        $chaine_a_coder .= $donnee;
    }
    $chaine_a_coder .= $mac;

    return md5($chaine_a_coder);
}

?>