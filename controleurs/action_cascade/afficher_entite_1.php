<?php 

include_once('requete_entite.php');
include_once('../action_dynamique/requete_creer_modifier.php');
include_once('../fonction_globale.php');

$RequeteEntite = new Requete_entite();
$RequeteCreerModifierEntite = new Requete_creer_modifier_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;

$requeteDonnee = array();
$reponseDonnees = array();

$resultat['message'] = '';

//Vérification et recupération de nom_entite
if(isset($_GET['nom_entite']))
{
    if($_GET['nom_entite'] != '')
    {
        //recupération de nom_entite
        $nomEntite = $requeteDonnees['nom_entite'] = trim(htmlspecialchars($_GET['nom_entite']) );
    }
    else
    {
        $test++;  
        $resultat['message'] .= 'Le nom_entite ne doit pas etre vide';     
    } 
}
else 
{
    $test++;
    $resultat['message'] .= 'Le nom_entite ne doit pas etre null'; 
}

//Vérification et recupération de nom_entite
if(isset($_POST['noms']))
{
    //recupération de nom_entite
    $requeteDonnees['noms'] = trim(htmlspecialchars($_POST['noms']) );
}


if(isset($_POST['designation']))
{
    $requeteDonnees['designation'] = trim(htmlspecialchars($_POST['designation']));
}

$listeEntites = $RequeteEntite->afficher_entite($requeteDonnees);
#echo json_encode($resultat);

echo json_encode($listeEntites);