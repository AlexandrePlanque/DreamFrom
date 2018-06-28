<?php
namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\dao\DAOTheme;
use BWB\Framework\mvc\dao\DAOAdresse;
use BWB\Framework\mvc\dao\DAOProjet;


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
        $data = array("user" => $dao, "themes" => $this->getTheme(), "projets" => $this->getProjet());

        $this->render("profil", $data);
    }

    private function getTheme(){
                $tata = (new DAOTheme())->getAll();
                return $tata;
    }
    
    private function getProjet(){
        return (new DAOProjet())->getProfilProjet(1);
       
    }
}
