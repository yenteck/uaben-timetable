<?php
function addSalle($codesalle,$lieu){

    global $bdd;


    $req=$bdd->prepare("INSERT INTO  salle  set codesalle=?, lieu=?");

    $rows=$req->execute(array($codesalle,$lieu));

    return $rows;

}