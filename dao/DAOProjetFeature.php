<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Projet_feature;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOProjetFeature extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO projet_feature (projet_id,feature_id,user_id) VALUES('" . $entity->getProjet_id() . ',' . $entity->getFeature_id() . ',' . $entity->getUser_id() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM projet_feature WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Projet_feature();
		$entity->setProjet_id();
		$entity->setFeature_id();
		$entity->setUser_id();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE projet_feature SET projet_id = '" . $entity->getProjet_id() ."',feature_id = '" . $entity->getFeature_id() ."',user_id = '" . $entity->getUser_id() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM projet_feature WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM projet_feature";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Projet_feature();
			$entity->setProjet_id($result['projet_id']);
			$entity->setFeature_id($result['feature_id']);
			$entity->setUser_id($result['user_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM projet_feature";
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
			$entity = new Projet_feature;
			$entity->setProjet_id($result['projet_id']);
			$entity->setFeature_id($result['feature_id']);
			$entity->setUser_id($result['user_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}