<?php

include_once '../racine.php';
include_once RACINE.'/service/ContactService.php';
extract($_GET);
$es = new ContactService();
$es->create(new Contact(1, $nom, $prenom, $ville, $sexe,$phone));
header("location:../index.php");
