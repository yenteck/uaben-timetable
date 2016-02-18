<?php
// controller add emploie

$page_title="Ajouter un emploie ";


if(empty($_POST['libelle'])){


    include 'model/Filieres/index.php'; // pour la liste des classe


    $listeClasse=getClasses();


    include 'views/Emploie/add.php';

}else{

   // var_dump($_POST);
    include 'model/Emploie/add.php';
    //var_dump(addEmploie($_POST['libelle'],$_POST['idclasse']));

    if(addEmploie($_POST['libelle'],$_POST['idclasse'])){

        header('location:/Emploie');
    }





}
