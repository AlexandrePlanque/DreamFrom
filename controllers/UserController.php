<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\models\User;
use BWB\Framework\mvc\models\Theme;

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
        if(count($this->inputGet()) === 0){
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

        $retour = array();
        $i=0;
        foreach($para as $key => $value){
            $temp = "";
                if($i === 0){
                    if($key === "date_creation"){
//                        $temp = " WHERE theme.".$key." = '".$value."'";  
//                    }else{
//                        $temp = " WHERE ".$key." = '".$value."'";
//                    }
                    $temp = " ORDER BY ".$key." ".$value;
                    }else{
                        $temp = " WHERE ".$key." = '".$value."'";
                    
                }
                }else if($key === "date_creation"){
                    $temp = " ORDER BY ".$key." ".$value;
                    
                }else{
                    $temp = " AND ".$key." = '".$value."'";  
                }
            array_push($retour, $temp);
            $i++;
        }
        return $retour;
    }
    
    public function getProfil(){
        $this->render("profil");
    }

}       