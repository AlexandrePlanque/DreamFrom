<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class DroitProjet {

		private $id;

		private $intitule;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getIntitule (){
		return $this->intitule;
	}


	public function setIntitule ($val){
		$this->intitule = $val;
	}

}