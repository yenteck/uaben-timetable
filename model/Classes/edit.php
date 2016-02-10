<?php
function updateClasse($id,$code,$libelle,$idfiliere){

    global $bdd;


    $req=$bdd->prepare("UPDATE  classe  set codeclasse=? , libelleclasse=? , idfiliere=? WHERE idclasse=?");

    $rows=$req->execute(array($code,$libelle,$idfiliere,$id));

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

    $details['libelle']=$rows[0]['libelleclasse'];
    $details['idfiliere']=$rows[0]['idfiliere'];

    return $details;

}
