<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;

require 'vendor/autoload.php';

/**
 * Description of UserController
 *
 * @author alexandreplanque
 */

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\custom_core\MySecu;
use BWB\Framework\mvc\dao\DAOTheme;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\models\Adresse;
use BWB\Framework\mvc\models\Theme;
use BWB\Framework\mvc\models\User;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

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
        $this->render("membres", $datas);
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
    

    public function register() {
        $this->render("inscription");
//        $this->createUser();
    }

    public function createUser() {

        // création d'un nouvel objet Adresse / Utilisateur / DAOUser / MySecu
        $adresse = new Adresse();
        $user = new User();
        $dao = new DAOUser();
        $secu = new MySecu();
        
        $adresse->setCode_postal(0);
        $adresse->setRue(0);
        $adresse->setVille("null");
        $adresse->setNumero(0);

        // création d'une variable pour stocker la date actuelle au bon format
        $datetime = date("Y-m-d");

        // récupération des champs du formulaire
        $user->setNom($_POST["nom"]);
        $user->setPrenom($_POST["prenom"]);
        $user->setPseudo($_POST["pseudo"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->setAvatar('https://cdn2.iconfinder.com/data/icons/rcons-user/32/male-shadow-fill-circle-512.png');

        // on utilise la methode createAdresse du DAOUser pour remplir la table Adresse
        $user->setAdresse_id($dao->createAdresse($adresse));
        $user->setCivilite("1");
        $user->setTel("");
        $user->setPrivilege_id("1");

        // on passe en argument du setteur Date_creation, la variable qui stocke la date
        $user->setDate_creation($datetime);
        $user->setActif_id("2");
        $user->setTheme_id("1");
        $user->setAvatar("");
        $user->setContact(1);
        // on fait appel a la methode create du DAOUser 
        // on génère un token JWT et on vérifie si les données correspondent au POST du formulaire

        if ($dao->verifPseudo()) {
            $userStatus = $dao->create($user);
//            $token = $secu->generateToken($user);
            echo"inscription réussie";
            echo"<hr>";
//            var_dump($token);
//            echo"<hr>";
//            var_dump($secu->verifyToken($token));
            $sendMail = $this->registerConfirm();
        } else {
            echo"echec de l'inscription";
        }
    }

    // methode pour la confirmation d'inscrciption par l'envoi de mail
    public function registerConfirm() {

        $mail = new PHPMailer(true);

        // création des nouveaux objets
        $user = new User();
        $dao = new DAOUser();
        $secu = new MySecu();

        // Récupération des variables nécessaires au mail de confirmation
        $user->setPrenom($_POST["prenom"]);
        $user->setPseudo($_POST["pseudo"]);
        $email = $_POST["email"];

        $token = $secu->generateToken($user);

        $message = "<a href='http://".$_SERVER['SERVER_NAME']."/validation/?valid=$token'>confirmation inscription</a>";


        //Paramètres du Serveur
        $mail->SMTPDebug = 2;
        $mail->isSMTP();                                      // Utilisation SMTP
        $mail->Host = 'smtp.gmail.com';                       // Adresse du serveur SMTP
        $mail->SMTPAuth = true;                               // Activer l'authentification SMTP
        $mail->Username = 'dreamfrom.beweb@gmail.com';        // Identifiant SMTP
        $mail->Password = 'beweb2018';                        // Mot de passe SMTP
        $mail->SMTPSecure = 'ssl';                            // Protocole de Sécurité
        $mail->Port = 465;

        //Bénéficiaires
        $mail->setFrom('dreamfrom.beweb@gmail.com');          // Adresse d'envoi
        $mail->addAddress($email);                            // Adresse de réception
        //Contenu
        $mail->isHTML(true);                                  // Autoriser le code HTML dans le mail
        $mail->Subject = 'Confirmation inscription DreamFrom';
        $mail->Body = 'Bonjour, merci de cliquer sur le lien suivant pour activer votre compte DreamFrom: ' . $message;

        if (!$mail->send()) {
            echo "Erreur";
        } else {
            echo "Message envoyé";
            echo "<hr>";
            var_dump($token);
            echo"<hr>";
            var_dump($secu->verifyToken($token));
        }
    }

    public function activation() {
      
      $dao = new DAOUser();
      $secu = new MySecu();

      // recupération du token dans l'URI avec la fonction inputGet()
      $recup = ($secu->verifyToken($this->inputGet()["valid"]));
      
      // transformation du token en tableau associatif et on applique la fonction verifTokenMail() pour la comparaison avec les données en BDD
      $dao->verifTokenMail(json_decode(json_encode($recup),true));
      
      //création d'un event lié à l'inscription de l'utilisateur
      $data = json_decode(json_encode($recup),true);
      $event = new Event();
      $event->setNom('membre');
      $event->setDate_creation(date("Y-m-d H:i:s"));
      $event->setDescription($data['pseudo']." vient de nous rejoindre, bienvenue à lui");
      (new DAOEvent())->create($event);
      
        $this->render("emailconfirmation");
    }
    
       public function modalConnexion() {
        $this->render("modalconnexion");
    }
    
    // methode pour la connexion
    public function login() {
        
        // création des nouveaux objets
        $user = new User();
        $dao = new DAOUser();
        $secu = new MySecu();
        
        // Récupération des variables nécessaires à la connexion
        $user->setPseudo($_POST["pseudo"]);
        $user->setPassword($_POST["password"]);
        
        // si le l'utilisateur est bien confirmé en BDD alors on appelle la methode getRang en argument de Privilege_id()
        // et on génère le Cookie
        if($dao->verifUser()){
            $user->setPrivilege_id($dao->getRang($_POST['pseudo'])['rang']);
            $user->setId($dao->getRang($_POST['pseudo'])['id']);

            $secu->generateCookie($user);
            
            echo "connexion réussie";
        }else{
            echo"erreur connexion";
        }
        
    }
    
    public function logout(){
        setcookie("cookie","",time()-3600*24,"/");
    }

}
