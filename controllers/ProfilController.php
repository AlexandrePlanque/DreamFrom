<?php
namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\dao\DAOTheme;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAOProjet;
use BWB\Framework\mvc\dao\DAOMp;
use BWB\Framework\mvc\models\User;
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
        $dao = (new DaoUser())->retrieve(1);
        $dao->setAdresse((new DAOAdresse())->retrieve($dao->getAdresse_id()));
//        $this->getMp();
        $data = array("user" => $dao, "themes" => $this->getTheme(), "projets" => $this->getProjet(), "users" => ((new DAOUser())->getAll()));
        

        $this->render("profil", $data);
    }

    private function getTheme(){
                $tata = (new DAOTheme())->getAll();
                return $tata;
    }
    
    private function getProjet(){
        return (new DAOProjet())->getProfilProjet(1);
       
    }
    
    public function test(){
        $this->render("test");
    }
    
    public function editProfil(){
//        var_dump($this->inputPost());
//        var_dump( ((new User())->setNom($this->inputPost()['nom'])->setPrenom($this->inputPost()['prenom'])));
//        (new DAOUser())->update($this->inputPost());
        $this->prepareUser();
    }
    private function prepareUser(){
        $reflex = new ReflectionClass("BWB\\Framework\\mvc\\models\\User");
        $props = json_decode(json_encode($reflex->getProperties()),true);
        $user = new User();
//        var_dump($props);
        $i = 0;
        foreach($props as $key){
            $test = $key['name'];
//            echo $test;
            if($test !== "adresse"){
                foreach($this->inputPost() as $val){
//                    var_dump ($this->inputPost());
                    if($this->inputPost() === $test){
                $setter = "set".ucfirst($test)."(".$val.")";
                echo $setter;
                    }
                    
                }
//                echo $test;
//                $user->
            }
            $i++;
        }
        
    }
    
    public function getMp($value){

        $mp = json_encode((new DAOMp())->getAllFor($value));
        echo ($mp);
    }
}
