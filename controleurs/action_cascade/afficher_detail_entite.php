<?php 

include_once('requete_entite.php');
include_once('../fonction_globale.php');
include_once('../action_dynamique/requete_creer_modifier.php');

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
        $requeteDonnees['nom_entite'] = trim(htmlspecialchars($_GET['nom_entite']) );
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
// verification du profil de l'utilisateur

if(isset($_POST['designation']))
{
    $requeteDonnees['designation'] = trim(htmlspecialchars($_POST['designation']));
}

if(isset($_POST['noms']))
{
    //recupération de nom
    $requeteDonnees['noms'] = trim(htmlspecialchars($_POST['noms']) );
}

//$reponseDonnees['autorisation']
if ( 1 == 1 ) 
{

    //Vérifier si la designation_cle est correctement envoyée
    if(isset($_POST['designation_cle']))
    {
        if($_POST['designation_cle'] != '')
        {
            //recupération de la designation_cle
            $requeteDonnees['designation_cle'] = trim(htmlspecialchars($_POST['designation_cle']));
        }
        else
        {
            $test++;  
            $resultat['message'] .= "La designation_cle ne doit pas etre vide";     
        } 
    }
    else 
    {
        $test++;
        $resultat['message'] .= "La designation_cle ne doit pas etre null"; 
    }

    //Vérifier si la valeur_cle est correctement envoyée
    if(isset($_POST['valeur_cle']))
    {
        if($_POST['valeur_cle'] != '')
        {
            //recupération de l'id de la entite
            $requeteDonnees['valeur_cle'] = trim(htmlspecialchars($_POST['valeur_cle']));
        }
        else
        {
            $test++;  
            $resultat['message'] .= "La valeur_cle ne doit pas etre vide";     
        } 
    }
    else 
    {
        $test++;
        $resultat['message'] .= "La valeur_cle ne doit pas etre null"; 
    }

    if($test == 0)
    {
        $listeEntites = $entites = $RequeteEntite->afficher_detail_entite($requeteDonnees);
    }
}
else
{
    $resultat['message'] .=  $reponseDonnees['message'];
}
//afficher tout le retour au format json
echo json_encode($listeEntites);