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
    $requeteDonnees['recherche_date_disparition'] = trim(htmlspecialchars($_POST['recherche_date_disparition']));
    $requeteDonnees['recherche_cause_disparition'] = trim(htmlspecialchars($_POST['recherche_cause_disparition']));
    $requeteDonnees['plainte_id'] = trim(htmlspecialchars($_POST['plainte_id']));
    $requeteDonnees['recherche_status'] = 0;
  
    $requeteDonnees['nom_entite'] =  'recherche';
    $requeteDonnees['recherche_code_unique'] = generer_code_unique($requeteDonnees);
    $entiteCreer = $RequeteCreerModifierEntite->creer_entite($requeteDonnees);

    $RequeteEntite->modifier_status($requeteDonnees);
    
    header("Location:  /../infraction/vues/enregistrer_recherche.php");
}
else
{
    
}
#echo json_encode($entiteCreer);

?>
