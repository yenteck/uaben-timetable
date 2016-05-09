<?php
$page_title="EMPLOIE DE TEMPS";

require_once 'model/Filieres/index.php';
require_once 'model/Emploie/index.php';
checkIFexpired();
if(!isset($_POST['idclasse'])){

    $listeEmploie=null;
}else{

    $idclasse= $_POST['idclasse'];
    $listeEmploie=getListeEmploie($idclasse);
}

$listeClasses=getClasses()->fetchAll();

include "views/Emploie/index.php";