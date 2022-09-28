<?php 
include_once('requete_entite.php');
include_once('requete_creer_modifier.php');
include_once('../fonction_globale.php');

$RequeteCreerModifierEntite = new Requete_creer_modifier_entite();
$RequeteEntite = new Requete_entite();

//déclaration et initialisation des parametres ou variables à utiliser
$test = 0;

$reponseDonnees = array();
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
// verification du profil de l'utilisateur
if(isset($_POST['user_profil_id']))
{   
    if($_POST['user_profil_id'] != '')
    {
        $requeteDonnees['user_profil_id'] = trim(htmlspecialchars($_POST['user_profil_id']));
        $requeteDonnees['type_action'] = 'supprimer_'.$requeteDonnees['nom_entite'];

        $reponseDonnees = verifier_permission_utilisateur($requeteDonnees);
    }
    else 
    {
        $resultat['message'] .= 'Le user_profil_id ne doit pas être vide';
        $resultat['status'] = 2;
        $test++;
    }
}
else 
{
    $resultat['message'] .= 'Le user_profil_id ne doit pas être null';
    $resultat['status'] = 2;
    $test++;
}

//Verifier si l'autorisation est accordée, cad le user_profil est actif et lentite_id existe
//$reponseDonnees['autorisation']
if ( 1 == 1 ) 
{
     //Vérifier si l'entite_id est correctement envoyé
    if(isset($_POST['entite_id']))
    {
        if($_POST['entite_id'] != '')
        {
            //recupération de l'id de la entite
            $requeteDonnees[$requeteDonnees['nom_entite'].'_id'] = $requeteDonnees['entite_id'] = trim(htmlspecialchars($_POST['entite_id']));
        }
        else
        {
            $test++;  
            $resultat['message'] .= "L'id de la entite ne doit pas etre vide";   
            $resultat['status'] = 2;  
        } 
    }
    else 
    {
        $test++;
        $resultat['message'] .= "L'id de la entite ne doit pas etre null"; 
        $resultat['status'] = 2;
    }
    //Vérifier si tous les parametres ou variables sont envoyés correctement
    if($test == 0)
    {
        //selectionner le in_use de l'entité à suprimer
        $inUseEntite = $RequeteCreerModifierEntite->selectionner_entite($requeteDonnees);
        $inUseStatus = $inUseEntite[0][$requeteDonnees['nom_entite'].'_in_use_status'];
        $listeTableFille = $RequeteCreerModifierEntite->selectionner_table_fille($requeteDonnees);

        if($inUseStatus > 0)
        {
            $resultat['message'] = "Suppression échouée car in_use_status = ".$inUseStatus.". Pour forcer la suppression, poster supprimer_entite à 1.";
            
            $supprimer_entite = 0;
            if(isset($_POST['supprimer_entite']))
            {
                $supprimer_entite = $_POST['supprimer_entite'];
            }

            if($supprimer_entite == 1)
            {
                foreach($listeTableFille as $table)
                {
                    //$requeteDonnee['nom_entite'] = $table;
                    //$requeteDonnee['designation_cle'] = 
                }
            }
        }
        else
        {
            try
            {
                if($requeteDonnees['nom_entite'] == 'type_piece_rechange_modele_engin')
                {
                    $requeteDonnees['nom_entite'] = 'type_piece_rechange_modele_engin_image';
                    $requeteDonnees['designation_cle'] = 'type_piece_rechange_modele_engin_id';
                    $requeteDonnees['valeur_cle'] = $requeteDonnees['type_piece_rechange_modele_engin_id'];
                    $RequeteEntite->supprimer_entite_cle($requeteDonnees);
                    $requeteDonnees['nom_entite'] = 'type_piece_rechange_modele_engin';
                }
                $RequeteEntite->supprimer_entite($requeteDonnees);
                $resultat['message'] = "entite supprimée.";
                $resultat['status'] = 1;
            }
            catch(Exception $e)
            {
                //die('Erreur '.$e->getMessage());
                $resultat['message'] = "Erreur interne";
                $resultat['status'] = 500;
            }
        }
        
    }
} // profil utilisateur valide et autorise
else
{
    $resultat['message'] .=  $reponseDonnees['message'];
}
echo json_encode($resultat);
?>