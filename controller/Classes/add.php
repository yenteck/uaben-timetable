<?php

$page_title="Ajouter une Classe";

if(!empty($_POST['codeclasse']) and !empty($_POST['libelleclasse']) and !empty($_POST['idfiliere'])){

    require_once 'model/Classes/add.php';

    $codeclasse = htmlspecialchars($_POST['codeclasse']);
    $libelleclasse = htmlspecialchars($_POST['libelleclasse']);
    $idfiliere = htmlspecialchars($_POST['idfiliere']);

    if(addClasse($codeclasse,$libelleclasse,$idfiliere)){

        header("location:/Classes");
    }else header("location:/Classes/add");

    //
}else{

    var_dump($_POST);
    require_once 'model/Filieres/index.php';
    $listeFilieres=getAll();
    include_once "views/Classes/add.php";
}

