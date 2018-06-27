<?php

namespace BWB\Framework\mvc\custom_core;


use BWB\Framework\mvc\SecurityMiddleware;
use Exception;
use Firebase\JWT\JWT;
use UserInterface;

/*
 * Création du dossier custom_core avec la Class MySecu pour profiter de l'héritage
 * du SecurityMiddleware.
 * On peut ainsi personnaliser les clés du Payload pour récupérer les infos du formulaire d'inscription.
 * Le Token créé sera utilisé pour le mail de confirmation.
 */

/**
 * Description of MySecu
 *
 * @author julien
 */
class MySecu extends SecurityMiddleware{
  
    /**
     * 
     * @var array informations qui transitent entre le client et le serveur
     */
    private $payload;

    /**
     *
     * @var string La passphrase (il est important de la passer dans un 
     * mecanisme de hachage pour plus de securité
     *   
     */
    private $passport = "Bonjour a tous";

    /**
     *
     * @var int durée du token. Par défaut 24h
     */
    private $expiration = (60*60*24);

    /**
     * Setter pour modifier l'expiration du token
     * @param int $expiration
     */
    public function setExpiration($expiration) {
        $this->expiration = $expiration;
    }

    /**
     * Genere un token basé sur l'utilisateur passé en argument
     * et encapsule le cookie dans l'en-tête de la réponse.
     * 
     * Le cookie généré est disponible pour le domaine complet
     * 
     * @param UserInterface $user L'utilisateur pour lequel le token est généré
     * 
     * @return string Le token généré
     * 
     */
    public function generateToken($user) {
        $this->payload = array(
            "prenom" => $user->getPrenom(),
            "pseudo" => $user->getPseudo(),
            "exp" => time() + $this->expiration
        );
        $tkn = JWT::encode($this->payload, $this->passport);
        setcookie("tkn", $tkn, $this->payload['exp'], "http://" . $_SERVER['SERVER_NAME']);
        return $tkn;
       
        
    }

    /**
     * verifie l'integrité du token envoyé par le client
     * 
     * @param string $jwt le token reçu par le serveur
     * @return mixed le payload si le token est valide, faux dans LES cas contraires.
     */
    public function verifyToken($jwt) {
        try {
            return JWT::decode($jwt, $this->passport, array('HS256'));
        } catch (Exception $ex) {
            return false;
        }
    }
    
}
