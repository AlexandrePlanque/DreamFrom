<?php

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\User;
use BWB\Framework\mvc\models\Adresse;
use PDO;


/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/

class DAOUser extends DAO {

    public function __construct() {
        parent::__construct();
    }

    /* ____________________Crud methods____________________ */

    public function create($entity) {


		$sql = "INSERT INTO user (pseudo,password,nom,prenom,email,tel,date_creation,privilege_id,adresse_id,actif_id,theme_id,avatar,contact) VALUES('" 
                        . $entity->getPseudo() . '\',\'' . $entity->getPassword() 
                        . '\',\'' . $entity->getNom() . '\',\'' . $entity->getPrenom() 
                        . '\',\'' . $entity->getEmail() . '\',\'' . $entity->getTel() . '\',\'' 
                        . $entity->getDate_creation() . '\',\'' . $entity->getPrivilege_id() . '\',\'' 
                        . $entity->getAdresse_id() . '\',\'' . $entity->getActif_id() 
                        . '\',\'' . $entity->getTheme_id() . '\',\'' . $entity->getAvatar() . '\',\'' . $entity->getContact() . "')";
        $this->getPdo()->query($sql);
    }

/*
 * La méthode retrieve s'appuie sur la méthode de pdo setFetchMode FETCH_CLASS qui permet de générer un objet
 * directement après avoir récuperer les données
 */
	public function retrieve ($id){

		$sql = "SELECT *,theme.intitule as theme from user inner join theme on user.theme_id = theme.id WHERE user.id=". $id;
		$statement = $this->getPdo()->query($sql);
//                var_dump($statement);
                $result = $statement->fetch();
//                var_dump($result);
                $entity = new User();
                $entity->setId($result['0']);
                $entity->setPseudo($result['pseudo']);
                $entity->setPassword($result['password']);
                $entity->setNom($result['nom']);
                $entity->setPrenom($result['prenom']);
                $entity->setEmail($result['email']);
                $entity->setCivilite($result['civilite']);
                $entity->setTel($result['tel']);
                $entity->setDate_creation($result['date_creation']);
                $entity->setPrivilege_id($result['privilege_id']);
                $entity->setAdresse_id($result['adresse_id']);
                $entity->setActif_id($result['actif_id']);
                $entity->setTheme_id($result['theme_id']);
                $entity->setTheme($result['intitule']);
                $entity->setAvatar($result['avatar']);
		return $entity;

	}

//$array est un tableau associatif qui permet la création dynamique de la requête SQL
	public function update ($array){
		$sql = "UPDATE user SET ";
                foreach($array as $key){
                    if(key($array) !== "id"){
                    $sql.= key($array) . " = '" . $key . "',"; 
                    }
                    next($array);
                }

                $sql = substr($sql,  0, -1)." WHERE id = ".$array['id'];

                $this->getPdo()->exec($sql);

	}
    public function delete($id) {

        $sql = "DELETE FROM user WHERE id= " . $id;
        $this->getPdo()->query($sql);
    }

    /* ____________________Repository methods____________________ */

    public function getAll() {
                $sql = "select * from user inner join theme on user.theme_id = theme.id order by date_creation asc";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();
		foreach($results as $result){
			$entity = new User();
			$entity->setId($result['0']);
			$entity->setPseudo($result['pseudo']);
			$entity->setPassword($result['password']);
			$entity->setNom($result['nom']);
			$entity->setPrenom($result['prenom']);
			$entity->setEmail($result['email']);
			$entity->setCivilite($result['civilite']);
			$entity->setTel($result['tel']);
			$entity->setDate_creation($result['date_creation']);
			$entity->setPrivilege_id($result['privilege_id']);
			$entity->setAdresse_id($result['adresse_id']);
			$entity->setActif_id($result['actif_id']);
			$entity->setTheme_id($result['intitule']);
			$entity->setAvatar($result['avatar']);
			$entity->setContact($result['contact']);
			array_push($entities,$entity);
		}
		return $entities;
    }



	public function getAllOrder ($array){
            
                $sql = "select *, theme.intitule from user inner join theme on user.theme_id = theme.id";
                foreach($array as $ar){
                    $sql.= $ar;
                };

		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

        foreach ($results as $result) {
            $entity = new User();
            $entity->setId($result['id']);
            $entity->setPseudo($result['pseudo']);
            $entity->setPassword($result['password']);
            $entity->setNom($result['nom']);
            $entity->setPrenom($result['prenom']);
            $entity->setEmail($result['email']);
            $entity->setCivilite($result['civilite']);
            $entity->setTel($result['tel']);
            $entity->setDate_creation($result['date_creation']);
            $entity->setPrivilege_id($result['privilege_id']);
            $entity->setAdresse_id($result['adresse_id']);
            $entity->setActif_id($result['actif_id']);
            $entity->setTheme_id($result['intitule']);
            $entity->setAvatar($result['avatar']);
            array_push($entities, $entity);
        }
        return $entities;
    }

