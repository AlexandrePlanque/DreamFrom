<?php
namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Projet;
use PDO;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOProjet extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO projet (titre,description,chef_projet,date_creation,date_modif,theme_id,image) VALUES('" . $entity->getTitre() . ',' . $entity->getDescription() . ',' . $entity->getChef_projet() . ',' . $entity->getDate_creation() . ',' . $entity->getDate_modif() . ',' . $entity->getTheme_id() . ',' . $entity->getImage() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM projet WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Projet();
		$entity->setTitre();
		$entity->setDescription();
		$entity->setChef_projet();
		$entity->setDate_creation();
		$entity->setDate_modif();
		$entity->setTheme_id();
		$entity->setImage();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE projet SET titre = '" . $entity->getTitre() ."',description = '" . $entity->getDescription() ."',chef_projet = '" . $entity->getChef_projet() ."',date_creation = '" . $entity->getDate_creation() ."',date_modif = '" . $entity->getDate_modif() ."',theme_id = '" . $entity->getTheme_id() ."',image = '" . $entity->getImage() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM projet WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM projet";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Projet();
			$entity->setId($result['id']);
			$entity->setTitre($result['titre']);
			$entity->setDescription($result['description']);
			$entity->setChef_projet($result['chef_projet']);
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
			
                        array_push($entities,$entity);

                        
		}

		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT *, theme.intitule FROM projet inner join theme on projet.theme_id = theme.id";
		$i = 0;
		foreach($filter as $key => $value){
//			if($i===0){
//				$sql .= " WHERE ";
//			} else {
//				$sql .= " AND ";
//			}
//			$sql .= $key . " = " . $value . "'";
                    $sql .= $value;
			$i++;
		}
                echo $sql;
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new Projet;
			$entity->setId($result['id']);
			$entity->setTitre($result['titre']);
			$entity->setDescription($result['description']);
			$entity->setChef_projet($result['chef_projet']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setDate_modif($result['date_modif']);
			$entity->setTheme_id($result['theme_id']);
			$entity->setImage($result['image']);
			array_push($entities,$entity);
		}
		return $entities;
	}

        // cette fonction récupère le nombre de participants d'un projet pour l'afficher dans la card
        public function  getNbParticipants($id) {
            // req sql pour compter dans la table user_projet les particpants selon l'id du projet
            $sql = "SELECT COUNT(*) as participants FROM user_projet WHERE projet_id = ".$id;
            $statement = $this->getPdo()->query($sql);
		$results = $statement->fetch();
            // return à partir du tableau $results de la donnée égale à la clef "participants"
                return $results["participants"];
        }
        
        // cette fonction récupère le nom du chef de projet pour l'afficher dans la card.
        public function getNomLeader($id){
            //req sql qui joint les tables user et projet
            // si l'id du user correspond à l'id dans projet.chef_projet, affichage du pseudo selon l'id du projet
            $sql = "SELECT user.pseudo from user INNER JOIN projet where user.id = projet.chef_projet AND projet.id = ".$id;    
            $statement = $this->getPdo()->query($sql);
		$results = $statement->fetch();
                return $results['pseudo'];
        }
        
        // cette fonction récupère les features pour afficher le %age achevé
        public function featureProgress($id){
            //req sql qui recupére le nombre de features selon l id du projet
            $sql = "SELECT *  FROM projet_feature WHERE projet_id = ".$id;
            $statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
                $finies = 0; 
            foreach($results as $result){
                if($result['fini'] === "1"){
                        $finies.=1;
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
                $projet->setPourcentage($this->getProjetFeature($projet->getId()));
            }
		return $projets;
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
}