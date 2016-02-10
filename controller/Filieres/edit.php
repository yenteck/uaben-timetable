<?php

include_once "model/Filieres/edit.php";
$page_title="Page d'edition ";

if(!empty($_POST['codefiliere']) and !empty($_POST['codefiliere'])){

    if(updateFiliere($_GET['id'],$_POST['codefiliere'],$_POST['libellefiliere']))

    header("location:/Filieres");

}else{



    $details=getDetails($_GET['id']);

    include_once  "views/Filieres/edit.php";
}
