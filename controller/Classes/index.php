<?php

$page_title="Classes";

require_once 'model/Filieres/index.php';
//require_once 'model/Filieres/index.php'; pas besoin car pas trop de fonction
$listeFilieres=getAll();

if(!isset($_POST['idfiliere'])){
    $listeClasses=getClasses();
}else{

    $idf=(int)$_POST['idfiliere'];
    $listeClasses=getClasses($idf);
}


include "views/Classes/index.php";

