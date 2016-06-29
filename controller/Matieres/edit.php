<?php

include_once "model/Matieres/edit.php";
$page_title="Page d'edition de matiere ";


if(!empty($_POST['codematiere']) and !empty($_POST['idclasse'])){

    if(updateMatiere($_GET['id'],$_POST['codematiere'],$_POST['idclasse'],$_POST['libellematiere']))

        header("location:/Matieres");

}else{


    require_once 'model/Filieres/index.php';
    $listeClasses=getClasses();

    $idm=(int) $_GET['id'];

    $details=getDetailsMatiere($idm);


    include_once  "views/Matieres/edit.php";
}
