<?php

function getAllProfesseurs(){
    global  $bdd;

    $rows=$bdd->query("SELECT * FROM professeur");

    return $rows;
}