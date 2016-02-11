<?php
function addMatiere($code,$libelle ,$idclasse){

    global $bdd;

    $idmatiere=round(20,3000);
    $req=$bdd->prepare("INSERT INTO  matiere (idmatiere,codematiere, libellematiere,idclasse) VALUES(?,'?','?' ,?)");


    $rows=$req->execute(array($idmatiere,$code,$libelle,$idclasse));

    return $rows;

}