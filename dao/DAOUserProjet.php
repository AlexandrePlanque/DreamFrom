<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\User_projet;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOUserProjet extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($entity){

		$sql = "INSERT INTO user_projet (user_id,projet_id,droit_projet_id) VALUES('" . $entity->getUser_id() . ',' . $entity->getProjet_id() . ',' . $entity->getDroit_projet_id() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM user_projet WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new User_projet();
		$entity->setUser_id();
		$entity->setProjet_id();
		$entity->setDroit_projet_id();
		return $entity;
	}


	public function update ($entity){

		$sql = "UPDATE user_projet SET user_id = '" . $entity->getUser_id() ."',projet_id = '" . $entity->getProjet_id() ."',droit_projet_id = '" . $entity->getDroit_projet_id() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM user_projet WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM user_projet";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new User_projet();
			$entity->setUser_id($result['user_id']);
			$entity->setProjet_id($result['projet_id']);
			$entity->setDroit_projet_id($result['droit_projet_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM user_projet";
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
			$entity = new User_projet;
			$entity->setUser_id($result['user_id']);
			$entity->setProjet_id($result['projet_id']);
			$entity->setDroit_projet_id($result['droit_projet_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        // invoquée lorsqu'un user décide de rejoindre un projet
        	public function createAsJoiner ($entity){
		$sql = "INSERT INTO user_projet (user_id,projet_id,droit_projet) VALUES('" . $entity->getUser_id() . "','" . $entity->getProjet_id() . "','0')";
                $this->getPdo()->query($sql);
	}
        
        // invoquée lorsqu'un user est invité à rejoindre un projet
//        	public function createAsInvited ($entity){
//		$sql = "INSERT INTO user_projet (user_id,projet_id,droit_projet_id) VALUES('" . $entity->getUser_id() . ',' . $entity->getProjet_id() . "',0)";
//		$this->getPdo()->query($sql);
//	}


}