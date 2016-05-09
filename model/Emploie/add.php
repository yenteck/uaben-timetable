<?php
    function addEmploie($datedebut,$datefin , $idclasse){

        global  $bdd;

        $req=$bdd->prepare("INSERT INTO emploie SET datedebut=?,datefin=? ,  idclasse=? , datemodification=NOW()");
        $req->execute(array($datedebut,$datefin,$idclasse));

        $erreur =$req->errorInfo();
        return  $erreur[1]==null;
    }

