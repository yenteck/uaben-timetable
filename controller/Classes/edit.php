<?php

include_once "model/Classes/edit.php";
$page_title="Page d'edition ";

if(!empty($_POST['codeclasse']) and !empty($_POST['libelleclasse'])){

    if(updateClasse($_GET['id'],$_POST['codeclasse'],$_POST['libelleclasse'],$_POST['idfiliere']))

        header("location:/Classes");

}else{


    require_once 'model/Filieres/index.php';
    $listeFilieres=getAll();
    
    $idc=(int) $_GET['id'];

    $details=getDetailsClasse($idc);
    var_dump($details);


    include_once  "views/Classes/edit.php";
}
