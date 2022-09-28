<?php 
    
    include_once('../connexion.php');
    class Requete_user
    {
        public function verifier_login($requeteDonnees)
        {
            global $bdd;
            $req = $bdd->prepare("SELECT * 
            FROM app.tb_user
            WHERE user_pseudo ILIKE :userPseudo
            AND user_password = :userPassword
            ");
            $req->execute(array(
                'userPseudo' => $requeteDonnees['user_pseudo'], 
                'userPassword' => $requeteDonnees['user_password']
            ));
            return $req->fetchAll(2);
        }

        public function verifier_login_code_transaction($requeteDonnees)
        {
            global $bdd;
            $req = $bdd->prepare("SELECT * 
            FROM app.tb_code_transaction a
            WHERE code_transaction_designation = :code
            AND code_transaction_noms_demandeur ILIKE :nom
            ");
            $req->execute(array(
                'code' => $requeteDonnees['code_transaction_designation'], 
                'nom' => $requeteDonnees['code_transaction_noms_demandeur']
            ));
            return $req->fetchAll(2);
        }
    }

?>