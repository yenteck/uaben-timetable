<?php

    if(isset($_GET['id'])){

        include_once 'model/Cours/index.php';

        $idclasse=(int) $_GET['id'];

        $emploie=getEmploie($idclasse);

        echo json_encode($emploie);
    }