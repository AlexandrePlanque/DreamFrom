<?php
namespace BWB\Framework\mvc\models;

use BWB\Framework\mvc\UserInterface;
/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


Class User implements UserInterface {

		private $id;

		private $pseudo;

		private $password;

		private $nom;

		private $prenom;

		private $email;

		private $civilite;

		private $tel;

		private $date_creation;

		private $privilege_id;

		private $adresse_id;

		private $adresse;
                
		private $actif_id;

		private $theme_id;

		private $theme;
		
		private $avatar;


/* ____________________ Getter and Setter Part ____________________ */


	public function getId (){
		return $this->id;
	}


	public function setId ($val){
		$this->id = $val;
	}


	public function getPseudo (){
		return $this->pseudo;
	}


	public function setPseudo ($val){
		$this->pseudo = $val;
	}


	public function getPassword (){
		return $this->password;
	}


	public function setPassword ($val){
		$this->password = $val;
	}


	public function getNom (){
		return $this->nom;
	}


	public function setNom ($val){
		$this->nom = $val;
	}


	public function getPrenom (){
		return $this->prenom;
	}


	public function setPrenom ($val){
		$this->prenom = $val;
	}


	public function getEmail (){
		return $this->email;
	}


	public function setEmail ($val){
		$this->email = $val;
	}


	public function getCivilite (){
		return $this->civilite;
	}


	public function setCivilite ($val){
		$this->civilite = $val;
	}


	public function getTel (){
		return $this->tel;
	}


	public function setTel ($val){
		$this->tel = $val;
	}


	public function getDate_creation (){
		return $this->date_creation;
	}


	public function setDate_creation ($val){
		$this->date_creation = $val;
	}


	public function getPrivilege_id (){
		return $this->privilege_id;
	}


	public function setPrivilege_id ($val){
		$this->privilege_id = $val;
	}


	public function getAdresse_id (){
		return $this->adresse_id;
	}


	public function setAdresse_id ($val){
		$this->adresse_id = $val;
	}

	public function getAdresse (){
		return $this->adresse;
	}


	public function setAdresse ($val){
		$this->adresse = $val;
	}

	public function getActif_id (){
		return $this->actif_id;
	}


	public function setActif_id ($val){
		$this->actif_id = $val;
	}


	public function getTheme_id (){
		return $this->theme_id;
	}


	public function setTheme_id ($val){
		$this->theme_id = $val;
	}

	public function getTheme (){
		return $this->theme;
	}


	public function setTheme ($val){
		$this->theme = $val;
	}


	public function getAvatar (){
		return $this->avatar;
	}


	public function setAvatar ($val){
		$this->avatar = $val;
	}

        public function getRoles() {
            
        }

        public function getUsername() {
            return $this->getPseudo();
        }
        
        
}