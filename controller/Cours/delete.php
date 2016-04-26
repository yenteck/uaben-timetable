<?php

$from = $_SERVER['HTTP_REFERER']; // coming from link

sleep(5);
if(isset($_GET['id'])){

    include 'model/Cours/delete.php';

    $rep=deleteCours((int) $_GET['id']);

    if($rep){
        echo "Cours supprimé";
    }else echo '<h3>Impossible de supprimer cette filiere</h3>';
}