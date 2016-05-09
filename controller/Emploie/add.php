<?php
// controller add emploie

$page_title="Ajouter un emploie ";


if(empty($_POST['datedebut']) AND empty($_POST['datefin'])){


    include 'model/Filieres/index.php'; // pour la liste des classe


    $listeClasse=getClasses();


    include 'views/Emploie/add.php';

}else{

   // var_dump($_POST);
    include 'model/Emploie/add.php';
    //var_dump(addEmploie($_POST['libelle'],$_POST['idclasse']));

    if(addEmploie($_POST['datedebut'],$_POST['datefin'],$_POST['idclasse'])){

        header('location:/Emploie');
    }





}
