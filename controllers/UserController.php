<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\models\User;
use BWB\Framework\mvc\models\Theme;
use BWB\Framework\mvc\models\Adresse;

/**
 * Description of UserController
 *
 * @author alexandreplanque
 */

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\dao\DAOTheme;

/**
 * Description of VideothequeController
 *
 * @author alexandreplanque
 */
class UserController extends Controller{
    
    public function getUsers(){
        $dao = new DAOUser();
        $tata = (new DAOTheme())->getAll();
        if(count($this->inputGet()) === 0 && $this->inputGet()['intitule'] !== ""){
        $toto = $dao->getAll();
        $datas = array("users" => $toto, "themes" => $tata);    
        }else{
        $tosto = $dao->getAllOrder($this->getParams());
        $datas = array("users" => $tosto, "themes" => $tata);
        }
        
        $this->render("testcartd", $datas);
    }
    
    
    public function getParams(){
        $para = $this->inputGet();
        var_dump($para);
        echo $this->inputGet()['intitule'];
        $retour = array();
        $i=0;
        foreach($para as $key => $value){
            $temp = "";
                if($i === 0){
                    if($key === "intitule"){
                        $temp = " WHERE theme.".$key." = '".$value."'";  
                    }else{
                        $temp = " WHERE ".$key." = '".$value."'";
                    }
                }else if($value === "asc" || $value === "desc"){
                    $temp = " ORDER BY ".$key." ".$value;
                }else{
                    $temp = " AND ".$key." = '".$value."'";  
                }
            array_push($retour, $temp);
            $i++;
        }
        return $retour;
    }
    
    public function register(){
        $this->render("inscription");
//        $this->createUser();
    }
    
    public function createUser(){
        
        // création d'un nouvel objet Adresse / Utilisateur / DAOUser
        $adresse = new Adresse();
        $user = new User();
        $dao = new DAOUser();
        
        // création d'une variable pour stocker la date actuelle au bon format
        $datetime = date("Y-m-d");

        // récupération des champs du formulaire
            $user->setNom($_POST["nom"]);
            $user->setPrenom($_POST["prenom"]);
            $user->setPseudo($_POST["pseudo"]);
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            
            // on utilise la methode createAdresse du DAOUser pour remplir la table Adresse
            $user->setAdresse_id($dao->createAdresse($adresse));
            $user->setCivilite("1");
            $user->setTel("");
            $user->setPrivilege_id("1");
            
            // on passe en argument du setteur Date_creation, la variable qui stocke la date
            $user->setDate_creation($datetime);
            $user->setActif_id("2");
            $user->setTheme_id("1");
            $user->setAvatar("");
            
            // on fait appel a la methode create du DAOUser 
     
            
            if($dao->verifPseudo()){
              $userStatus = $dao->create($user);
              echo"inscription rèussie";
            }
            else{
                echo"echec de l'inscription";
            }
            


            
            
   
        
    }
    
    
}  
