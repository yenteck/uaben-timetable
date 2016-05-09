<?php


function getLastDate($idclasse){

    global $bdd;
    $rows=$bdd->query("SELECT datefin , idemploie FROM emploie WHERE idclasse=$idclasse AND idemploie=(SELECT max(idemploie) FROM emploie WHERE idclasse=$idclasse)");

    $res=$rows->fetch();
    $rows->closeCursor();

    return $res["datefin"];
}