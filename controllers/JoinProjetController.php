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
        setcookie("cookie","jacksparrow",time()+3600*24,"/");
        $infoUser = new DAOUser;
        
   // récupère l'id du user en cours
        $userId = $infoUser->getIdByPseudo($_COOKIE['cookie']);
        echo "<hr>". "userid";
        var_dump($userId);
        return $userId;
    }
    
    public function selectUser() {
        
    }
    // récupère l'id du projet 
    public function getProject(){
       // $projetId= $this->inputPost();
        $id = $_POST["projetId"];
        echo '<hr>'." id du proj";
        var_dump($id);
        return $id;
    }
    // cette fonction permet à un membre connecté de rejoindre un projet
    
    public function joinProject(){
    // récupératon des données dynamiques nécessaires
        $userid=  $this->getUser();
        //var_dump($userid);
        $projetid = $this->getProject();
        $datas = array(
            "user"=>$userid,
            "projet"=>$projetid
        );
        echo "<hr>"."datas";
        var_dump($datas);
    // création du models et mise en place des setters
        $newPlayer = new UserProjet();
        $newPlayer->setProjet_id($datas["projet"]);
        $newPlayer->setUser_id($datas["user"]);
        $newPlayer->setDroit_projet_id(0);

    // création du dao
        $dao = new DAOUserProjet;
        $dao->createAsJoiner($newPlayer);
         echo "<hr>"."newPlayer";
        var_dump($newPlayer);
    }
    public function  showView(){
        $this->joinProject();
        $this->render("ficheprojet");
    }    
}
