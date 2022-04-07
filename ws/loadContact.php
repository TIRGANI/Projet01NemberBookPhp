<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 include_once '../racine.php';
 include_once RACINE .'/service/ContactService.php';
 loadAll();
}
function loadAll() {
 $es = new ContactService();
 header('Content-type: application/json');
 echo json_encode($es->findAllApi());
}

