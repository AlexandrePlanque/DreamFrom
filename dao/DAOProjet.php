<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Projet;
use PDO;

/*
 * creer avec l'objet issue de la classe CreateEntity Class 
 */

class DAOProjet extends DAO {

    public function __construct() {
        parent::__construct();
    }

    /* ____________________Crud methods____________________ */

    public function create($entity) {
        
        // requete sql permettant de remplir la bdd "projet" avec les données récupérées du formulaire
        $sql = "INSERT INTO projet (titre,description,date_creation,date_modif,theme_id,image) "
                . "VALUES('" . $entity->getTitre() . "',' ". $entity->getDescription() ." ',' ". $entity->getDate_creation() ." ',' ". $entity->getDate_modif() ." ',". $entity->getTheme_id() .",'" . $entity->getImage() . "')";
        $ok= $this->getPdo()->exec($sql);

        //si $ok est egal a 1 alors récupère l'id du projet qui vient d'etre créé.
        if($ok === 1){
            $idProjet= $this->getPdo()->lastInsertId();

        // création d'un doauser pour intégrer la relation entre le user et le projet
        
        $dao = new DAOUser();
        // récupération de l'id du user courant en récupérant son id à partir du cookie
        $id = $dao->getIdByPseudo($_COOKIE['cookie']);

        // ajoute dans la table projet_user les id du projet  + celui de l'utilisateur courant 
        $projUser = "INSERT INTO user_projet (user_id,projet_id,droit_projet)"
                ."VALUES('".$id."','".$idProjet."',1)";
        $this->getPdo()->exec($projUser);
        }
    }

    public function retrieve($id) {
        
        $sql = "SELECT * FROM projet WHERE id=" . $id;
        $statement = $this->getPdo()->query($sql);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $entity = new Projet();
        $entity->setId($result['id']);
        $entity->setTitre($result['titre']);
        $entity->setDescription($result['description']);
        $entity->setParticipants($this->getNbParticipants($id));
        $entity->setDate_creation($result['date_creation']);
        $entity->setDate_modif($result['date_modif']);
        $entity->setTheme_id($result['theme_id']);
        $entity->setLeader($this->getNomLeader($id));
        $entity->setImage($result['image']);
        $entity->setFeatProgress($this->featureProgress($id));
        $entity->setTheme($this->getTheme($result['theme_id']));
        $entity->setLeader($this->getLeader($id));
        $entity->setFeature($this->getFeature($id));
        //On utilise ce setter uniquement si un utilisateur est connecter sinon il n'y a pas lieu d'utiliser ce setter dédié à une vérif de participation
        //sur le projet courant
        (isset($_COOKIE['cookie']))?$entity->setCurrentUserIn($this->CheckCurrentUser(json_decode($_COOKIE["cookie"],true)['id'],$id)):"";

        return $entity;
    }

    public function update($array) {

        $sql = "UPDATE projet SET titre = '" . $entity->getTitre() . "',description = '" . $entity->getDescription() . "',chef_projet = '" . $entity->getChef_projet() . "',date_creation = '" . $entity->getDate_creation() . "',date_modif = '" . $entity->getDate_modif() . "',theme_id = '" . $entity->getTheme_id() . "',image = '" . $entity->getImage() . " WHERE id = " . $entity->getId();
        if ($this->getPdo()->exec($sql) !== 0) {
            echo "Updated";
        } else {
            echo "Failed";
        }
    }

    public function delete($id) {

        $sql = "DELETE FROM projet WHERE id= " . $id;
        $this->getPdo()->query($sql);
    }

    /* ____________________Repository methods____________________ */

    public function getAll() {
        $sql = "SELECT * FROM projet";
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetchAll();
        $entities = array();

        foreach ($results as $result) {
            $entity = new Projet();
            $entity->setId($result['id']);
            $entity->setTitre($result['titre']);
            $entity->setDescription($result['description']);
            $entity->setDate_creation($result['date_creation']);
            $entity->setDate_modif($result['date_modif']);
            $entity->setTheme_id($result['theme_id']);
            $entity->setImage($result['image']);
            // fait appel au setter et fonction permettant de recuperer dynamiquement le nb de participants  
            $entity->setParticipants($this->getNbParticipants($entity->getId()));
            // fait appel au setter et fonction permettant de recuperer dynamiquement le nom du chef de projet 
            $entity->setLeader($this->getNomLeader($entity->getId()));
            // fait appel au setter et fonction permettant de recuperer dynamiquement le %age de features accompli 
            $entity->setFeatProgress($this->featureProgress($entity->getId()));

            array_push($entities, $entity);
        }

        return $entities;
    }

    public function getAllBy($filter) {
        $sql = "SELECT *, theme.intitule FROM projet inner join theme on projet.theme_id = theme.id";
        $i = 0;
        foreach ($filter as $key => $value) {
            $sql .= $value;
            $i++;
        }

        $entities = array();
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetchAll();
        foreach ($results as $result) {
            $entity = new Projet;
            $entity->setId($result['id']);
            $entity->setTitre($result['titre']);
            $entity->setDescription($result['description']);
            $entity->setChef_projet($result['chef_projet']);
            $entity->setDate_creation($result['date_creation']);
            $entity->setDate_modif($result['date_modif']);
            $entity->setTheme_id($result['theme_id']);
            $entity->setImage($result['image']);
            array_push($entities, $entity);
        }
        return $entities;
    }
    
