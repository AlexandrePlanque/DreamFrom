<?php
namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\User;
use PDO;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOUser extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO user (pseudo,password,nom,prenom,email,civilite,tel,date_creation,privilege_id,adresse_id,actif_id,theme_id,avatar) VALUES('" . $entity->getPseudo() . ',' . $entity->getPassword() . ',' . $entity->getNom() . ',' . $entity->getPrenom() . ',' . $entity->getEmail() . ',' . $entity->getCivilite() . ',' . $entity->getTel() . ',' . $entity->getDate_creation() . ',' . $entity->getPrivilege_id() . ',' . $entity->getAdresse_id() . ',' . $entity->getActif_id() . ',' . $entity->getTheme_id() . ',' . $entity->getAvatar() . "')";
		$this->getPdo()->query($sql);
	}

/*
 * La méthode retrieve s'appuie sur la méthode de pdo setFetchMode FETCH_CLASS qui permet de générer un objet
 * directement après avoir récuperer les données
 */
	public function retrieve ($id){

		$sql = "SELECT *,theme.intitule as theme from user inner join theme on user.theme_id = theme.id WHERE user.id=1"; //. $id;
		$statement = $this->getPdo()->query($sql);
                $statement->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\User");
                $test = $statement->fetch();
		return $test;

	}


	public function update ($array){
                var_dump($array);
		$sql = "UPDATE user SET ".(isset($array['pseudo'])?"pseudo = '" . $entity->getPseudo() ."',password = '" : ""); //."pseudo = '" . $entity->getPseudo() ."',password = '" . $entity->getPassword() ."',nom = '" . $entity->getNom() ."',prenom = '" . $entity->getPrenom() ."',email = '" . $entity->getEmail() ."',civilite = '" . $entity->getCivilite() ."',tel = '" . $entity->getTel() ."',date_creation = '" . $entity->getDate_creation() ."',privilege_id = '" . $entity->getPrivilege_id() ."',adresse_id = '" . $entity->getAdresse_id() ."',actif_id = '" . $entity->getActif_id() ."',theme_id = '" . $entity->getTheme_id() ."',avatar = '" . $entity->getAvatar() ." WHERE id = ". $entity->getId();
//		if ($this->getPdo()->exec($sql) !== 0){
//			echo "Updated";
//		} else {
//			echo "Failed";
//		}
                echo $sql;
	}


	public function delete ($id){

		$sql = "DELETE FROM user WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
                
                $sql = "select *, theme.intitule from user inner join theme on user.theme_id = theme.id order by date_creation asc";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new User();
			$entity->setId($result['id']);
			$entity->setPseudo($result['pseudo']);
			$entity->setPassword($result['password']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setEmail($result['email']);
			$entity->setCivilite($result['civilite']);
			$entity->setTel($result['tel']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setPrivilege_id($result['privilege_id']);
			$entity->setAdresse_id($result['adresse_id']);
			$entity->setActif_id($result['actif_id']);
			$entity->setTheme_id($result['intitule']);
			$entity->setAvatar($result['avatar']);
			array_push($entities,$entity);
		}
		return $entities;
	}

	public function getAllOrder ($array){
            
                $sql = "select *, theme.intitule from user inner join theme on user.theme_id = theme.id";
                foreach($array as $ar){
                    $sql.= $ar;
                };

		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new User();
			$entity->setId($result['id']);
			$entity->setPseudo($result['pseudo']);
			$entity->setPassword($result['password']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setEmail($result['email']);
			$entity->setCivilite($result['civilite']);
			$entity->setTel($result['tel']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setPrivilege_id($result['privilege_id']);
			$entity->setAdresse_id($result['adresse_id']);
			$entity->setActif_id($result['actif_id']);
			$entity->setTheme_id($result['intitule']);
			$entity->setAvatar($result['avatar']);
			array_push($entities,$entity);
		}
		return $entities;
	}

	public function getAllBy ($filter){
		$sql = "SELECT * FROM user";
		$i = 0;
		foreach($filter as $key => $value){
			if($i===0){
				$sql .= " WHERE ";
			} else {
				$sql .= " AND ";
			}
			$sql .= $key . " = " . $value . "'";
			$i++;
		}
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new User;
			$entity->setId($result['id']);
			$entity->setPseudo($result['pseudo']);
			$entity->setPassword($result['password']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setEmail($result['email']);
			$entity->setCivilite($result['civilite']);
			$entity->setTel($result['tel']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setPrivilege_id($result['privilege_id']);
			$entity->setAdresse_id($result['adresse_id']);
			$entity->setActif_id($result['actif_id']);
			$entity->setTheme_id($result['theme_id']);
			$entity->setAvatar($result['avatar']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        

}
