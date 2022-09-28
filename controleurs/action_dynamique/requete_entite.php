<?php 

    include_once('../connexion.php');
    class Requete_entite
    {
        //CRUDA entité
        public function afficher_entite($requeteDonnee)
        {
            global $bdd;
            $designation ='';
            if($requeteDonnee['nom_entite'] == "plainte")
            {
                $designation = $requeteDonnee['designation'];
                $req = $bdd->query("SELECT * 
                FROM app.tb_".$requeteDonnee['nom_entite']." 
                WHERE ".$requeteDonnee['nom_entite']."_numero_plaque ILIKE '%".$designation."%' ORDER BY plainte_create_datetime DESC");
            }
            elseif($requeteDonnee['nom_entite'] == "code_transaction")
            {
                $designation = $requeteDonnee['designation'];
                $req = $bdd->query("SELECT * 
                FROM app.tb_".$requeteDonnee['nom_entite']." 
                WHERE code_transaction_noms_demandeur ILIKE '%".$designation."%' ORDER BY code_transaction_create_datetime DESC");
            }
            elseif($requeteDonnee['nom_entite'] == "agent")
            {
                $noms = $requeteDonnee['nom'];
                $req = $bdd->query("SELECT * 
                FROM app.tb_".$requeteDonnee['nom_entite']." 
                WHERE (agent_nom ILIKE '%".$noms."%' OR agent_postnom ILIKE '%".$noms."%' OR agent_prenom ILIKE '%".$noms."%')");
            }
            else
            {
                $req = $bdd->query("SELECT * 
                FROM app.tb_".$requeteDonnee['nom_entite']." ");
            }
               
            return $req->fetchAll(2);                        
        }

        
        

        public function afficher_vue($requeteDonnee)
        {
            global $bdd;
            $designation ='';
            if(isset($requeteDonnee['designation']))
            {
                $designation = $requeteDonnee['designation'];
                $req = $bdd->query("SELECT * 
                FROM app.vw_".$requeteDonnee['nom_entite']." 
                WHERE ".$requeteDonnee['nom_entite']."_designation ILIKE '%".$designation."%'");
            }
            else
            {
                $req = $bdd->query("SELECT * 
                FROM app.vw_".$requeteDonnee['nom_entite']." 
                WHERE ".$requeteDonnee['nom_entite']."_active_status = ".$requeteDonnee['active_status']."
                ");
            }
            
            return $req->fetchAll(2);                        
        }

       
        
        public function afficher_detail_entite($requeteDonnee)
        {
            global $bdd;
            $req = $bdd->prepare('SELECT * 
            FROM app.tb_'.$requeteDonnee['nom_entite'].' 
            WHERE  '.$requeteDonnee['designation_cle'].' = :entiteId');
            $req->execute(array('entiteId'=> $requeteDonnee['valeur_cle']));
            return $req->fetchAll(2);           
        }

        public function afficher_detail_vue($requeteDonnee)
        {
            global $bdd;

            if($requeteDonnee['nom_entite'] == 'identite_station_service')
            {
                $req = $bdd->prepare('SELECT * 
                FROM app.vw_'.$requeteDonnee['nom_entite'].' 
                WHERE '.$requeteDonnee['designation_cle'].' = :entiteId');
                $req->execute(array(
                    'entiteId'=> $requeteDonnee['valeur_cle']));
            }
            else
            { 
                $req = $bdd->prepare('SELECT * 
                FROM app.vw_'.$requeteDonnee['nom_entite'].' 
                WHERE '.$requeteDonnee['designation_cle'].' = :entiteId');
                $req->execute(array(
                    'entiteId'=> $requeteDonnee['valeur_cle']));
            }
            
            return $req->fetchAll(2);                        
        }


        public function supprimer_entite($requeteDonnee) 
        {
            global $bdd;
            $req = $bdd->prepare('DELETE FROM app.tb_'.$requeteDonnee['nom_entite'].' 
            WHERE '.$requeteDonnee['nom_entite'].'_id = :entiteId');
            $req->execute(array('entiteId'=> $requeteDonnee['entite_id']));
        }

        public function supprimer_entite_cle($requeteDonnee) 
        {
            global $bdd;
            $req = $bdd->prepare('DELETE FROM app.tb_'.$requeteDonnee['nom_entite'].' 
            WHERE '.$requeteDonnee['designation_cle'].' = :valeurCle');
            $req->execute(array('valeurCle'=> $requeteDonnee['valeur_cle']));
        }

        public function modifier_plaque($requeteDonnee) 
        {
            global $bdd;
            $req = $bdd->prepare('UPDATE app.tb_vehicule
            SET vehicule_numero_plaque = :plaque, vehicule_date_immatriculation= :date
            WHERE vehicule_id = :entiteId');
            $req->execute(array(
                'entiteId'=> $requeteDonnee['vehicule_id'],
                'plaque'=> $requeteDonnee['vehicule_numero_plaque'],
                'date'=> $requeteDonnee['vehicule_date_immatriculation']
            
            ));
        }

        public function modifier_status($requeteDonnee) 
        {
            global $bdd;
            $req = $bdd->prepare('UPDATE app.tb_plainte
            SET plainte_status = 1
            WHERE plainte_id = :id');
            $req->execute(array(
                'id'=> $requeteDonnee['plainte_id']
            ));
        }

        public function modifier_status_recherche($requeteDonnee) 
        {
            global $bdd;
            $req = $bdd->prepare('UPDATE app.tb_recherche
            SET recherche_status = 1
            WHERE recherche_id = :id');
            $req->execute(array(
                'id'=> $requeteDonnee['recherche_id']
            ));
        }
        
    }
    ?>
