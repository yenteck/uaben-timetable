<?php
function addMatiere($code,$libelle ,$idclasse){

    global $bdd;


    $req=$bdd->prepare("INSERT INTO  matiere  set codematiere=? , libellematiere=? , idclasse=?");

    $rows=$req->execute(array($code,$libelle,$idclasse));

    return $rows;

}