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
if(isset($_POST['user_profil_id']))
{   
    if($_POST['user_profil_id'] != '')
    {
 
        $requeteDonnees['user_profil_id'] = trim(htmlspecialchars($_POST['user_profil_id']));
        $requeteDonnees['type_action'] = 'afficher_'.$requeteDonnees['nom_entite'];

        $reponseDonnees = verifier_permission_utilisateur($requeteDonnees);
    }
    else 
    {
        $resultat['message'] .= 'Le user_profil_id ne doit pas être vide';
    }
}
else 
{
    $resultat['message'] .= 'Le user_profil_id ne doit pas être null';
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
    
    $requeteDonnees['depart'] = 0;
    if(isset($_POST['depart']))
    {
        $requeteDonnees['depart'] = htmlentities($_POST['depart']);
    }
    
    $listeEntites = $RequeteEntite->afficher_detail_entite($requeteDonnees);
    $resultat['message'] = "Liste  ".$requeteDonnees['nom_entite'];
    $resultat['liste'] = $listeEntites; 
    //die();
    if($requeteDonnees['nom_entite'] == 'profil')
    {
        $i = 0;
        $requeteDonnees['nom_entite'] = 'profil_permission';
        $requeteDonnees['designation_cle'] = 'profil_id';
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['profil_id'];
            $resultat['liste'][$i]['permission'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
            $i++;
        }
    }

    if($requeteDonnees['nom_entite'] == 'station_service')
    {
        $i = 0;
        $requeteDonnees['nom_entite'] = 'partenaire';
        $requeteDonnees['designation_cle'] = 'partenaire_id';
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['partenaire_id'];
            $resultat['liste'][$i]['partenaire'] = $RequeteEntite->afficher_detail_entite($requeteDonnees); 
            $i++;
        }

        $i = 0;
        $requeteDonnees['nom_entite'] = 'carburant_station_service';
        $requeteDonnees['designation_cle'] = 'station_service_id';
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['station_service_id'];
            $resultat['liste'][$i]['carburant_station_service'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
            $i++;
        }
        
        $i = 0;
        $requeteDonnees['nom_entite'] = 'paiement_carburant';
        $requeteDonnees['designation_cle'] = 'station_service_id';
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['station_service_id'];
            $resultat['liste'][$i]['paiement_carburant'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
            $i++;
        }

        $i =0;
        $requeteDonnees['active_status'] = 1;
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['nom_entite'] = 'identite_station_service';
            $requeteDonnees['designation_cle'] = 'station_service_id';
            $requeteDonnees['valeur_cle'] = $entite['station_service_id'];
            $resultat['liste'][$i]['pompiste'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
            $i++;
        }
    }

    if($requeteDonnees['nom_entite'] == 'identite_type_personne')
    {
        $i = 0;
        $requeteDonnees['nom_entite'] = 'type_personne';
        $requeteDonnees['designation_cle'] = 'type_personne_id';
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['type_personne_id'];
            $resultat['liste'][$i]['type_personne'] = $RequeteEntite->afficher_detail_entite($requeteDonnees); 
            $i++;
        }
    }

    if($requeteDonnees['nom_entite'] == 'demande_course')
    {
        $i = 0;
        $requeteDonnees['nom_entite'] = 'course';
        $requeteDonnees['designation_cle'] = 'demande_course_id';
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['demande_course_id'];
            $resultat['liste'][$i]['course'] = $RequeteEntite->afficher_detail_entite($requeteDonnees); 
            $i++;
        }
    }

    if($requeteDonnees['nom_entite'] == 'panier')
    {
        $i = 0;
        
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['nom_entite'] = 'piece_rechange_partenaire_vente';
            $requeteDonnees['designation_cle'] = 'piece_rechange_partenaire_vente_id';
            $requeteDonnees['valeur_cle'] = $entite['piece_rechange_partenaire_vente_id'];
            $listeImages = $resultat['liste'][$i]['piece_rechange_partenaire_vente'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 

            //réaffecter l'entité adresse_reference
            $requeteDonnees['nom_entite'] = 'type_piece_rechange_modele_engin_image';
            $requeteDonnees['designation_cle'] = 'type_piece_rechange_modele_engin_id';
            $j=0;
            //parcourir la listes des données de l'entité de base envoyée
            $requeteDonnees['active_status'] = 1;
            foreach($listeImages as $image)
            { 
                $requeteDonnees['valeur_cle'] = $image['type_piece_rechange_modele_engin_id'];
                //echo  'z';
                //construire le nouveau tableau de référence d'une adresse_entité donnée
                $resultat['liste'][$i]['piece_rechange_partenaire_vente'][$j]['piece_rechange_modele_engin_image'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
                $j++;
            }

            $i++;
        }
    }

    if($requeteDonnees['nom_entite'] == 'commande')
    {
        $i = 0;
        
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['nom_entite'] = 'detail_commande';
            $requeteDonnees['designation_cle'] = 'commande_id';
            $requeteDonnees['valeur_cle'] = $entite['commande_id'];
            $listePieces = $resultat['liste'][$i]['detail_commande'] = $RequeteEntite->afficher_detail_entite($requeteDonnees); 

            
            $j=0;
            //parcourir la listes des données de l'entité de base envoyée
            $requeteDonnees['active_status'] = 1;
            foreach($listePieces as $piece)
            { 
                //réaffecter l'entité adresse_reference
                $requeteDonnees['nom_entite'] = 'piece_rechange_partenaire_vente';
                $requeteDonnees['designation_cle'] = 'piece_rechange_partenaire_vente_id';
                $requeteDonnees['valeur_cle'] = $piece['piece_rechange_partenaire_vente_id'];
                //echo  'z';
                //construire le nouveau tableau de référence d'une adresse_entité donnée
                $listeCommandeImage = $resultat['liste'][$i]['detail_commande'][$j]['piece_rechange_partenaire_vente'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 

                
                $k=0;
                //parcourir la listes des données de l'entité de base envoyée
                $requeteDonnees['active_status'] = 1;
                foreach($listeCommandeImage as $commandeImage) 
                { 
                    //réaffecter l'entité adresse_reference
                    $requeteDonnees['nom_entite'] = 'type_piece_rechange_modele_engin_image';
                    $requeteDonnees['designation_cle'] = 'type_piece_rechange_modele_engin_id';
                    $requeteDonnees['valeur_cle'] = $commandeImage['type_piece_rechange_modele_engin_id'];
                    //construire le nouveau tableau de référence d'une adresse_entité donnée
                    $resultat['liste'][$i]['detail_commande'][$j]['piece_rechange_image'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
                    $k++;
                }

                $l=0;
                //parcourir la listes des données de l'entité de base envoyée
                $requeteDonnees['active_status'] = 1;
                foreach($listeCommandeImage as $commandeImage) 
                { 
                    //réaffecter l'entité adresse_reference
                    $requeteDonnees['nom_entite'] = 'piece_rechange_partenaire_image';
                    $requeteDonnees['designation_cle'] = 'piece_rechange_partenaire_id';
                    $requeteDonnees['valeur_cle'] = $commandeImage['piece_rechange_partenaire_id'];
                    //construire le nouveau tableau de référence d'une adresse_entité donnée
                    $resultat['liste'][$i]['detail_commande'][$j]['piece_rechange_partenaire_image'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
                    $l++;
                }
                $j++;
            }

            $i++;
        }
    }
    
    if($requeteDonnees['nom_entite'] == 'taux_change_devise')
    {
        $i = 0;
        $requeteDonnees['nom_entite'] = 'devise';
        $requeteDonnees['designation_cle'] = 'devise_id';
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['devise_id'];
            $resultat['liste'][$i]['devise'] = $RequeteEntite->afficher_detail_entite($requeteDonnees); 
            $i++;
        }
    }

    if($requeteDonnees['nom_entite'] == 'association')
    {
        $i = 0;
        $requeteDonnees['nom_entite'] = 'identite_association';
        $requeteDonnees['designation_cle'] = 'association_id';
        $requeteDonnees['noms'] = trim(htmlspecialchars($_POST['nom']));
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['association_id'];
            $resultat['liste'][$i]['identite_association'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
            $i++;
        }

        $i = 0;
        $requeteDonnees['nom_entite'] = 'identite_paiement';
        foreach($listeEntites as $entite)
        { 
            $requeteDonnees['valeur_cle'] = $entite['association_id'];
            $resultat['liste'][$i]['identite_paiement'] = $RequeteEntite->afficher_detail_vue($requeteDonnees); 
            $i++;
        }
    }

    
}
else
{
    $resultat['message'] =  $reponseDonnees['message'];
}

echo json_encode($resultat);