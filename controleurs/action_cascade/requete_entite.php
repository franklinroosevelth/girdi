<?php 

    include_once('../connexion.php');
    class Requete_entite
    {

        public function afficher_entite_demande($requeteDonnee)
        {
            $designation = $requeteDonnee['designation'];
            global $bdd;
            
            $req = $bdd->query("SELECT * FROM app.vw_demande WHERE code_transaction_designation ILIKE '%".$designation."%'");
            return $req->fetchAll(2);                        
        }


        public function afficher_entite_recherche($requeteDonnee)
        {
            global $bdd;
            $req = $bdd->query("SELECT * FROM app.vw_recherche");
            return $req->fetchAll(2);                        
        }

        public function afficher_entite_vehicule_trouver($requeteDonnee)
        {
            global $bdd;
            $req = $bdd->query("SELECT * FROM app.vw_vehicule_trouver");
            return $req->fetchAll(2);                        
        }

        
    }

?>
