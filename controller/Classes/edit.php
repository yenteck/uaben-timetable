<?php

include_once "model/Classes/edit.php";
$page_title="Page d'edition ";

if(!empty($_POST['codeclasse']) and !empty($_POST['idfiliere'])){

    if(updateClasse($_GET['id'],$_POST['codeclasse'],$_POST['idfiliere']))

        header("location:/Classes");

}else{


    require_once 'model/Filieres/index.php';
    $listeFilieres=getAll();
    
    $idc=(int) $_GET['id'];
    $details=getDetailsClasse($idc);
    if($_POST["get"]=="json"){
        echo json_encode($details);
        exit();
    }



    include_once  "views/Classes/edit.php";
}
