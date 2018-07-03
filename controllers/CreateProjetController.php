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


class CreateProjetController extends Controller{
     
 
            
    public function createProj(){
//     if (isset ($_COOKIE["cookie"])){
//                $test = json_decode($_COOKIE["cookie"],true);
//                $value = array_values($test);
//                $pseudo = $value[0];
//     }
    // création d'une variable pour stocker la date actuelle au bon format
    $datetime = date("Y-m-d");

    //var_dump(INPUT_POST);
    // creation d'un nouveau projet
    
    // creation d'un nouvel dao de type PRojet
    $projet = new Projet();
    //$u = new \BWB\Framework\mvc\dao\DAOAdresse();
    $creation = new DAOProjet();
    
    // récupération des données à partir des infos du $_POST
    $projet->setTitre($_POST['titre']);
    $projet->setDescription($_POST['description']);
    $projet->setTheme_id(2);
    $projet->setImage($_POST['image']);
    $projet->setDate_modif("NULL");
    //$projet->setFeatProgress("");
    $projet->setLeader("Aziraphale"); 
    //   $projet->setAvatar("");
    //$projet->chef_projet("");
    $projet->setDate_creation($datetime);
      //$projet->setParticipants(1);
//    $projet->setNom($_POST['nom']);
//    $projet->setDetails($_POST['details']);
//    $projet->setEtat(0);
    //recuperer l'id de l'utilisateur courant pour que dans le dao tu puisse alimenter la table projet_user
    
    if ($creation->verifProjet()){
          $creation->create($projet);
    }
    
    }
//    public function test() {
//        $dao = new DAOUser();
//        $id = $dao->getIdByPseudo();
//        var_dump($id);
//    }
}

