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
//$reponseDonnees['autorisation']
if ( 1 == 1 ) 
{
    $requeteDonnees['plainte_noms'] = trim(htmlspecialchars($_POST['plainte_noms']));
    $requeteDonnees['plainte_numero_plaque'] = trim(htmlspecialchars($_POST['plainte_numero_plaque']));
    $requeteDonnees['plainte_localisation'] = trim(htmlspecialchars($_POST['plainte_localisation']));
    move_uploaded_file($_FILES['plainte_photo']['tmp_name'], '../../vues/images_upload/'.basename($_FILES['file']['name']));
    $requeteDonnees['plainte_photo'] = basename($_FILES['plainte_photo']['name']);
    move_uploaded_file($_FILES['plainte_video']['tmp_name'], '../../vues/images_upload/'.basename($_FILES['file']['name']));
    $requeteDonnees['plainte_video'] = basename($_FILES['plainte_video']['name']);
  
    if($test == 0)
    {
        $requeteDonnees['nom_entite'] =  'plainte';
        $requeteDonnees['plainte_code_unique'] = generer_code_unique($requeteDonnees);
        $entiteCreer = $RequeteCreerModifierEntite->creer_entite($requeteDonnees);
    }
    else
    {
        $resultat['message'] = "Données envoyées incorrectes.";
    }

    header("Location:  /../infraction/vues/envoyer_plainte.php");
}
else
{
    
}
echo json_encode($entiteCreer);

?>
