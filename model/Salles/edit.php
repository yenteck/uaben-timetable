<?php
function updateSalle($id,$code,$lieu){

    global $bdd;


    $req=$bdd->prepare("UPDATE  salle  set codesalle=? , lieu=?  WHERE idsalle=?");

    $rows=$req->execute(array($code,$lieu,$id));

    return $rows;

}

function getDetailsSalle($idsalle){

    global $bdd;

    $details=[];
    $req=$bdd->prepare("SELECT * FROM salle WHERE idsalle=?");

    $req->execute(array($idsalle));

    $rows= $req->fetchAll();
    $req->closeCursor();

    $details['codesalle']=$rows[0]['codesalle'];

    $details['lieu']=$rows[0]['lieu'];

    return $details;

}
