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
    $categorie = trim(htmlspecialchars($_POST['categorie']));
    $requeteDonnees['identite_nom'] = trim(htmlspecialchars($_POST['identite_nom']));
    $requeteDonnees['identite_postnom'] = null;
    $requeteDonnees['identite_prenom'] = trim(htmlspecialchars($_POST['identite_prenom']));
    $requeteDonnees['identite_date_naissance'] = null;
    $requeteDonnees['identite_sexe'] = trim(htmlspecialchars($_POST['identite_sexe']));
    $requeteDonnees['identite_etat_civil'] = null;
    $requeteDonnees['identite_tranche_age'] = null;
    $requeteDonnees['user_profil'] = trim(htmlspecialchars($_POST['categorie']));
    $requeteDonnees['identite_fonction'] = null;
    $requeteDonnees['identite_autre_nom'] = '';
    $requeteDonnees['user_pseudo'] = trim(htmlspecialchars($_POST['user_pseudo']));
    $requeteDonnees['user_password'] = trim(htmlspecialchars($_POST['user_password']));
    $requeteDonnees['entreprise_designation'] = trim(htmlspecialchars($_POST['entreprise_designation']));
    $requeteDonnees['entreprise_rccn'] = trim(htmlspecialchars($_POST['entreprise_rccn']));
    $requeteDonnees['entreprise_idnat'] = trim(htmlspecialchars($_POST['entreprise_idnat']));
    
    if($test == 0)
    {
        $identite = $RequeteCreerModifierEntite->selectionner_identite($requeteDonnees);
        $requeteDonnees['nom_entite'] = 'user';
        $requeteDonnees['designation_cle'] = 'user_pseudo';
        $requeteDonnees['valeur_cle'] = $requeteDonnees['user_pseudo'];
        $user = $RequeteEntite->afficher_detail_entite($requeteDonnees);

        if(count($identite) > 0)
        {
            $resultat['message'] = "Cette identité existe déjà.";
            $resultat['status'] = 2;
            $test++;
        } 
        if(count($user) > 0)
        {
            $resultat['message'] = "Ce pseudo existe déjà.";
            $resultat['status'] = 2;
            $test++;
        }     
    }
  
    if($test == 0)
    {
        //Création des logins du user
        if($categorie == "1")
        {
            $requeteDonnees['entreprise_designation'] = $requeteDonnees['identite_nom'];
            $listeEntite = array('entreprise', 'identite', 'user');
            foreach($listeEntite as $entite)
            {
                $requeteDonnees['nom_entite'] =  $entite;
                $requeteDonnees[$entite.'_code_unique'] = generer_code_unique($requeteDonnees);
                $entiteCreer = $RequeteCreerModifierEntite->creer_entite($requeteDonnees);
                
                if($entite == 'entreprsie')
                {
                    $requeteDonnees['entreprise_id'] = $entiteCreer[0]['entreprise_id'];
                }
                if($entite == 'identite')
                {
                    $requeteDonnees['identite_id'] = $entiteCreer[0]['identite_id'];
                }
                if($entite == 'user')
                {
                    $requeteDonnees['user_id'] = $entiteCreer[0]['user_id'];
                }
                //$resultat['message'] .= "Enregistrement réussi.";
            }
            
    
        }
        elseif($categorie == "2")
        {
            $listeEntite = array('identite', 'user');
            foreach($listeEntite as $entite)
            {
                $requeteDonnees['nom_entite'] =  $entite;
                $requeteDonnees[$entite.'_code_unique'] = generer_code_unique($requeteDonnees);
                $entiteCreer = $RequeteCreerModifierEntite->creer_entite($requeteDonnees);
                
                if($entite == 'identite')
                {
                    $requeteDonnees['identite_id'] = $entiteCreer[0]['identite_id'];
                }
                if($entite == 'user')
                {
                    $requeteDonnees['user_id'] = $entiteCreer[0]['user_id'];
                }
                //$resultat['message'] .= "Enregistrement réussi.";
            }
        }
        
        header("Location: /../courrier/vues/creer_client.php");
    }
    else
    {
        $resultat['message'] .= "Données envoyées incorrectes.";
    }
}// profil utilisateur valide et autorise
else
{
    
}
echo json_encode($resultat);

?>
