<?php

/*inclusion du models/php pour les getters and setters Projet
 *inclusion du models/php pour les getters and setters Theme
 *inclusion du dao/daoprojet pour la gestion des infos recues des requetes sql
 * 
 * 
 */

namespace BWB\Framework\mvc\controllers;
use BWB\Framework\mvc\models\Projet;
use BWB\Framework\mvc\models\Theme;
use BWB\Framework\mvc\dao\DAOProjet;
use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\dao\DAOTheme;
use BWB\Framework\mvc\dao\DAOFeature;

/**
 *
 *
 * 
 */
class ProjetController extends Controller{
    
    public function getProjet(){
        //nvl objet de classe Projet
       $dao = new DAOProjet();  
        //nvl objet de classe Theme 
        $themes = (new DAOTheme())->getAll();
        // si l'entrée transmise dans l'uri est vide, la liste retournee est entiere
        if(count($this->inputGet()) === 0 && $this->inputGet()['intitule'] !== ""){
        $projet = $dao->getAll();
        $datas = array("projets" => $projet, "themes" => $themes);  
        // si la valeur du projet est remplie, le tri se fait par selon l
        }else{
        $proj = $dao->getAllOrderBy($this->getParams());
        $datas = array("projets" => $proj, "themes" => $themes);
        }
        
        $this->render("getProjet", $datas);
    }

    
//    public function getParams(){
//        $para = $this->inputGet();
//        
//
//        $retour = array();
//        $i=0;
//        foreach($para as $key => $value){
//            $temp = "";
//                if($i === 0){
//                    if($key === "intitule"){
//                        $temp = " WHERE theme.".$key." = '".$value."'";  
//                    }else{
//                        $temp = " WHERE ".$key." = '".$value."'";
//                    }
//                }else if($value === "asc" || $value === "desc"){
//                    $temp = " ORDER BY ".$key." ".$value;
//                }else{
//                    $temp = " AND ".$key." = '".$value."'";  
//                }
//            array_push($retour, $temp);
//            $i++;
//        }
//        return $retour;
//    }
        
    public function ficheProjet($id){

        $this->render('ficheprojet', array("projet" => (new DAOProjet())->retrieve($id), "participants" => (new DAOProjet())->getInfoParti($id), "features" => (new DAOProjet())->getFeature($id)));
    }

    
    
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

 