<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;

/**
 * Description of HomeController
 *
 * @author fabien
 */
class HomeController extends Controller {
    
    public function GetHome(){
        var_dump($_COOKIE['cookie']);
    $this->render("getHome");
    }
}
