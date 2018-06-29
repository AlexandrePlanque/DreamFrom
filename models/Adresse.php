<?php
namespace BWB\Framework\mvc\models;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Adresse {

		private $id;

		private $rue;

		private $numero;

		private $code_postal;

		private $ville;
                
                function __construct($rue="null", $numero="null", $code_postal="null", $ville="null") {
                    $this->id = $id;
                    $this->rue = $rue;
                    $this->numero = $numero;
                    $this->code_postal = $code_postal;
                    $this->ville = $ville;
                }

                
/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getRue (){
		return $this->rue;
	}


	public function setRue ($val){
		$this->rue = $val;
	}


	public function getNumero (){
		return $this->numero;
	}


	public function setNumero ($val){
		$this->numero = $val;
	}


	public function getCode_postal (){
		return $this->code_postal;
	}


	public function setCode_postal ($val){
		$this->code_postal = $val;
	}


	public function getVille (){
		return $this->ville;
	}


	public function setVille ($val){
		$this->ville = $val;
	}

}