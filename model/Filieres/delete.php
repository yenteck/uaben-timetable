<?php

function deleteFiliere($idfiliere){

    global $bdd;

    $req=$bdd->prepare('DELETE FROM filiere WHERE idfiliere=?');

    $rows=$req->execute(array($idfiliere));

    return $rows>0;
}