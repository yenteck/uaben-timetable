<?php

function deleteProfesseur($idprof){

    global $bdd;

    $req=$bdd->prepare('DELETE FROM professeur WHERE idprofesseur=?');

    $rows=$req->execute(array($idprof));

    return $rows>0;
}