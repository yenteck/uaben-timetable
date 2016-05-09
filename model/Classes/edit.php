<?php
function updateClasse($id,$code,$idfiliere){

    global $bdd;


    $req=$bdd->prepare("UPDATE  classe  set codeclasse=? , idfiliere=? WHERE idclasse=?");

    $rows=$req->execute(array($code,$idfiliere,$id));

    return $rows;

}
function getDetailsClasse($idclasse){

    global $bdd;

    $details=[];
    $req=$bdd->prepare("SELECT * FROM classe WHERE idclasse=?");

    $req->execute(array($idclasse));

    $rows= $req->fetchAll();
    $req->closeCursor();

    $details['code']=$rows[0]['codeclasse'];
    $details['idfiliere']=$rows[0]['idfiliere'];

    return $details;

}
