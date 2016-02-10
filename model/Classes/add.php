<?php

function addClasse($code,$libelle ,$idfiliere){

    global $bdd;


    $req=$bdd->prepare("INSERT INTO  classe  set codeclasse=? , libelleclasse=? , idfiliere=?");

    $rows=$req->execute(array($code,$libelle,$idfiliere));

    return $rows;

}