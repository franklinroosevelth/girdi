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
    $requeteDonnees['agent_id'] = "05def91e-3d00-11ed-b069-efb5c59b14d9";#trim(htmlspecialchars($_POST['agent_id']));
    $requeteDonnees['code_transaction_designation'] = trim(htmlspecialchars($_POST['code_transaction_designation']));
    $requeteDonnees['code_transaction_noms_demandeur'] = trim(htmlspecialchars($_POST['code_transaction_noms_demandeur']));
  
    $requeteDonnees['nom_entite'] =  'code_transaction';
    $requeteDonnees['code_transaction_code_unique'] = generer_code_unique($requeteDonnees);
    $entiteCreer = $RequeteCreerModifierEntite->creer_entite($requeteDonnees);

    header("Location:  /../infraction/vues/enregistrer_code_transaction.php");
}
else
{
    
}
#echo json_encode($entiteCreer);

?>
