<?php

/**
 * @param $idemploie
 * @return bool
 * permet
 */

function deleteEmploie($idemploie){

    global $bdd;

    $req=$bdd->prepare("DELETE FROM emploie WHERE idemploie=? ");

    $rows=$req->execute(array($idemploie));

    return $rows===true;
}

