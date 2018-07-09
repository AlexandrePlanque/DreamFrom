<?php
namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\dao\DAOTheme;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAOProjet;
use BWB\Framework\mvc\dao\DAOMp;
use BWB\Framework\mvc\models\User;
use BWB\Framework\mvc\models\Adresse;
use BWB\Framework\mvc\models\Mp;
use ReflectionClass;




/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of ProfilController
 *
 * @author alexandreplanque
 */
class ProfilController extends Controller{
    
    public function getProfil(){
        $dao = (new DaoUser())->retrieve(json_decode($_COOKIE['cookie'],true)['id']);
        $dao->setAdresse((new DAOAdresse())->retrieve($dao->getAdresse_id()));

        $data = array("user" => $dao, "themes" => $this->getTheme(), "projets" => $this->getProjet(), "users" => ((new DAOUser())->getAll()));

        $this->render("profil", $data);
    }

    private function getTheme(){
                $tata = (new DAOTheme())->getAll();
                return $tata;
    }
    
    private function getProjet(){
        return (new DAOProjet())->getProfilProjet(json_decode($_COOKIE['cookie'],true)['id']);
       
    }
    
    public function getProjetJson($id){

        header("Content-Type:Application/json");
        echo json_encode((new DAOProjet())->getProfilProjetJson(1));
    }
    
    public function test(){
        $this->render("test");
    }
    
    public function editProfil(){
//        header('Content-Type:application/json; charset=utf-8');
        $data = $this->inputPost();
        ((new DAOUser())->update($data['user']));
        ((new DAOAdresse())->update($data['adresse']));
        $this->prepareUser();
    }
    
    public function editAvatar(){
        $data = $this->inputPost();
        ((new DAOUser())->update($data));

//        echo $data['avatar'];
//        echo $data['id'];
    }
    private function prepareUser(){
        $reflex = new ReflectionClass("BWB\\Framework\\mvc\\models\\User");
        $props = json_decode(json_encode($reflex->getProperties()),true);
        $user = new User();

        foreach($props as $key){
            $test = $key['name'];
            if($test !== "adresse"){
                foreach($this->inputPost() as $key => $value){
                    if($key === $test){
                        $setter = "set".ucfirst($test);
                        $user->$setter($value);
                    }   
                }
            }
        }
        return $user;        
    }
    
//    private function prepareAdresse(){
//        $reflex = new ReflectionClass("BWB\\Framework\\mvc\\models\\Adresse");
//        $props = json_decode(json_encode($reflex->getProperties()),true);
//        $user = new Adresse();
//        
//        
//    }
    
    public function getMp($value){

        $mp = json_encode((new DAOMp())->getAllFor($value, json_decode($_COOKIE['cookie'],true)['id']));
        echo ($mp);
    }
    
    public function postMp(){
        header("Content-Type:text/plain");
        $data = $this->inputPost();
        $mpObj = new Mp();
        $mpObj->setMessage($data['message']);
        $mpObj->setDestinataire($data['destinataire']);
        $mpObj->setUser_id(json_decode($_COOKIE['cookie'],true)['id']);
        $mpObj->setDate_creation(date("Y-m-d H:i:s"));
      
        (new DAOMp())->create($mpObj);
        
    }
}
