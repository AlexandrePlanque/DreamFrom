<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Projet;

/*
 * creer avec l'objet issue de la classe CreateEntity Class 
 */

class DAOProjet extends DAO {

    public function __construct() {
        parent::__construct();
    }

    /* ____________________Crud methods____________________ */

    public function create($entity) {
        
        // requete sql permettant de remplir la bdd "projet" avec les données récupérées du formulaire
        $sql = "INSERT INTO projet (titre,description,date_creation,date_modif,theme_id,image) "
                . "VALUES('" . $entity->getTitre() . "',' ". $entity->getDescription() ." ',' ". $entity->getDate_creation() ." ',' ". $entity->getDate_modif() ." ',". $entity->getTheme_id() .",'" . $entity->getImage() . "')";
        $ok= $this->getPdo()->exec($sql);

        //si $ok est egal a 1 alors récupère l'id du projet qui vient d'etre créé.
        if($ok === 1){
            $idProjet= $this->getPdo()->lastInsertId();

        // création d'un doauser pour intégrer la relation entre le user et le projet
        
        $dao = new DAOUser();
        // récupération de l'id du user courant en récupérant son id à partir du cookie
        $id = $dao->getIdByPseudo($_COOKIE['cookie']);

        // ajoute dans la table projet_user les id du projet  + celui de l'utilisateur courant 
        $projUser = "INSERT INTO user_projet (user_id,projet_id,droit_projet)"
                ."VALUES('".$id."','".$idProjet."',1)";
        $this->getPdo()->exec($projUser);
        }
    }

    public function retrieve($id) {

        $sql = "SELECT * FROM projet WHERE id=" . $id;
        $statement = $this->getPdo()->query($sql);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $entity = new Projet();
        $entity->setTitre();
        $entity->setDescription();
        $entity->setChef_projet();
        $entity->setDate_creation();
        $entity->setDate_modif();
        $entity->setTheme_id();
        $entity->setImage();
        return $entity;
    }

    public function update($array) {

        $sql = "UPDATE projet SET titre = '" . $entity->getTitre() . "',description = '" . $entity->getDescription() . "',chef_projet = '" . $entity->getChef_projet() . "',date_creation = '" . $entity->getDate_creation() . "',date_modif = '" . $entity->getDate_modif() . "',theme_id = '" . $entity->getTheme_id() . "',image = '" . $entity->getImage() . " WHERE id = " . $entity->getId();
        if ($this->getPdo()->exec($sql) !== 0) {
            echo "Updated";
        } else {
            echo "Failed";
        }
    }

    public function delete($id) {

        $sql = "DELETE FROM projet WHERE id= " . $id;
        $this->getPdo()->query($sql);
    }

    /* ____________________Repository methods____________________ */

    public function getAll() {
        $sql = "SELECT * FROM projet";
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetchAll();
        $entities = array();

        foreach ($results as $result) {
            $entity = new Projet();
            $entity->setId($result['id']);
            $entity->setTitre($result['titre']);
            $entity->setDescription($result['description']);
            $entity->setChef_projet($result['chef_projet']);
            $entity->setDate_creation($result['date_creation']);
            $entity->setDate_modif($result['date_modif']);
            $entity->setTheme_id($result['theme_id']);
            $entity->setImage($result['image']);
            // fait appel au setter et fonction permettant de recuperer dynamiquement le nb de participants  
            $entity->setParticipants($this->getNbParticipants($entity->getId()));
            // fait appel au setter et fonction permettant de recuperer dynamiquement le nom du chef de projet 
            $entity->setLeader($this->getNomLeader($entity->getId()));
            // fait appel au setter et fonction permettant de recuperer dynamiquement le %age de features accompli 
            $entity->setFeatProgress($this->featureProgress($entity->getId()));

            array_push($entities, $entity);
        }

        return $entities;
    }

    public function getAllBy($filter) {
        $sql = "SELECT *, theme.intitule FROM projet inner join theme on projet.theme_id = theme.id";
        $i = 0;
        foreach ($filter as $key => $value) {
//			if($i===0){
//				$sql .= " WHERE ";
//			} else {
//				$sql .= " AND ";
//			}
//			$sql .= $key . " = " . $value . "'";
            $sql .= $value;
            $i++;
        }
        echo $sql;
        $entities = array();
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetchAll();
        foreach ($results as $result) {
            $entity = new Projet;
            $entity->setId($result['id']);
            $entity->setTitre($result['titre']);
            $entity->setDescription($result['description']);
            $entity->setChef_projet($result['chef_projet']);
            $entity->setDate_creation($result['date_creation']);
            $entity->setDate_modif($result['date_modif']);
            $entity->setTheme_id($result['theme_id']);
            $entity->setImage($result['image']);
            array_push($entities, $entity);
        }
        return $entities;
    }

    // cette fonction récupère le nombre de participants d'un projet pour l'afficher dans la card
    public function getNbParticipants($id) {
        // req sql pour compter dans la table user_projet les particpants selon l'id du projet
        $sql = "SELECT COUNT(*) as participants FROM user_projet WHERE projet_id = " . $id;
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetch();
        // return à partir du tableau $results de la donnée égale à la clef "participants"
        return $results["participants"];
    }

    // cette fonction récupère le nom du chef de projet pour l'afficher dans la card.
    public function getNomLeader($id) {
        //req sql qui joint les tables user et projet
        // si l'id du user correspond à l'id dans projet.chef_projet, affichage du pseudo selon l'id du projet
        $sql = "SELECT user.pseudo from user INNER JOIN projet where user.id = projet.chef_projet AND projet.id = " . $id;
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetch();
        return $results['pseudo'];
    }

    // cette fonction récupère les features pour afficher le %age achevé
    public function featureProgress($id) {
        //req sql qui recupére le nombre de features selon l id du projet
        $sql = "SELECT *  FROM projet_feature WHERE projet_id = " . $id;
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetchAll();
        $finies = 0;
        foreach ($results as $result) {
            if ($result['fini'] === "1") {
                $finies .= 1;
                $pourcentage = floor($finies * 100 / count($results));
            } else {
                $pourcentage = "0";
            }
        }
        //traitement de results pour en obtenir un %age 
        return $pourcentage . "%";
    }

    // fonction qui va vérifier si le projet existe déja dans la BDD
    public function verifProjet() {

        $bdd = $this->getPdo();
        // vérification si le champ titre a bien été rempli
        if (isset($_POST['titre'])) {

            // Alors dans ce cas on met la saisie du $_POST['titre'] dans la variable $pseudo
            $titre = ($_POST['titre']);

            // On insère la variable titre qui correspond à la saisie de l'utilisateur dans la requête SQL
           
            $sql = $bdd->query("SELECT titre FROM projet WHERE titre='".$titre."'");


            // recherche de résultat
            $resultat = $sql->fetch();

            
            if ($resultat) {
                // S'il y a un résultat, c'est à dire qu'il existe déjà un projet, alors "Ce projet est déjà créé"
           
                return FALSE;
            }
            // Sinon le résultat est nul ce qui veut donc dire qu'il ne contient aucun projet, donc on insère
            else {
           
                return True; //           
            }
        }
    }

}