    // cette fonction récupère le nombre de participants d'un projet pour l'afficher dans la card
    public function getNbParticipants($id) {
        // req sql pour compter dans la table user_projet les particpants selon l'id du projet
        $sql = "SELECT COUNT(*) as participants FROM user_projet WHERE projet_id = " . $id;
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetch();
        // return à partir du tableau $results de la donnée égale à la clef "participants"
        return $results["participants"];
    }

    public function getTheme($id){
        $sql = "Select intitule from theme where id =". $id;
//        echo $sql;
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetch();
        return $results["intitule"];
        
    }
    
    public function getInfoParti($id){
        $sql = "select id from user inner join user_projet on user_projet.user_id = user.id where user_projet.projet_id = ". $id;
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetchAll();
        $users = array();
        foreach($results as $result){
            array_push($users, (new DAOUser())->retrieve($result['id']));
        }
            return $users;
    }

    // fonction qui va vérifier si le projet existe déja dans la BDD
    public function verifProjet() {

        $bdd = $this->getPdo();
        // vérification si le champ titre a bien été rempli
        if (isset($_POST['titre'])) {

            // Alors dans ce cas on met la saisie du $_POST['titre'] dans la variable $pseudo
            $titre = ($_POST['titre']);

            // On insère la variable titre qui correspond à la saisie de l'utilisateur dans la requête SQL
           
            $sql = $bdd->query("SELECT titre FROM projet WHERE titre='".$titre."'");


            // recherche de résultat
            $resultat = $sql->fetch();

            
            if ($resultat) {
                // S'il y a un résultat, c'est à dire qu'il existe déjà un projet, alors "Ce projet est déjà créé"
           
                return FALSE;
            }
            // Sinon le résultat est nul ce qui veut donc dire qu'il ne contient aucun projet, donc on insère
            else {
           
                return True; //           
            }
        }
    }


        // cette fonction récupère le nom du chef de projet pour l'afficher dans la card.
        public function getNomLeader($id){
            //req sql qui joint les tables user et projet
            // si l'id du user correspond à l'id dans projet.chef_projet, affichage du pseudo selon l'id du projet
//            $sql = "SELECT user.pseudo from user INNER JOIN projet where user.id = projet.chef_projet AND projet.id = ".$id;    
            $sql = "SELECT user.pseudo from user INNER JOIN user_projet where user.id = user_projet.user_id AND user_projet.projet_id = ".$id." AND user_projet.droit_projet = 1";    
            $statement = $this->getPdo()->query($sql);
		$results = $statement->fetch();
                return $results['pseudo'];
        }
        
        public function getLeader($id){
            $sql = "SELECT user.* from user INNER JOIN user_projet where user.id = user_projet.user_id AND user_projet.projet_id = ".$id." AND user_projet.droit_projet = 1";    
            $statement = $this->getPdo()->query($sql);
            $statement->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\User");
            $leader = $statement->fetch();
            return $leader;
            
        }
        
        // cette fonction récupère les features pour afficher le %age achevé
        public function featureProgress($id){
            //req sql qui recupére le nombre de features selon l id du projet
            $sql = "SELECT *  FROM projet_feature WHERE projet_id = ".$id;
            $statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
                $finies = 0; 
            foreach($results as $result){
                if($result['etat'] === "1"){
                        $finies++;
                    $pourcentage = floor($finies * 100/count($results));
                }else {
                    $pourcentage = "0";
                }
            }  
            //traitement de results pour en obtenir un %age 
            return $pourcentage."%";
        }

        public function getProfilProjet($id){
            $sql = "select * from projet inner join user_projet on projet.id = user_projet.projet_id where user_projet.user_id =".$id;
            $statement = $this->getPdo()->query($sql);
            $statement->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Projet");
            $projets = $statement->fetchAll();
            foreach($projets as $projet){
                $projet->setFeatProgress($this->getProjetFeature($projet->getId()));
            }
		return $projets;
            }
            
        public function getProfilProjetJson($id){
            $sql = "select * from projet inner join user_projet on projet.id = user_projet.projet_id where user_projet.user_id =".$id;
            $statement = $this->getPdo()->query($sql);
            $statement->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Projet");
            $projets = $statement->fetchAll();
            $retour = array();
            foreach($projets as $projet){
                $projet->setFeatProgress($this->getProjetFeature($projet->getId()));
                array_push($retour,$projet->JsonSerialize());
            }
            
		return $retour;
            }

            
            
        public function getProjetFeature($idp){
            $sql = "select * from projet_feature where projet_id =" . $idp;
            $statement = $this->getPdo()->query($sql);
            $test = $statement->fetchAll();
            $i=0;
            foreach($test as $f){
                if($f['etat']==="1"){
                    $i++;
            $testi = $i * 100 / count($test);
                }else{
                $testi =0;
                    }
            }
            return $testi."%";
            
        }
        
        public function getFeature($id){
            $sql = "select feature.*, projet_feature.etat from feature inner join projet_feature on feature.id = projet_feature.feature_id where projet_feature.projet_id =".$id;
            $statement = $this->getPdo()->query($sql);
            $statement->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Feature");
            $features = $statement->fetchAll();
            return $features;
            
        }
        
        public function checkCurrentUser($id,$idp){
            $sql = "select user_id from user_projet where user_id = ".$id." AND projet_id = ".$idp;
            $statement = $this->getPdo()->query($sql);
            $result = $statement->fetch();
            if((int)$result['user_id'] === (int)$id){
                return true;
            }else{
                return false;
            }
        }
}
