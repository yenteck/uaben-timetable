<?php

if(isset($_GET['id'])){

    sleep(02);  //pour faire attendre le serveur

    include_once 'model/api/classes.php';


    $listeClasses=getClasses();

    echo json_encode($listeClasses);
}