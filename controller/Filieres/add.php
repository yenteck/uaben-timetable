<?php

$page_title="Ajouter une filiere";

if(!empty($_POST['codefiliere']) and !empty($_POST['libellefiliere'])){

    require_once 'model/Filieres/add.php';

    $codefiliere = htmlspecialchars($_POST['codefiliere']);
    $libellefiliere = htmlspecialchars($_POST['libellefiliere']);

    if(addFiliere($codefiliere,$libellefiliere,$_SESSION['idutilisateur'])){

        header("location:/Filieres");
    }else header("location:/Filieres/add");

    //
}else{
    include_once "views/Filieres/add.php";
}


