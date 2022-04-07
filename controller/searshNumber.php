<?php

include_once '../racine.php';
include_once RACINE.'/service/ContactService.php';
extract($_GET);
$es = new ContactService();
if($Sname!=null)
{
  //  echo 'name is '.$Sname;
    echo $es->findByName($Sname);
//header("location:../index.php");
}
elseif ($Sphone!=null) {
    echo $es->findByphone($Sphone);
//header("location:../index.php");
}