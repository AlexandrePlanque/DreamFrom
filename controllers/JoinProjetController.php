<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\models\UserProjet;
use BWB\Framework\mvc\models\ProjetFeature;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUserProjet;
use BWB\Framework\mvc\dao\DAOProjetFeature;
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
    
    public function addToProject($id){
        $ProjetJoiner = new UserProjet();
        $ProjetJoiner->setProjet_id((int)$id);
        $ProjetJoiner->setUser_id((int)json_decode($_COOKIE['cookie'],true)['id']);
        $ProjetJoiner->setDroit_projet(0);
        (new DAOUserProjet())->create($ProjetJoiner);
        
        echo "http://dreamfrom/projets/".$id;
    }
    
    public function leaveTheProject($id){
        (new DAOUserProjet())->delete(array("id" => json_decode($_COOKIE['cookie'],true)['id'], "idp"=>$id));
        echo "http://dreamfrom/projets/".$id;
    }
    
    public function addToFeature($id,$idf){
        $ProjetFeat = new ProjetFeature();
        $ProjetFeat->setProjet_id((int)$id);
        $ProjetFeat->setUser_id((int)json_decode($_COOKIE['cookie'],true)['id']);
        $ProjetFeat->setFeature_id($idf);
        $ProjetFeat->setEtat(0);
        (new DAOProjetFeature())->create($ProjetFeat);
//        var_dump($ProjetFeat);
//        echo "http://dreamfrom/projets/".$id;
    }
    
    public function quitFeature($id,$idf){
        (new DAOProjetFeature())->delete(array("idPro" => $id, "idFeat" => $idf, "idUser" => json_decode($_COOKIE['cookie'],true)['id']));
    }
    
    public function finishFeature($id,$idf){
        $entity = new ProjetFeature();
        $entity->setProjet_id($id);
        $entity->setFeature_id($idf);
        
        (new DAOProjetFeature())->endFeature($entity);
    }
            
    public function  showView(){
        $this->joinProject();
        $this->render("ficheprojet");
    }    
}
