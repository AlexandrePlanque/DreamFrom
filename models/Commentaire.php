<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Commentaire {

		private $id;

		private $message;

		private $date_creation;

		private $sujet_idsujet;

		private $user_id;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getMessage (){
		return $this->message;
	}


	public function setMessage ($val){
		$this->message = $val;
	}


	public function getDate_creation (){
		return $this->date_creation;
	}


	public function setDate_creation ($val){
		$this->date_creation = $val;
	}


	public function getSujet_idsujet (){
		return $this->sujet_idsujet;
	}


	public function setSujet_idsujet ($val){
		$this->sujet_idsujet = $val;
	}


	public function getUser_id (){
		return $this->user_id;
	}


	public function setUser_id ($val){
		$this->user_id = $val;
	}

}