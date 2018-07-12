<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\models\Projet;
use BWB\Framework\mvc\dao\DAOProjet;
use BWB\Framework\mvc\models\Theme;
use BWB\Framework\mvc\models\User;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOTheme;
use BWB\Framework\mvc\dao\DAOFeature;

/**
 * Description of CreateProjetController
 *
 * @author fabien
 */
class CreateProjetController extends Controller {

    public function getview() {
        //setcookie("cookie", "Aziraphale", time() + 3600 * 24, "/");
        
        // recuperation de la liste des themes en creant le dao et 
        // y appliquant la methode getAll
        $themes= (new DAOTheme())->getAll();
        // insertion dans l'affichage des themes, sous forme d'un tableau
        // dont la clef est la string "themes" et la value est la variable $themes
        $this->render("createProjet", array("themes"=>$themes));
        
    }

    public function createProj() {

        // création d'une variable pour stocker la date actuelle au bon format
        $datetime = date("Y-m-d");


        // creation d'un nouveau projet
        // creation d'un nouveau dao de type PRojet
        $projet = new Projet();

        $creation = new DAOProjet();
        var_dump($_POST);
        // récupération des données à partir des infos du $_POST
        $projet->setTitre($_POST['titre']);
        $projet->setDescription($_POST['description']);
        $projet->setTheme_id($_POST['theme']);
        $projet->setImage($_POST['image']);
        $projet->setDate_modif("NULL");
        $projet->setLeader("Aziraphale");

        $projet->setDate_creation($datetime);
var_dump($projet);
        // verif si un projet avec un nom identique existe deja
//        if ($creation->verifProjet()) {
//            $creation->create($projet);
//        }
    }
    
    public function getThemes() {
        
        $themesListe= (new DAOTheme())->getAll();
        //var_dump($themesListe);
        return $themesListe;
    }

}
