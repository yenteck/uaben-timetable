<?php

    var_dump($_POST);

    require "model/Cours/add.php";

    $idemploie=$_POST['idemploie'];
    $idmatiere=$_POST['idmatiere'];
    $idsalle=$_POST['idsalle'];
    $idprofesseur=$_POST['idprofesseur'];
    $datedebut=$_POST['datedebut'];
    $datefin=$_POST['datefin'];
    $jour=$_POST['jour'];


    $rep=addCours($idemploie, $idmatiere , $idsalle,$idprofesseur ,$jour, $datedebut, $datefin);

    if($rep){
        header("location:/Emploie/details/$idemploie");
    }else{
        echo  "impossible d'ajouter ce cours";
    }