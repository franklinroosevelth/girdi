<?php 

session_start();
include_once('requete_creer_modifier.php');
include_once('requete_entite.php');
include_once('../fonction_globale.php');

$RequeteCreerModifierEntite = new Requete_creer_modifier_entite();
$RequeteEntite = new Requete_entite();
//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;
$nomEntite = '';

$requeteDonnees = array();
$resultat['message'] = ''; 

//Verifier si l'autorisation est accordée, cad le user_profil est actif et la permission existe
if ( 1 == 1 ) 
{
    $requeteDonnees['vehicule_id'] = trim(htmlspecialchars($_POST['vehicule_id']));
    $requeteDonnees['vehicule_numero_plaque'] = trim(htmlspecialchars($_POST['vehicule_numero_plaque']));
    $requeteDonnees['vehicule_date_immatriculation'] = trim(htmlspecialchars($_POST['vehicule_date_immatriculation']));
  
    $requeteDonnees['nom_entite'] =  'vehicule';
    echo $entiteCreer = $RequeteEntite->modifier_plaque($requeteDonnees);
    
    header("Location:  /../infraction/vues/liste_demande.php");
}
else
{
    
}
#echo json_encode($entiteCreer);

?>
