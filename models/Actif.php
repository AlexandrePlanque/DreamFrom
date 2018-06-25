<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Actif {

		private $id;

		private $statut;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getStatut (){
		return $this->statut;
	}


	public function setStatut ($val){
		$this->statut = $val;
	}

}