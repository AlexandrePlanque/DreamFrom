<?php
namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\User;
use BWB\Framework\mvc\models\Adresse;

/* 
*creer avec l'objet issue de la classe CreateEntity Class 
*/


class DAOUser extends DAO {

	public function __construct(){
		parent::__construct();
	}

/* ____________________Crud methods____________________*/


	public function create ($entity){

		$sql = "INSERT INTO user (pseudo,password,nom,prenom,email,civilite,tel,date_creation,privilege_id,adresse_id,actif_id,theme_id,avatar) VALUES('" . $entity->getPseudo() . '\',\'' . $entity->getPassword() . '\',\'' . $entity->getNom() . '\',\'' . $entity->getPrenom() . '\',\'' . $entity->getEmail() . '\',\'' . $entity->getCivilite() . '\',\'' . $entity->getTel() . '\',\'' . $entity->getDate_creation() . '\',\'' . $entity->getPrivilege_id() . '\',\'' . $entity->getAdresse_id() . '\',\'' . $entity->getActif_id() . '\',\'' . $entity->getTheme_id() . '\',\'' . $entity->getAvatar() . "')";
//		echo $sql;

                $this->getPdo()->query($sql);
	}


	public function retrieve ($id){

		$sql = "SELECT * FROM user WHERE id=" . $id;
		$statement = $this->getPdo()->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		$entity = new User();
		$entity->setPseudo();
		$entity->setPassword();
		$entity->setNom();
		$entity->setPrenom();
		$entity->setEmail();
		$entity->setCivilite();
		$entity->setTel();
		$entity->setDate_creation();
		$entity->setPrivilege_id();
		$entity->setAdresse_id();
		$entity->setActif_id();
		$entity->setTheme_id();
		$entity->setAvatar();
		return $entity;
	}


	public function update ($array){

		$sql = "UPDATE user SET pseudo = '" . $entity->getPseudo() ."',password = '" . $entity->getPassword() ."',nom = '" . $entity->getNom() ."',prenom = '" . $entity->getPrenom() ."',email = '" . $entity->getEmail() ."',civilite = '" . $entity->getCivilite() ."',tel = '" . $entity->getTel() ."',date_creation = '" . $entity->getDate_creation() ."',privilege_id = '" . $entity->getPrivilege_id() ."',adresse_id = '" . $entity->getAdresse_id() ."',actif_id = '" . $entity->getActif_id() ."',theme_id = '" . $entity->getTheme_id() ."',avatar = '" . $entity->getAvatar() ." WHERE id = ". $entity->getId();
		if ($this->getPdo()->exec($sql) !== 0){
			echo "Updated";
		} else {
			echo "Failed";
		}
	}


	public function delete ($id){

		$sql = "DELETE FROM user WHERE id= " . $id;
		$this->getPdo()->query($sql);
	}

/* ____________________Repository methods____________________*/


	public function getAll (){
		$uri = explode('/',$_SERVER['REQUEST_URI']);
                $uris = $uri[(count($uri)-1)];
                $argq = str_replace("?", "", $uris);
                $argu = array();
                $arg = explode("&",$argq);
                foreach($arg as $a){
                    $b = explode("=", $a);
                    array_push($argu, $b);
                };
                
                $sql = "select *, theme.intitule from user inner join theme on user.theme_id = theme.id";
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
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
			array_push($entities,$entity);
		}
		return $entities;
	}

	public function getAllOrder ($array){

                

                $sql = "select *, theme.intitule from user inner join theme on user.theme_id = theme.id";
                foreach($array as $ar){
                    if($ar==="intitule"){
                        $r = "theme".$ar;

                    }
                    $sql.= $ar;
                };
		$statement = $this->getPdo()->query($sql);
		$results = $statement->fetchAll();
		$entities = array();

		foreach($results as $result){
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
			array_push($entities,$entity);
		}
		return $entities;
	}

	public function getAllBy ($filter){
		$sql = "SELECT * FROM user";
		$i = 0;
		foreach($filter as $key => $value){
			if($i===0){
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
		foreach($results as $result){
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
			array_push($entities,$entity);
		}
		return $entities;
	}
        
        // methode pour insérer les données dans la Table "adresse"
        public function createAdresse($entity) {
            $sql = "INSERT INTO adresse (rue,numero,code_postal,ville) VALUES('" . $entity->getRue() . '\',\'' . $entity->getNumero() . '\',\'' . $entity->getCode_postal() . '\',\'' . $entity->getVille() . "')";
           
            
            // Utilisation de la methode getPdo du DAO pour connexion à la BDD et insertion
            $this->getPdo()->query($sql);
            
            // retourne le dernier ID créé en BDD
            $entity->setId($this->getPdo()->lastInsertId());

            return $entity->getId();
        }
        
        // fonction qui va vérifier si le pseudo existe déja dans la BDD
        public function verifPseudo(){
            
            $bdd = $this->getPdo();
            // vérification si le champ pseudo a bien été rempli
            if (isset($_POST['pseudo']))
{
 
            // Alors dans ce cas on met saisie du $_POST['pseudo'] dans la variable $pseudo
            $pseudo = ($_POST['pseudo']);
     
            // On insère la variable pseudo qui correspond à la saisie de l'utilisateur dans la requête SQL
            $sql = $bdd->prepare('SELECT * FROM user WHERE pseudo = \''.$pseudo.'\';');
            $sql->execute(array('.$pseudo.' => $_POST['pseudo']));
 
            // recherche de résultat
            $res = $sql->fetch();
 
            if ($res)
            {
            // S'il y a un résultat, c'est à dire qu'il existe déjà un pseudo, alors "Ce pseudo est déjà utilisé"
//            echo "Ce pseudo est déjà utilisé ! ";
            return FALSE;
            }
            // Sinon le résultat est nul ce qui veut donc dire qu'il ne contient aucun pseudo, donc on insère
            else
            {
//            echo "Ce pseudo n'a jamais été utilisé ";
            return True;
            
//           
            }
        }

    }
    
    public function verifTokenMail($testo){
        
        // Récupération des variables nécessaires à l'activation
        $prenom = $testo['prenom'];
        $pseudo = $testo['pseudo'];
        $sql2 = "SELECT * FROM user WHERE prenom ='"."$prenom"."' AND pseudo = '". $pseudo."'";
        $bdd = $this->getPdo()->query($sql2)->fetch();
//        $sql = $bdd->prepare("SELECT * FROM user WHERE prenom = $prenom AND pseudo = $pseudo");
        
        if($bdd !== false){
            $this->activeAccount($bdd["id"]);
            return TRUE;
        }else{
            return FALSE;
        }
//        $test = $sql->execute(array('prenom' => $prenom,'pseudo' => $pseudo));
//        
//        $res = $sql->fetch();     
        
    }
    
    public function activeAccount($id) {
        
        $stmt = $this->getPdo()->exec("UPDATE user SET actif_id = 1 WHERE id=". $id);
        return $stmt;
    }
}
            
