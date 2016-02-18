<?php
function updateMatiere($id,$code,$idclasse,$libelle){

    global $bdd;


    $req=$bdd->prepare("UPDATE  matiere  set codematiere=? , idclasse=? , libellematiere=? WHERE idmatiere=?");

    $rows=$req->execute(array($code,$idclasse,$libelle,$id));

    return $rows;

}
function getDetailsMatiere($idmatiere){

    global $bdd;

    $details=[];
    $req=$bdd->prepare("SELECT * FROM matiere WHERE idmatiere=?");

    $req->execute(array($idmatiere));

    $rows= $req->fetchAll();
    $req->closeCursor();

    $details['codematiere']=$rows[0]['codematiere'];

    $details['libellematiere']=$rows[0]['libellematiere'];
    $details['idclasse']=$rows[0]['idclasse'];

    return $details;

}
