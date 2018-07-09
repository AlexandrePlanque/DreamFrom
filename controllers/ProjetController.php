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
        $proj = $dao->getAllBy($this->getParams());
        $datas = array("projets" => $proj, "themes" => $themes);
        }
        
        $this->render("getProjet", $datas);
    }

    
    public function getParams(){
        $para = $this->inputGet();
        
//        echo $this->inputGet()['intitule'];
        $retour = array();
        $i=0;
        foreach($para as $key => $value){
            $temp = "";
                if($i === 0){
                    if($key === "intitule"){
                        $temp = " WHERE theme.".$key." = '".$value."'";  
                    }else{
                        $temp = " WHERE ".$key." = '".$value."'";
                    }
                }else if($value === "asc" || $value === "desc"){
                    $temp = " ORDER BY ".$key." ".$value;
                }else{
                    $temp = " AND ".$key." = '".$value."'";  
                }
            array_push($retour, $temp);
            $i++;
        }
        return $retour;
    }
        
    public function ficheProjet($id){
        //(new DAOProjet())->retrieve($id);
        $this->render('ficheprojet');
    }

}       

 