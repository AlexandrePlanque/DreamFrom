<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\models\UserProjet;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUserProjet;
use BWB\Framework\mvc\dao\DAOUser;

/**
 * Description of Joinprojet
 *
 * @author fabien
 */
class JoinProjetController extends Controller{
    
    //cette fonction récupère l'id du user courant 
    
    public function getUser() {
        
    // initialisation du DAO user 
        setcookie("cookie","Aziraphale",time()+3600*24,"/");
        $infoUser = new DAOUser;
        
   // récupère l'id du user en cours
        $userId = $infoUser->getIdByPseudo($_COOKIE['cookie']);
    
        return $userId;
    }
    
    public function selectUser() {
        
    }
    // récupère l'id du projet 
    public function getProject(){
       // $projetId= $this->inputPost();
        $id = $_POST["projetId"];
        return $id;
    }
    // cette fonction permet à un membre connecté de rejoindre un projet
    
    public function joinProject(){
    
        $userid=  $this->getUser();
        $projetid = $this->getProject();
        
        $datas = array(
            "user"=>$userid,
            "projet"=>$projetid
        );
//        var_dump($datas);        
           //     echo json_encode($datas);
        $newPlayer = new UserProjet();
        
        $newPlayer->setProjet_id($datas["projet"]);
        $newPlayer->setUser_id($datas["user"]);
        $newPlayer->setDroit_projet_id(0);
//        echo'yolo ?';
        
        $dao = new DAOUserProjet;
        $dao->createAsJoiner($newPlayer);
//        var_dump($newPlayer);
    }
    public function  test(){
        $this->joinProject();
        $this->render("testFabien");
    }


    // cette fonction permet au leader du projet de rajouter un membre en ayant  
    // fait la demande via MP ou tchat
    
    public function addUserToProject() {
        
    
    // récupère l'id du user ayant émis la demande 
    
    // récupère l'id du projet
    
    //
    }
    
}
