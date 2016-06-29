<?php

function addClasse($code ,$idfiliere){

    global $bdd;

    debug($idfiliere);
    $req=$bdd->prepare("INSERT INTO  classe  set codeclasse=?  , idfiliere=?");


    $rows=$req->execute(array($code,$idfiliere));


    return $rows;

}