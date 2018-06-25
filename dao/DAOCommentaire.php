<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Commentaire;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOCommentaire extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO commentaire (message,date_creation,sujet_idsujet,user_id) VALUES('" . $entity->getMessage() . ',' . $entity->getDate_creation() . ',' . $entity->getSujet_idsujet() . ',' . $entity->getUser_id() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM commentaire WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Commentaire();
		$entity->setMessage();
		$entity->setDate_creation();
		$entity->setSujet_idsujet();
		$entity->setUser_id();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE commentaire SET message = '" . $entity->getMessage() ."',date_creation = '" . $entity->getDate_creation() ."',sujet_idsujet = '" . $entity->getSujet_idsujet() ."',user_id = '" . $entity->getUser_id() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM commentaire WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM commentaire";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Commentaire();
			$entity->setId($result['id']);
			$entity->setMessage($result['message']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setSujet_idsujet($result['sujet_idsujet']);
			$entity->setUser_id($result['user_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM commentaire";
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
			$entity = new Commentaire;
			$entity->setId($result['id']);
			$entity->setMessage($result['message']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setSujet_idsujet($result['sujet_idsujet']);
			$entity->setUser_id($result['user_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}