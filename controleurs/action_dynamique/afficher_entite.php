<?php 

include_once('requete_entite.php');
include_once('../fonction_globale.php');

$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;

$requeteDonnee = array();
$reponseDonnees = array();

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
        $resultat['message'] = 'Le nom_entite ne doit pas etre vide';     
    } 
}
else 
{
    $test++;
    $resultat['message'] = 'Le nom_entite ne doit pas etre null'; 
}
// verification du profil de l'utilisateur
$requeteDonnees['designation'] = trim(htmlspecialchars($_GET['designation']) );
$requeteDonnees['nom'] = trim(htmlspecialchars($_GET['nom']) );

if ( 1 == 1 ) 
{

    $listeEntites = $RequeteEntite->afficher_entite($requeteDonnees); 
    
}
else
{
    $resultat['message'] =  $reponseDonnees['message'];
}
echo json_encode($listeEntites);