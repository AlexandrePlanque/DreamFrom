<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Sujet;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOSujet extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO sujet (idsujet,titre,date_creation,user_id,bar_id) VALUES('" . $entity->getIdsujet() . ',' . $entity->getTitre() . ',' . $entity->getDate_creation() . ',' . $entity->getUser_id() . ',' . $entity->getBar_id() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM sujet WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Sujet();
		$entity->setIdsujet();
		$entity->setTitre();
		$entity->setDate_creation();
		$entity->setUser_id();
		$entity->setBar_id();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE sujet SET idsujet = '" . $entity->getIdsujet() ."',titre = '" . $entity->getTitre() ."',date_creation = '" . $entity->getDate_creation() ."',user_id = '" . $entity->getUser_id() ."',bar_id = '" . $entity->getBar_id() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM sujet WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM sujet";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Sujet();
			$entity->setIdsujet($result['idsujet']);
			$entity->setTitre($result['titre']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setUser_id($result['user_id']);
			$entity->setBar_id($result['bar_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM sujet";
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
			$entity = new Sujet;
			$entity->setIdsujet($result['idsujet']);
			$entity->setTitre($result['titre']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setUser_id($result['user_id']);
			$entity->setBar_id($result['bar_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}