<?php



require 'model/Public/index.php';




$page_title="DETAILS EMPLOIE DE TEMPS ";


$listeClasses=getClassesPublic();

$tabEmploie=[];
if(isset($_POST['idclasse']) and !empty($_POST['idclasse'])){
    $tabEmploie=getTabEmploiePublic($_POST['idclasse']);
    $lib=getLibelleClasse($_POST['idclasse']);

}else{


}





require 'views/Public/index.php';


    unset($_POST);

