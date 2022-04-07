<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once '../racine.php';
        include_once RACINE . '/service/ContactService.php';
        create();
    
}

function create() {
    extract($_POST);
    $es = new ContactService();
    //insertion d’un étudiant
    $es->create(new Contact(1, $nom, $prenom, $ville, $sexe,$phone));
    //chargement de la liste des étudiants sous format json
    header('Content-type: application/json');
    echo json_encode($es->findAllApi());
}
