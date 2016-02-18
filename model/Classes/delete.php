<?php

function deleteClasse ($idclasse) {

    global $bdd;

    $req=$bdd->prepare('DELETE FROM classe WHERE idclasse=?');

    $rows=$req->execute(array($idclasse));

    return $rows>0;
}