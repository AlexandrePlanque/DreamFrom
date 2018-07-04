<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\models\Mp;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOMp extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($array){

		$sql = "INSERT INTO mp (sujet,destinataire,message,date_creation,user_id) VALUES('" . $entity->getSujet() . ',' . $entity->getDestinataire() . ',' . $entity->getMessage() . ',' . $entity->getDate_creation() . ',' . $entity->getUser_id() . "')";
		$this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM mp WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new Mp();
		$entity->setSujet();
		$entity->setDestinataire();
		$entity->setMessage();
		$entity->setDate_creation();
		$entity->setUser_id();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE mp SET sujet = '" . $entity->getSujet() ."',destinataire = '" . $entity->getDestinataire() ."',message = '" . $entity->getMessage() ."',date_creation = '" . $entity->getDate_creation() ."',user_id = '" . $entity->getUser_id() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM mp WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$sql = "SELECT * FROM mp";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
			$entity = new Mp();
			$entity->setId($result['id']);
			$entity->setSujet($result['sujet']);
			$entity->setDestinataire($result['destinataire']);
			$entity->setMessage($result['message']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setUser_id($result['user_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}

        //dédié à récuperer tout les mp concernant un utilisateur
	public function getAllFor ($id){
		$sql = "SELECT * FROM mp order by date_creation";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();
		foreach($results as $result){
			if(($result["user_id"] === (string)$id) || ($result['destinataire'] === (string)$id)){
//                            echo "<hr>";
//                            var_dump(((new DAOUser())->getAvatar($result['destinataire'])['avatar']));
//                            echo "<hr>";
                            $entity = array( "sujet" => $result['sujet'], "message" => $result['message'], 
                                "date_creation" => $result['date_creation'], "destinataire" => $result['destinataire'], 
                                "avatarD" => ((new DAOUser())->getAvatar($result['destinataire'])['avatar']),"expediteur" => $result['user_id'],
                                "avatarE" => ((new DAOUser())->getAvatar($result['user_id'])['avatar']));
                            array_push($entities,$entity);
                        }
		}
		return $entities;
	}

	public function getAllBy ($filter){
		$sql = "SELECT * FROM mp";
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
			$entity = new Mp;
			$entity->setId($result['id']);
			$entity->setSujet($result['sujet']);
			$entity->setDestinataire($result['destinataire']);
			$entity->setMessage($result['message']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setUser_id($result['user_id']);
			array_push($entities,$entity);
		}
		return $entities;
	}
}