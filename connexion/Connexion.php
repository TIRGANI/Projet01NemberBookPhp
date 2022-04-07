<?php

/**
 * Description of Connexion
 *
 * @author TIRGANI badreddine
 */
class Connexion {

    private $connexion;

    public function __construct() {
        $host = 'localhost';
        $dbname = 'nemberBook';
        $login = 'root';
        $password = '';
        try {
            $this->connexion = new PDO("mysql:host=$host;dbname=$dbname", $login, $password);
            $this->connexion->query("SET NAMES UTF8");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function getConnexion() {
        return $this->connexion;
    }

}
