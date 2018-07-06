<?php
namespace BWB\Framework\mvc\models;

use JsonSerializable;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class Projet implements JsonSerializable {

    private $id;

		private $titre;

		private $description;

		private $chef_projet;

		private $date_creation;

		private $date_modif;

		private $theme_id;

		private $image;
                
        private $participants;
                
        private $leader;
                
        private $featProgress;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getTitre (){
		return $this->titre;
	}


	public function setTitre ($val){
		$this->titre = $val;
	}


	public function getDescription (){
		return $this->description;
	}


	public function setDescription ($val){
		$this->description = $val;
	}


	public function getChef_projet (){
		return $this->chef_projet;
	}


	public function setChef_projet ($val){
		$this->chef_projet = $val;
	}


	public function getDate_creation (){
		return $this->date_creation;
	}


	public function setDate_creation ($val){
		$this->date_creation = $val;
	}


	public function getDate_modif (){
		return $this->date_modif;
	}


	public function setDate_modif ($val){
		$this->date_modif = $val;
	}


	public function getTheme_id (){
		return $this->theme_id;
	}


	public function setTheme_id ($val){
		$this->theme_id = $val;
	}


	public function getImage (){
		return $this->image;
	}


	public function setImage ($val){
		$this->image = $val;
    }

        public function getParticipants (){
		return $this->participants;
	}

	public function setParticipants ($val){
		$this->participants = $val;
    }   

        
    public function getLeader (){
		return $this->leader;
	}


	public function setLeader ($val){
		$this->leader = $val;
	}   
    
    public function getFeatProgress (){
		return $this->featProgress;
	}

    public function setFeatProgress ($val){
		$this->featProgress = $val;
	}   
        
    public function jsonSerialize() {
          return ([
                'id' => $this->getId(),
                'titre' => $this->getTitre(),
                'description' => $this->getDescription(),
                'date_creation' => $this->getDate_creation(),
                'date_modif' => $this->getDate_modif(),
                'theme_id' => $this->getTheme_id(),
                'image' => $this->getImage(),
                'leader' => $this->getLeader(),
                'featProgress' => $this->getFeatProgress(),
                ]);
    }
}