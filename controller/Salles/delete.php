<?php

if(isset($_GET['id'])){

    include 'model/Salles/delete.php';

    $rep=deleteSalle((int) $_GET['id']);

    if($rep){
        header("location:/Salles");
    }else echo '<h3>Impossible de supprimer cette SALLE</h3>';
}