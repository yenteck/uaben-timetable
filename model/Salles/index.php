<?php

function getAllSalles(){
    global  $bdd;

    $rows=$bdd->query("SELECT * FROM salle");

    return $rows;
}