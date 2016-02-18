<?php

if(isset($_GET['id'])){

    include 'model/Filieres/delete.php';

    $rep=deleteFiliere((int) $_GET['id']);

    if($rep){
        header("location:/Filieres");
    }else echo '<h3>Impossible de supprimer cette filiere</h3>';
}