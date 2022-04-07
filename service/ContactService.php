<?php

/**
 * Description of EtudiantService
 *
 * @author Elharhari Milouda
 */
include_once RACINE . '/classes/Contact.php';
include_once RACINE . '/connexion/Connexion.php';
include_once RACINE . '/dao/IDao.php';

class ContactService implements IDao {

    private $connexion;

    function __construct() {
        $this->connexion = new Connexion();
    }

    public function create($o) {
   
        $query = "INSERT INTO contact (`id`, `nom`, `prenom`, `ville`, `sexe`,`phone`) "
                . "VALUES (NULL, '" . $o->getNom() . "', '" . $o->getPrenom() . "',
'" . $o->getVille() . "', '" . $o->getSexe() . "', '" . $o->getphone() . "');";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }
    
      

    public function delete($id) {
        $query = "DELETE FROM `contact` WHERE id =  " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL ');
    }
     public function deleteAll() {
        $query = "DELETE FROM `contact` ;" ;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL ');
    }

    public function findAll() {
        $etds = array();
        $query = "select * from contact";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Contact($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe, $e->phone);
        }
        return $etds;
    }
     public function findAllPayee() {
        $etds = array();
        $query = "select * from m_lieu_pays_pay";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        while ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etds[] = new Contact($e->id_pays, $e->pays_nom_fr, $e->pays_nom_en, $e->pays_nom_en, $e->pays_nom_en, $e->pays_nom_en);
        }
        return $etds;
    }
    
     
    public function findByName($name) {
        $query = "SELECT * FROM `contact` WHERE nom like '".$name."';";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Contact($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe, $e->phone);
        }
        return $etd->getphone();
    }
     
    public function findByphone($phone) {
        $query = "SELECT * FROM `contact` WHERE phone like '".$phone."';";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Contact($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe, $e->phone);
        }
        return $etd->getNom().' '.$etd->getPrenom();
    }
   
    
    
    public function findById($id) {
        $query = "select * from contact where id = " . $id;
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        if ($e = $req->fetch(PDO::FETCH_OBJ)) {
            $etd = new Contact($e->id, $e->nom, $e->prenom, $e->ville, $e->sexe, $e->phone);
        }
        return $etd;
    }

    public function update($o) {
        $query = "UPDATE `contact` SET `nom` = '" . $o->getNom() . "', `prenom` = '" .
                $o->getPrenom() . "', `ville` = '" . $o->getVille() . "', `sexe` = '" .
                $o->getSexe() . "', `phone` = '" .
                $o->getphone() . "' WHERE `contact`.`id` = " . $o->getId();
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute() or die('Erreur SQL');
    }

    public function findAllApi() {
        $query = "select * from contact";
        $req = $this->connexion->getConnexion()->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