    public function getAllBy($filter) {
        $sql = "SELECT * FROM user";
        $i = 0;
        foreach ($filter as $key => $value) {
            if ($i === 0) {
                $sql .= " WHERE ";
            } else {
                $sql .= " AND ";
            }
            $sql .= $key . " = " . $value . "'";
            $i++;
        }
        $entities = array();
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetchAll();
        foreach ($results as $result) {
            $entity = new User;
            $entity->setId($result['id']);
            $entity->setPseudo($result['pseudo']);
            $entity->setPassword($result['password']);
            $entity->setNom($result['nom']);
            $entity->setPrenom($result['prenom']);
            $entity->setEmail($result['email']);
            $entity->setCivilite($result['civilite']);
            $entity->setTel($result['tel']);
            $entity->setDate_creation($result['date_creation']);
            $entity->setPrivilege_id($result['privilege_id']);
            $entity->setAdresse_id($result['adresse_id']);
            $entity->setActif_id($result['actif_id']);
            $entity->setTheme_id($result['theme_id']);
            $entity->setAvatar($result['avatar']);
            array_push($entities, $entity);
        }
        return $entities;
    }

    // methode pour insérer les données dans la Table "adresse"
    public function createAdresse($entity) {
        $sql = "INSERT INTO adresse (rue,numero,code_postal,ville) VALUES('" . $entity->getRue() . '\',\'' . $entity->getNumero() . '\',\'' . $entity->getCode_postal() . '\',\'' . $entity->getVille() . "')";

        echo $sql;
        // Utilisation de la methode getPdo du DAO pour connexion à la BDD et insertion
        $this->getPdo()->query($sql);
        echo "<hr>";
        // retourne le dernier ID créé en BDD
        $entity->setId($this->getPdo()->lastInsertId());
        var_dump($entity->getId());
        echo "<hr>";

        return $entity->getId();
    }

    // methode qui va vérifier si le pseudo existe déja dans la BDD
    public function verifPseudo() {

        $bdd = $this->getPdo();
        // vérification si le champ pseudo a bien été rempli
        if (isset($_POST['pseudo'])) {

            // Alors dans ce cas on met saisie du $_POST['pseudo'] dans la variable $pseudo
            $pseudo = ($_POST['pseudo']);

            // On insère la variable pseudo qui correspond à la saisie de l'utilisateur dans la requête SQL
            $sql = $bdd->prepare('SELECT * FROM user WHERE pseudo = \'' . $pseudo . '\';');
            $sql->execute(array('.$pseudo.' => $_POST['pseudo']));

            // recherche de résultat
            $res = $sql->fetch();

            if ($res) {
                // S'il y a un résultat, c'est à dire qu'il existe déjà un pseudo, alors "Ce pseudo est déjà utilisé"
//            echo "Ce pseudo est déjà utilisé ! ";
                return FALSE;
            }
            // Sinon le résultat est nul ce qui veut donc dire qu'il ne contient aucun pseudo, donc on insère
            else {
//            echo "Ce pseudo n'a jamais été utilisé ";
                return True;

//           
            }
        }
    }

    // methode qui récupérer en BDD les données nécéssaires à la vérification de celles contenu dans le Token
    public function verifTokenMail($info) {

        // Récupération des variables nécessaires à l'activation
        $prenom = $info['prenom'];
        $pseudo = $info['pseudo'];

        // on récupère en BDD les données nécéssaires
        $sql = "SELECT * FROM user WHERE prenom ='" . "$prenom" . "' AND pseudo = '" . $pseudo . "'";
        $bdd = $this->getPdo()->query($sql)->fetch();

        // si la récupération se passe bien on applique la fonction activeAccount()
        if ($bdd !== false) {
            $this->activeAccount($bdd["id"]);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // methode qui va mettre a jour la status actif du user
    public function activeAccount($id) {

        $stmt = $this->getPdo()->exec("UPDATE user SET actif_id = 1 WHERE id=" . $id);
        return $stmt;
    }

    // methode qui va récupérer les données des champs du formulaire connexion et les comparer avec la BDD
    public function verifUser() {

        $bdd = $this->getPdo();
        if (isset($_POST['pseudo']) && isset($_POST['password'])) {

            // Récupération des variables du formulaire
            $pseudo = ($_POST['pseudo']);
            $password = ($_POST['password']);

            // on récupère en BDD les données
            $sql = $bdd->prepare('SELECT * FROM user WHERE pseudo = \'' . $pseudo . '\' AND password = \'' . $password . '\';');
            $sql->execute(array('.$pseudo.' => $_POST['pseudo'], '.password.' => $_POST['.password.']));
            $res = $sql->fetchAll();

            // vérification
            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    // methode qui permet de récupérer le rang privilége d'un utilisateur en fonction du Pseudo
    public function getRang($pseudo){
        
        $sql = "SELECT privilege.rang, user.id FROM user INNER JOIN privilege WHERE user.privilege_id = privilege.id AND user.pseudo ='" .$pseudo."'";
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetch();
        return $results;
        
    }
    
    public function getAvatar($id){
        
        $sql = "select avatar from user where id =".$id;
        $statement = $this->getPdo()->query($sql);
        $results = $statement->fetch();
//        var_dump($results);
        return $results;
        
    }
    
    public function getIdByPseudo($pseudo) {

        $request = $this->getPdo();
        
            // on récupère en BDD les données
            $getId = $request->query("SELECT id FROM user WHERE pseudo='" . $pseudo. "'");
            $user_id = $getId->fetch();
            return $user_id[0];
        }

}
