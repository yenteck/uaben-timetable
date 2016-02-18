<?php
    function addEmploie($libelle , $idclasse){

        global  $bdd;

        $req=$bdd->prepare("INSERT INTO emploie SET libelleemploie=? ,  idclasse=? , datemodification=NOW()");
        $req->execute(array($libelle,$idclasse));

        $erreur =$req->errorInfo();
        return  $erreur[1]==null;
    }

