<?php
$page_title="EMPLOIE DE TEMPS";

require_once 'model/Filieres/index.php';
require_once 'model/Emploie/index.php';
if(!isset($_POST['idclasse'])){

    $listeEmploie=null;
}else{

    $idclasse= $_POST['idclasse'];
    $listeEmploie=getEmploie($idclasse);
}

$listeClasses=getClasses();

include "views/Emploie/index.php";