<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Privilege {

		private $id;

		private $rang;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getRang (){
		return $this->rang;
	}


	public function setRang ($val){
		$this->rang = $val;
	}

}