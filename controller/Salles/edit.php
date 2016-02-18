<?php

include_once "model/Salles/edit.php";

$page_title="Modifier salle  ";

if(!empty($_POST['codesalle']) and !empty($_POST['lieu'])){

    if(updateSalle($_GET['id'],$_POST['codesalle'],$_POST['lieu']))

        header("location:/Salles");
    else echo 'impossible de mettre a jour cette salle';

}else{


    $ids=(int) $_GET['id'];

    $details=getDetailsSalle($ids);

    include_once  "views/Salles/edit.php";
}
