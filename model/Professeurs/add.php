<?php


function addProfesseur($nom,$prenom,$email,$contact,$nomcourt){

    global $bdd;


    $req=$bdd->prepare("INSERT INTO  professeur  set nomprofesseur=:nom,prenomprofesseur=:prenom, emailprofesseur=:email , contact=:contact, nomcourt=:nomcourt");


    $rows=$req->execute(array(':nom'=>$nom,
    ':prenom'=>$prenom,
    ':email'=>$email,
    ':contact'=>$contact,
    ':nomcourt'=>$nomcourt));



    return $rows;

}