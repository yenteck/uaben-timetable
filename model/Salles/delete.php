<?php

function deleteSalle($idsalle){

    global $bdd;

    $req=$bdd->prepare('DELETE FROM salle WHERE idsalle=?');

    $rows=$req->execute(array($idsalle));

    return $rows>0;
}