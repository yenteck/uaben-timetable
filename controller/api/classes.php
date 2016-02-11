<?php

if(isset($_GET['id'])){

    include_once 'model/api/classes.php';


    $listeClasses=getClasses();

    echo json_encode($listeClasses);
}