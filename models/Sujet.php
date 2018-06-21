<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Sujet {

		private $idsujet;

		private $titre;

		private $date_creation;

		private $user_id;

		private $bar_id;


/* ____________________ Getter and Setter Part ____________________ */


	public function getIdsujet (){
		return $this->idsujet;
	}


	public function setIdsujet ($val){
		$this->idsujet = $val;
	}


	public function getTitre (){
		return $this->titre;
	}


	public function setTitre ($val){
		$this->titre = $val;
	}


	public function getDate_creation (){
		return $this->date_creation;
	}


	public function setDate_creation ($val){
		$this->date_creation = $val;
	}


	public function getUser_id (){
		return $this->user_id;
	}


	public function setUser_id ($val){
		$this->user_id = $val;
	}


	public function getBar_id (){
		return $this->bar_id;
	}


	public function setBar_id ($val){
		$this->bar_id = $val;
	}

}