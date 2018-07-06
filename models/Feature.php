<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Feature {

		private $id;

		private $nom;
                
                private $etat;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getNom (){
		return $this->nom;
	}


	public function setNom ($val){
		$this->nom = $val;
	}

        public function getEtat (){
		return $this->etat;
	}


	public function setEtat ($val){
		$this->etat = $val;
	}
}