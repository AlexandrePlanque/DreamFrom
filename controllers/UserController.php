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
    
    /**
     * La méthode getUsers() permet de récupérer l'intégralité des utilistateurs de la base de données, mais aussi tout les themes présent afin de permettre
     * l'intégration d'un système de recherche filtrée par themes, date de création et de pseudonyme.
     */
    public function getUsers(){
        
        $dao = new DAOUser();
        //récupération de tout les themes dans un premier temps
        $tata = (new DAOTheme())->getAll();
        
        /** 
         * Si il n'y a pas de parametres il n'y a pas de recherche demandé par l'utilisateur
         * alors on récupere tout les utilisateurs sans distinctions 
         * 
         * En revanche si il y a la présence de parametre dans l'url alors on les récupere correctement
         * au travers de la méthode getParams() qui va traiter les parametres et les insérer dans un 
         * tableau, on peut donc demander au DAO d'effectuer la recherche filtré
         */
        if(count($this->inputGet()) === 0){
        $toto = $dao->getAll();
        $datas = array("users" => $toto, "themes" => $tata);    
        }else{
        $tost = $dao->getAllOrder($this->getParams());
        $datas = array("users" => $tost, "themes" => $tata);
        }
        
        /** 
         *  Finalement on appel la méthode render qui permet de récuperer la vue 
         * et d'y faire transiter les données récuperer préalablement insérer dans une array
         */
        $this->render("testcartd", $datas);
    }
    
    /*
     * Cette méthode a pour but de traiter les paramètres présents dans l'url afin
     * d'effectuer une prétraitement pour préparer les requêtes en fonctions des
     * arguments présents pour faciliter la création des requêtes dans les daos.
     */
    public function getParams(){
        //récupération des paramètres présents dans la variable $_GET
        $para = $this->inputGet();

        $retour = array();
        $i=0;
        // pour chaque parametre présent on pointe la clé ainsi que la valeur (ex: intitule=technolige, clé = intitule et valeur = technologie
        foreach($para as $key => $value){
            $temp = "";
            //pour le premier parametre on vérifie si il ne s'agit pas de la clé date_creation
            //auquel cas la requête differe des autres via le ORDER BY sinon on sait qu'il s'agira du mot clé WHERE
                if($i === 0){
                    if($key === "date_creation"){
                    $temp = " ORDER BY ".$key." ".$value;
                    }else{
                        $temp = " WHERE ".$key." = '".$value."'";
                    }
                //on effectue la même opération que précedement pour la clé date_creation sauf que cette fois ci 
                //le mot clé sera AND si il ne s'agit pas de la clé date_creation
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
    


}       