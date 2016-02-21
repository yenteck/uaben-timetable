<?php

    if(!empty($_GET['id'])){

    	sleep(3);
        include_once 'model/api/timetable.php';

        $idclasse=(int) $_GET['id'];

        $emploie=getEmploie($idclasse);


        echo json_encode($emploie);

    }