<?php 

include_once('requete_entite.php');
include_once('../action_dynamique/requete_creer_modifier.php');

$RequeteEntite = new Requete_entite();
$RequeteCreerModifierEntite = new Requete_creer_modifier_entite();

$test = 0;

$requeteDonnee = array();
$reponseDonnees = array();

$resultat['message'] = '';

$nomEntite = $requeteDonnees['nom_entite'] = trim(htmlspecialchars($_GET['nom_entite']) );

if(isset($_GET['designation']))
{
    $requeteDonnees['designation'] = trim(htmlspecialchars($_GET['designation']));
}

$listeEntites = $RequeteEntite->afficher_entite_demande($requeteDonnees);
if($nomEntite == 'recherche')
{
    $listeEntites = $RequeteEntite->afficher_entite_recherche($requeteDonnees);
}
if($nomEntite == 'vehicule_trouver')
{
    $listeEntites = $RequeteEntite->afficher_entite_vehicule_trouver($requeteDonnees);
}

echo json_encode($listeEntites);