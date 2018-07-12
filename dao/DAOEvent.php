<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Event;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOEvent extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO event (nom,description,date_creation,type,user_id) VALUES('" . $entity->getNom() . ',' . $entity->getDescription() . ',' . $entity->getDate_creation() . ',' . $entity->getType() . ',' . $entity->getUser_id() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM event WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Event();
		$entity->setNom();
		$entity->setDescription();
		$entity->setDate_creation();
		$entity->setType();
		$entity->setUser_id();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE event SET nom = '" . $entity->getNom() ."',description = '" . $entity->getDescription() ."',date_creation = '" . $entity->getDate_creation() ."',type = '" . $entity->getType() ."',user_id = '" . $entity->getUser_id() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM event WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM `event` ORDER BY `event`.`date_creation` DESC limit 5";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Event();
			$entity->setId($result['id']);
			$entity->setNom($result['nom']);
			$entity->setDescription($result['description']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setType($result['type']);
			$entity->setUser_id($result['user_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM event";
		$i = 0;
		foreach($filter as $key => $value){
			if($i===0){
				$sql .= " WHERE ";
			} else {
				$sql .= " AND ";
			}
			$sql .= $key . " = '" . $value . "'";
			$i++;
		}
                $sql .= " ORDER BY `event`.`date_creation` DESC limit 5";
		$entities = array();
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		foreach($results as $result){
			$entity = new Event;
			$entity->setId($result['id']);
			$entity->setNom($result['nom']);
			$entity->setDescription($result['description']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setType($result['type']);
			$entity->setUser_id($result['user_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}