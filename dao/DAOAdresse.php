<?php
namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Adresse;
use PDO;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOAdresse extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO adresse (rue,numero,code_postal,ville) VALUES('" . $entity->getRue() . ',' . $entity->getNumero() . ',' . $entity->getCode_postal() . ',' . $entity->getVille() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * from adresse where id = " .$id;
		$statement = $this->getPdo()->query($sql);
                $statement->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Adresse");
                $test = $statement->fetch();
		return $test;
	}


	public function update ($array){

		$sql = "UPDATE adresse SET ";
                foreach($array as $key){
                    if(key($array) !== "id"){
                    $sql.= key($array) . " = '" . $key . "',"; 
                    }
                    next($array);
                }
                $sql = substr($sql,  0, -1)." WHERE id = ".$array['id'];
                $this->getPdo()->exec($sql);
	}


	public function delete ($id){

		$sql = "DELETE FROM adresse WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM adresse";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Adresse();
			$entity->setId($result['id']);
			$entity->setRue($result['rue']);
			$entity->setNumero($result['numero']);
			$entity->setCode_postal($result['code_postal']);
			$entity->setVille($result['ville']);
			array_push($entities,$entity);
		}
		return $entities;
	}


	public function getAllBy ($filter){
		$sql = "SELECT * FROM adresse";
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
			$entity = new Adresse;
			$entity->setId($result['id']);
			$entity->setRue($result['rue']);
			$entity->setNumero($result['numero']);
			$entity->setCode_postal($result['code_postal']);
			$entity->setVille($result['ville']);
			array_push($entities,$entity);
		}
		return $entities;
	}
        
}