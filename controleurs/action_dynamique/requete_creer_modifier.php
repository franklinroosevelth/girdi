<?php 

    include_once('../connexion.php');
    class Requete_creer_modifier_entite
    {
        //Fonction pour afficher les noms des colonnes d'une table donnée
        public function afficher_colonne($requeteDonnee)
        {
            global $bdd;
            if(isset($requeteDonnee['nom_entite']))
            {
                //Requete de selections des informations d'une table donnée
                $req = $bdd->prepare("SELECT column_name, data_type, is_nullable FROM information_schema.columns WHERE table_name = :entite");
                $req->execute(array('entite'=> 'tb_'.$requeteDonnee['nom_entite']));
                return $req->fetchAll(2);         
            }  
            else
            {
                return "Le nom de l'entité ne doit pas etre null. Vérifier que le parametre nom_entite dans votre url est écrit correctement.";
            }
        }

        //Fonction pour créer une entité donnée
        public function creer_entite($requeteDonnee)
        {
            global $bdd;
            //initilaliser les variables à utiliser
            //est une chaine qui représente la partie des colonnes dans la requete SQL d'insertion
            $chaineColonne =  '';
            // représente la suite des point d'interrogation dans une requete préparé d'insertion
            $pointInterrogation = '';
            //represente l'index qui permet de charger le tableaux de données à inserer
            $j = 0; 
            //Récuperer la liste des nom de colonnes d'une table donnée
            $listeColonne = array();
            $listeColonne = $this->afficher_colonne($requeteDonnee);
            //Vérifier si la table demandée existe dans la base de données

            if($requeteDonnee['nom_entite'] == 'entite_document')
            {
                $requeteDonnee['entite_document_contenu'] = null;

            }

            if(isset($listeColonne[0]['column_name']))
            {
                //Initilaliser un tableau contenant les noms de colonne qui n'interviennent pas dans la requete d'insertion
                $colonneExclu = array(
                    $requeteDonnee['nom_entite'].'_id',
                    $requeteDonnee['nom_entite'].'_create_datetime',
                    $requeteDonnee['nom_entite'].'_code_unique'
                );
                
               
                //parcourir la liste des colonnes 
                foreach($listeColonne as $colonne)
                {
                    //vérifier si une colonne du tableau des colonnes de la table demandée est exclue de la requete d'insertion
                    if(in_array($colonne['column_name'], $colonneExclu) == 0)
                    {
                        //construire la suite de colonne en incrementant la concatenation
                        $chaineColonne .= $colonne['column_name'].', ';
                        //construire la suite des points d'interrogation
                        $pointInterrogation .= '?,';
                        //charger le tableau des données à insérer dans la table
                        $tableauDonne[$j] = $requeteDonnee[$colonne['column_name']];

                        $j++;
                    }
                }
                $tableauDonne[$j] = $requeteDonnee[$requeteDonnee['nom_entite'].'_code_unique'];
                //Ajouter la colonne d'insertion de la date de création
                $chaineColonne .= $requeteDonnee['nom_entite'].'_create_datetime';
                $chaineColonne .=', '. $requeteDonnee['nom_entite'].'_code_unique';
                //Ajouter la fonction NOW après la chaine de points d'interrogation pour insérer la date en cours
                $pointInterrogation .= 'NOW(), ?';

                //Construire la requete finale d'insertion
                $requeteCreer = 'INSERT INTO app.tb_'.$requeteDonnee['nom_entite'].'('.$chaineColonne.') VALUES('.$pointInterrogation.')';
                //exécuter la requete préparée
                $req = $bdd->prepare($requeteCreer);
                //Passer le tableau des données à insérer
                #echo $chaineColonne ;
                $req->execute($tableauDonne);

                //Recupération des informations des eventuelles erreurs
                $infoErreur = $req->errorInfo();
                if($infoErreur[1] != '')
                    return $infoErreur[2];
                else 
                {
                    $req = $bdd->prepare("SELECT * FROM app.tb_".$requeteDonnee['nom_entite']." WHERE ". $requeteDonnee['nom_entite']."_code_unique = :codeUnique");
                    $req->execute(array('codeUnique'=> $requeteDonnee[$requeteDonnee['nom_entite'].'_code_unique']));
                    return $req->fetchAll(2); 

                    $entitePere = $this->afficher_entite_peres($requeteDonnee);

                    foreach($entitePere as $entites)
                    {   
                        $requeteDonnees['entite'] = $entites;
                        $requeteDonnees['entite_id'] = $requeteDonnee[$entites.'_id'];
                        $this->modifier_in_use_status_entite($requeteDonnees);
                    }
                }
            }
            else 
            {
                return "L'entité ".$requeteDonnee['nom_entite']." n'existe pas comme table dans la base de données. Vérifier que vous l'avez écrite correctement dans votre url.";
            }
        }
 
        public function modifier_entite($requeteDonnee)
        {
            global $bdd;
            //initilaliser les variables à utiliser
            //est une chaine qui représente la partie des colonnes dans la requete SQL d'insertion
            $chaineColonne =  '';
            //Récuperer la liste des nom de colonnes d'une table donnée
            $listeColonne = array();
            $listeColonne = $this->afficher_colonne($requeteDonnee);
             //Vérifier si la table demandée existe dans la base de données
            if(isset($listeColonne[0]['column_name']))
            {
                //Initilaliser un tableau contenant les noms de colonne qui n'interviennent pas dans la requete de modification
                $colonneExclu = 
                array(
                    $requeteDonnee['nom_entite'].'_active_status',
                    $requeteDonnee['nom_entite'].'_in_use_status',
                    $requeteDonnee['nom_entite'].'_version',
                    $requeteDonnee['nom_entite'].'_create_user_profil_id',
                    $requeteDonnee['nom_entite'].'_modify_datetime',
                    $requeteDonnee['nom_entite'].'_create_datetime',
                    $requeteDonnee['nom_entite'].'_validation_status',
                    $requeteDonnee['nom_entite'].'_verification_status',
                    $requeteDonnee['nom_entite'].'_code_unique'
                );

                if($requeteDonnee['nom_entite'] == 'user')
                {
                    array_push($colonneExclu, 'identite_id', 'user_version_password');
                }
                //parcourir la liste des colonnes 
                foreach($listeColonne as $colonne)
                {
                    //vérifier si une colonne du tableau des colonnes de la table demandée est exclue de la requete de modification
                    if(!in_array($colonne['column_name'], $colonneExclu))
                    {
                        //construire la suite de colonne en incrementant la concatenation
                        $chaineColonne .= $colonne['column_name'].'= :'.$colonne['column_name'].', ';
                        //charger le tableau des données à modifier dans la table
                        $tableauDonne[$colonne['column_name']] = $requeteDonnee[$colonne['column_name']];
                    }
                }
                //Ajouter la colonne de modification de la date de modification
                if($requeteDonnee['nom_entite'] == 'user')
                {
                    $chaineColonne .= $requeteDonnee['nom_entite'].'_modify_datetime'.'= NOW(), '
                    .$requeteDonnee['nom_entite'].'_version ='.$requeteDonnee['nom_entite'].'_version + 1, '
                    .$requeteDonnee['nom_entite'].'_version_password ='.$requeteDonnee['nom_entite'].'_version_password + 1 ';
                }
                else
                {
                    $chaineColonne .= $requeteDonnee['nom_entite'].'_modify_datetime'.'= NOW(), '
                    .$requeteDonnee['nom_entite'].'_version ='.$requeteDonnee['nom_entite'].'_version + 1';
                }
                //construire la requete finale de modification
                $requeteModifier ='UPDATE app.tb_'.$requeteDonnee['nom_entite'].' SET '.$chaineColonne.
                'WHERE '.$requeteDonnee['nom_entite'].'_id = :'.$requeteDonnee['nom_entite'].'_id';
                //exécueter la requete preparé
                $req = $bdd->prepare($requeteModifier);
                //inclure le tableau des donnees à modifier
                $req->execute($tableauDonne); 
                
                //Recupération des informations des eventuelles erreurs
                $infoErreur = $req->errorInfo();

                if($infoErreur[1] != '')
                     return $infoErreur[2];
                else
                    "Modification réussie";
            }
            else 
            {
                return "L'entité ".$requeteDonnee['nom_entite']." n'existe pas comme table dans la base de données. Vérifier que vous l'avez écrite correctement dans votre url.";
            }
        }

        public function selectionner_entite($requeteDonnee)
        {
            global $bdd;
            $req = $bdd->prepare('SELECT * 
            FROM app.tb_'.$requeteDonnee['nom_entite'].'
            WHERE '.$requeteDonnee['nom_entite'].'_id =:entiteId ');
            $req->execute(array('entiteId'=> $requeteDonnee[$requeteDonnee['nom_entite'].'_id']));
            return $req->fetchAll(2);
        }

        public function selectionner_entite_cle($requeteDonnee)
        {
            global $bdd;
            $req = $bdd->prepare('SELECT * 
            FROM app.tb_'.$requeteDonnee['nom_entite'].'
            WHERE '.$requeteDonnee['cle'].' = :cle');
            $req->execute(array('cle'=> $requeteDonnee['valeur_cle']));
            return $req->fetchAll(2);
        }

        public function selectionner_entite_cle_1($requeteDonnee)
        {
            global $bdd;
            $req = $bdd->prepare('SELECT * 
            FROM app.tb_'.$requeteDonnee['nom_entite'].'
            WHERE '.$requeteDonnee['cle'].' ILIKE :cle');
            $req->execute(array('cle'=> $requeteDonnee['valeur_cle']));
            return $req->fetchAll(2);
        }

        //Fonction pour afficher les noms des colonnes d'une table donnée
        public function afficher_cles_etrangeres($requeteDonnee)
        {
            global $bdd;
            if(isset($requeteDonnee['nom_entite']))
            {
                //Requete de selection des informations d'une table donnée
                $req = $bdd->prepare("SELECT column_name
                FROM information_schema.columns WHERE table_name = :entite AND column_name NOT LIKE '%".$requeteDonnee['nom_entite']."%'");
                $req->execute(array('entite'=> 'tb_'.$requeteDonnee['nom_entite']));
                return $req->fetchAll(2);         
            }  
            else
            {
                return "Le nom de l'entité ne doit pas etre null. Vérifier que le parametre nom_entite dans votre url est écrit correctement.";
            }
        }

        public function afficher_entite_peres($requeteDonnee)
        {
            $listeClesEtrangeres = $this->afficher_cles_etrangeres($requeteDonnee);
            $i = 0;
            $listeEntite = array();
            foreach ($listeClesEtrangeres as $cle)
            {
                $listeEntite[$i] = str_replace("_id", "", $cle['column_name']);
                $i++;
            }
            return $listeEntite;
        }

        public function selectionner_table_avec_designation()
        {
            global $bdd;
            //Requete de selections des informations des tables ayant la colonne designation
            $req = $bdd->query("SELECT table_name
            FROM information_schema.columns WHERE column_name LIKE '%_designation'");
            $listeTable = $req->fetchAll(2);
            $tableDesignation = array();
            $i = 0;
            foreach($listeTable as $table)
            {
                $tableDesignation[$i] = $table['table_name'];
                $i++;
            }
            return $tableDesignation;    
        }

        public function selectionner_table_fille($requeteDonnee)
        {
            global $bdd;
            //Requete de selections les tables filles d'une table donnée
            $req = $bdd->query("SELECT table_name
            FROM information_schema.columns WHERE column_name LIKE '".$requeteDonnee['nom_entite']."_id'");
            $listeTable = $req->fetchAll(2);
            $tableFille = array();
            $i = 0;
            foreach($listeTable as $table)
            {
                $pos = strpos($table['table_name'], 'vw_');
                if($pos === false)
                {
                    $tableFille[$i] = $table['table_name'];
                    $i++;
                }
               
            }
            return $tableFille;     
        }

        public function modifier_entite_cle($requeteDonnee) 
        {
            global $bdd;
            $req = $bdd->prepare('UPDATE app.tb_'.$requeteDonnee['nom_entite'].'
            SET '.$requeteDonnee['designation_cle'].' = '.$requeteDonnee['valeur_cle'].',
            '.$requeteDonnee['nom_entite'].'_version = '.$requeteDonnee['nom_entite'].'_version + 1
            WHERE '.$requeteDonnee['designation_id'].' = :entiteId');
            $req->execute(array('entiteId'=> $requeteDonnee['valeur_id']));
        }

        public function modifier_user($requeteDonnee) 
        {
            global $bdd;
            $req = $bdd->prepare("UPDATE app.tb_user
            SET user_password = '".$requeteDonnee['user_password']."',
            user_version_password = user_version_password + 1
            WHERE user_id = :entiteId");
            $req->execute(array('entiteId'=> $requeteDonnee['user_id']));
        }

    }

    //$requeteCreer = "INSERT INTO app.tb_entite_document(entite_document_code_unique, type_document_id, identite_id, entite_document_url, entite_document_contenu) VALUES(?,?,?,?,?)";
    ?>
