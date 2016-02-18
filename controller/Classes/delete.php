<?php

if(isset($_GET['id'])){

    include 'model/Classes/delete.php';

    $rep=deleteClasse((int) $_GET['id']);

    if($rep){
        header("location:/Classes");
    }else echo '<h3>Impossible de supprimer cette Classes.Verifier que cette classe n\'a pas étée utilisé ailleurs</h3>';
}