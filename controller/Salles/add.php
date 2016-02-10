<?php
$page_title="Ajouter une Salle";

if(!empty($_POST['codesalle'])  and !empty($_POST['lieu'])){

    require_once 'model/Salles/add.php';

    $codesalle = htmlspecialchars($_POST['codesalle']);
    $lieu = htmlspecialchars($_POST['lieu']);

    if(addSalle($codesalle,$lieu)){

        header("location:/Salles");
    }else header("location:/Salles/add");

    //
}else{
    include_once "views/Salles/add.php";
}
