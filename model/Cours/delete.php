<?php

function deleteCours($idcours){

    global $bdd;

    $req=$bdd->prepare('DELETE FROM cours WHERE idcours=?');

    $rows=$req->execute(array($idcours));

    return $rows>0;
}