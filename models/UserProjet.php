<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class UserProjet {

		private $user_id;

		private $projet_id;

		private $droit_projet;


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


	public function getDroit_projet (){
		return $this->droit_projet;
	}


	public function setDroit_projet ($val){
		$this->droit_projet = $val;
	}

}