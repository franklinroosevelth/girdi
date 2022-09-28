<?php 
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
//$reponseDonnees['autorisation']
if ( 1 == 1 ) 
{
    $requeteDonnees['agent_nom'] = trim(htmlspecialchars($_POST['agent_nom']));
    $requeteDonnees['agent_postnom'] = trim(htmlspecialchars($_POST['agent_postnom']));
    $requeteDonnees['agent_prenom'] = trim(htmlspecialchars($_POST['agent_prenom']));
    $requeteDonnees['agent_date_naissance'] = trim(htmlspecialchars($_POST['agent_date_naissance']));
    $requeteDonnees['agent_sexe'] = trim(htmlspecialchars($_POST['agent_sexe']));
    $requeteDonnees['agent_grade'] = trim(htmlspecialchars($_POST['agent_grade']));
    $requeteDonnees['agent_affectation'] = trim(htmlspecialchars($_POST['agent_affectation']));
    $requeteDonnees['agent_telephone'] = trim(htmlspecialchars($_POST['agent_telephone']));
    $requeteDonnees['agent_mail'] = trim(htmlspecialchars($_POST['agent_mail']));
    $requeteDonnees['agent_adresse'] = trim(htmlspecialchars($_POST['agent_adresse']));
    $requeteDonnees['agent_categorie'] = $_GET['categorie'];
    
    $requeteDonnees['nom_entite'] =  'agent';
    $requeteDonnees['agent_code_unique'] = generer_code_unique($requeteDonnees);
    $RequeteCreerModifierEntite->creer_entite($requeteDonnees);

    if($requeteDonnees['agent_categorie'] == 1)
        header("Location:  /../infraction/vues/enregistrer_agent_police.php");
    elseif($requeteDonnees['agent_categorie'] == 2)
        header("Location:  /../infraction/vues/enregistrer_agent_dgi.php");

}// profil utilisateur valide et autorise
else
{
    
}
#echo json_encode($resultat);

?>
