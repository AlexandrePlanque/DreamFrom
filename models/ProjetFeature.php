<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class ProjetFeature {

		private $projet_id;

		private $feature_id;

		private $user_id;


/* ____________________ Getter and Setter Part ____________________ */


	public function getProjet_id (){
		return $this->projet_id;
	}


	public function setProjet_id ($val){
		$this->projet_id = $val;
	}


	public function getFeature_id (){
		return $this->feature_id;
	}


	public function setFeature_id ($val){
		$this->feature_id = $val;
	}


	public function getUser_id (){
		return $this->user_id;
	}


	public function setUser_id ($val){
		$this->user_id = $val;
	}

}