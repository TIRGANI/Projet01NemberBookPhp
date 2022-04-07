<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../racine.php';
    include_once RACINE . '/service/ContactService.php';
    drop();
}
//
function drop() {
  /*  extract($_POST);
    $es = new ContactService();
    //destriction d’un étudiant
    
    $es->delete($id);
    //chargement de la liste des étudiants sous format json
    header('Content-type: application/json');
    echo json_encode($es->findAllApi());*/
    $es = new ContactService();
    $es->deleteAll();
 header('Content-type: application/json');
    echo json_encode($es->findAllApi());
}
