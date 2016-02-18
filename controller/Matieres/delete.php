<?php

if(isset($_GET['id'])){

    include 'model/Matieres/delete.php';

    $rep=deleteMatiere((int) $_GET['id']);

    if($rep){
        header("location:/Matieres");
    }else echo '<h3>Impossible de supprimer cette Matiere .verifiez qu\'elle n\'a pas ete utilisée dans un emploie de temps</h3>';
}