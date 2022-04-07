<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pays
 *
 * @author Administrateur
 */
class Pays {
     private $id;
    private $nom;
    

    function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    function getId() {
        return $this->id;
    }
  
    function getNom() {
        return $this->nom;
    }

    
    function setId($id) {
        $this->id = $id;
    }
  

    function setNom($nom) {
        $this->nom = $nom;
    }

   

    public function __toString() {
        return $this->nom . " " . $this->prenom;
    }
}
