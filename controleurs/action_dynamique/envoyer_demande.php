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
    
    $requeteDonnees['vehicule_numero_plaque'] = null;
    $requeteDonnees['vehicule_numero_chassis'] = trim(htmlspecialchars($_POST['vehicule_numero_chassis']));
    $requeteDonnees['vehicule_marque'] = trim(htmlspecialchars($_POST['vehicule_marque']));
    $requeteDonnees['vehicule_type'] = trim(htmlspecialchars($_POST['vehicule_type']));
    $requeteDonnees['vehicule_annee_fabrication'] = trim(htmlspecialchars($_POST['vehicule_annee_fabrication'])); 
    $requeteDonnees['vehicule_nombre_siege'] = trim(htmlspecialchars($_POST['vehicule_nombre_siege']));
    $requeteDonnees['vehicule_couleur'] = trim(htmlspecialchars($_POST['vehicule_couleur']));
    $requeteDonnees['vehicule_noms_proprietaire'] = trim(htmlspecialchars($_POST['vehicule_noms_proprietaire']));
    $requeteDonnees['vehicule_telephone_proprietaire'] = trim(htmlspecialchars($_POST['vehicule_telephone_proprietaire']));
    $requeteDonnees['vehicule_mail_proprietaire'] = trim(htmlspecialchars($_POST['vehicule_mail_proprietaire']));
    $requeteDonnees['vehicule_adresse_proprietaire'] = trim(htmlspecialchars($_POST['vehicule_adresse_proprietaire']));
    echo $requeteDonnees['code_transaction_id'] = trim(htmlspecialchars($_SESSION['code_transaction_id']));
  
    $listeEntite = array('vehicule', 'demande_immatriculation');
    foreach($listeEntite as $entite)
    {
        //Enregistrement du user
        $requeteDonnees['nom_entite'] =  $entite;
        $requeteDonnees[$entite.'_code_unique'] = generer_code_unique($requeteDonnees);
        $entiteCreer = $RequeteCreerModifierEntite->creer_entite($requeteDonnees);
        
        print_r($entiteCreer);

        echo $requeteDonnees['vehicule_id'] = $entiteCreer[0]['vehicule_id'];
    }

    header("Location:  /../infraction/vues/success_demande.php");

}// profil utilisateur valide et autorise
else
{
    
}
#echo json_encode($resultat);

?>
