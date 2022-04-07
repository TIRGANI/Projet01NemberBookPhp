<?php

include_once '../racine.php';
include_once RACINE . '/service/ContactService.php';
extract($_GET);
$es = new ContactService();
$es->delete($id);
header("location:../index.php");
