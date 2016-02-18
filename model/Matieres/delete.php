<?php

function deleteMatiere($idmatiere){

    global $bdd;

    $req=$bdd->prepare('DELETE FROM matiere WHERE idmatiere=?');

    $rows=$req->execute(array($idmatiere));

    return $rows>0;
}