<?php

function addFiliere($code,$libelle ,$iduser){

    global $bdd;


    $req=$bdd->prepare("INSERT INTO  filiere  set codefiliere=? , libellefiliere=? , idutilisateur=?");

    $rows=$req->execute(array($code,$libelle,$iduser));

    var_dump($rows);
    return $rows;

}