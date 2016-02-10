<?php

$page_title="Ajouter une Classe";

if(!empty($_POST['codematiere']) and !empty($_POST['libellematiere'])){

    require_once 'model/Matieres/add.php';

    $codematiere = htmlspecialchars($_POST['codematiere']);
    $libellematiere = htmlspecialchars($_POST['libellematiere']);
    $idclasse = htmlspecialchars($_POST['idclasse']);

    if(addMatiere($codematiere,$libellematiere,$idclasse)){

        header("location:/Matieres");
    }else header("location:/Matieres/add");

    //
}else{


    require_once 'model/Matieres/index.php';
    include_once "model/Filieres/index.php"; // pour acceder à la fonction de recup des classse

    $listeClasses=getClasses();
    include_once "views/Matieres/add.php";
}
