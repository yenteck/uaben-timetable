<?php

function getEmploie($idclasse){

    global $bdd;

    $query="SELECT * FROM emploie WHERE idclasse=$idclasse ";

    $req=$bdd->query($query);
    /*echo "<pre>";
    var_dump($tab);
    echo "</pre>";*/
    return $req;


}