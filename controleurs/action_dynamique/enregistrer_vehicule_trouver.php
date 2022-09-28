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
    $requeteDonnees['recherche_id'] = trim(htmlspecialchars($_POST['recherche_id']));
    $requeteDonnees['agent_id'] = trim(htmlspecialchars($_POST['agent_id']));
    $requeteDonnees['vehicule_retrouve_date'] = trim(htmlspecialchars($_POST['vehicule_retrouve_date']));
  
    $requeteDonnees['nom_entite'] =  'vehicule_retrouve';
    $requeteDonnees['vehicule_retrouve_code_unique'] = generer_code_unique($requeteDonnees);
    $entiteCreer = $RequeteCreerModifierEntite->creer_entite($requeteDonnees);

    $RequeteEntite->modifier_status_recherche($requeteDonnees);
    
    header("Location:  /../infraction/vues/enregistrer_recherche.php");
}
else
{
    
}
#echo json_encode($entiteCreer);

?>
