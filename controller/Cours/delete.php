<?php

$from = $_SERVER['HTTP_REFERER']; // coming from link

if(isset($_GET['id'])){

    include 'model/Cours/delete.php';

    $rep=deleteCours((int) $_GET['id']);

    if($rep){
        header("location:$from");
    }else echo '<h3>Impossible de supprimer cette filiere</h3>';
}