<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\controllers;

use BWB\Framework\mvc\Controller;
use BWB\Framework\mvc\custom_core\MySecu;
use BWB\Framework\mvc\dao\DAOUser;
use BWB\Framework\mvc\models\Adresse;
use BWB\Framework\mvc\models\User;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Description of Inscription
 *
 * @author alexandreplanque
 */
class InscriptionController extends Controller{
    
    public function SignIn(){
        
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
        $user->setContact(1);
        // on fait appel a la methode create du DAOUser 
        // on génère un token JWT et on vérifie si les données correspondent au POST du formulaire
//        echo json_encode($this->inputPost()['nom']);
        if ($dao->verifPseudo()) {
            $userStatus = $dao->create($user);

            $sendMail = $this->registerConfirm();
//            $this->render("confirmInscription");
            http_response_code(200);
            header ("Content-Type: Application/json");
//            echo json_encode(array("gg"=>"Votre inscription s'est déroulé avec succès vous allez recevoir un mail afin de valider votre compte."));
            } else {
            
            http_response_code(500);
//            echo json_encode(array("erreur"=>"Une erreur est survenue lors de l'inscription veuillez réiterer l'opération en prennant soin de vérifier les champs."));
//            $this->render("failInscription");
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
//        $mail->SMTPDebug = 2;
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
//            echo "Erreur";
        } else {
//            echo "Message envoyé";
//            echo "<hr>";
//            var_dump($token);
//            echo"<hr>";
//            var_dump($secu->verifyToken($token)); 
        }
    }
}
