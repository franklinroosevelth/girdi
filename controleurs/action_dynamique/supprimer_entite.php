<?php 
include_once('requete_entite.php');
include_once('requete_creer_modifier.php');
include_once('../fonction_globale.php');


$RequeteCreerModifierEntite = new Requete_creer_modifier_entite();
$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;

$requeteDonnees = array();
$reponseDonnees  = array();
$resultat['message'] = '';


//Vérification et recupération de nom_entite
if(isset($_GET['nom_entite']))
{
    if($_GET['nom_entite'] != '')
    {
        //recupération de nom_entite
        $requeteDonnees['nom_entite'] = trim(htmlspecialchars($_GET['nom_entite']) );
    }
    else
    {
        $test++;  
        $resultat['message'] .= 'Le nom_entite ne doit pas etre vide';   
        $resultat['status'] = 2;  
    } 
}
else 
{
    $test++;
    $resultat['message'] .= 'Le nom_entite ne doit pas etre null'; 
    $resultat['status'] = 2;
}

//Verifier si l'autorisation est accordée, cad le user_profil est actif et lentite_id existe
//$reponseDonnees['autorisation']
if ( 1 == 1 ) 
{
    $requeteDonnees['entite_id'] = trim(htmlspecialchars($_GET['entite_id']));
    $RequeteEntite->supprimer_entite($requeteDonnees);
} // profil utilisateur valide et autorise

#echo json_encode($resultat);

if($requeteDonnees['nom_entite'] == "plainte")
{
    header("Location:  /../infraction/vues/liste_plaintes.php");
}
if($requeteDonnees['nom_entite'] == "agent")
{
    $page = "enregistrer_agent_police.php";
    if($_GET['categorie'] == 2)
      $page = "enregistrer_agent_dgi.php";

    header("Location:  /../infraction/vues/$page");
}
?>