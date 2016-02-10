<?php
include_once "model/Matieres/index.php";
include_once "model/Filieres/index.php"; // pour acceder à la fonction de recup des classse


$listeClasses=getClasses();
$page_title="Matieres ";

if(!isset($_POST['idclasse'])){
    $allMatieres=getAllMatieres();
}else{

    $idclasse=(int)$_POST['idclasse'];
    $allMatieres=getAllMatieres($idclasse);
}


include "views/Matieres/index.php";