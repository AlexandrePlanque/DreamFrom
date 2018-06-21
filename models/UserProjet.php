<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class UserProjet {

		private $user_id;

		private $projet_id;

		private $droit_projet_id;


/* ____________________ Getter and Setter Part ____________________ */


	public function getUser_id (){
		return $this->user_id;
	}


	public function setUser_id ($val){
		$this->user_id = $val;
	}


	public function getProjet_id (){
		return $this->projet_id;
	}


	public function setProjet_id ($val){
		$this->projet_id = $val;
	}


	public function getDroit_projet_id (){
		return $this->droit_projet_id;
	}


	public function setDroit_projet_id ($val){
		$this->droit_projet_id = $val;
	}

}