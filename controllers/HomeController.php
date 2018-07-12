<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOEvent;


/**
 * Description of HomeController
 *
 * @author fabien
 */
class HomeController extends Controller {
    
    public function GetHome(){
        $this->render("getHome", array("news" => $this->getNews(), "projets" => $this->getNewsProjet(),"membres" => $this->getNewsMembre()));
    }
    
    public function getNews(){
       return (new DAOEvent())->getAll();
    }
    
    public function getNewsProjet(){
        return (new DAOEvent())->getAllBy(array('nom' => "projet"));
    }
    public function getNewsMembre(){
       return (new DAOEvent())->getAllBy(array('nom' => "membre"));
    }
}
