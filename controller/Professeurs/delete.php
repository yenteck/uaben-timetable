<?php

if(isset($_GET['id'])){

    include 'model/Professeurs/delete.php';

    $rep=deleteProfesseur((int) $_GET['id']);

    if($rep){
        header("location:/Professeurs");
    }else echo '<h3>Impossible de supprimer ce PROF .VERIFIEZ QU\'IL N\'EST PAS UTILISE DANS UN COURS</h3>';
}