<?php
    include_once 'model/Emploie/delete.php';

    $idemp = (int) $_GET['id'];



    $from=$_SERVER['HTTP_REFERER'];

    if(deleteEmploie($idemp)){
        header("location:$from");
    }else echo "Impossible de supprimer l'emploie <br> <a href='$from'>RETOUR</a>";
