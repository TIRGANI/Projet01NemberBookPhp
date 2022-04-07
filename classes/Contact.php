<?php

/**
 * Description of Etudiant
 *
 * @author Elharhari Milouda
 */
class Contact {

    private $id;
    private $nom;
    private $prenom;
    private $ville;
    private $sexe;
    private $phone;

    function __construct($id, $nom, $prenom, $ville, $sexe,$phone) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->ville = $ville;
        $this->sexe = $sexe;
        $this->phone = $phone;
    }

    function getId() {
        return $this->id;
    }
  function getphone() {
        return $this->phone;
    }
    function getNom() {
        return $this->nom;
    }

    function getPrenom() {

        return $this->prenom;
    }

    function getVille() {
        return $this->ville;
    }

    function getSexe() {
        return $this->sexe;
    }

    function setId($id) {
        $this->id = $id;
    }
     function setPhone($phone) {
        $this->phone = $phone;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setVille($ville) {
        $this->ville = $ville;
    }

    function setSexe($sexe) {
        $this->sexe = $sexe;
    }

    public function __toString() {
        return $this->nom . " " . $this->prenom;
    }

}
