<?php
$page_title="Ajouter un Professeur";

if(!empty($_POST['nomcourt'])  and !empty($_POST['nomprofesseur'])){

    require_once 'model/Professeurs/add.php';

    $nomcourt = htmlspecialchars($_POST['nomcourt']);
    $nom = htmlspecialchars($_POST['nomprofesseur']);
    $prenom = htmlspecialchars($_POST['prenomprofesseur']);
    $email = htmlspecialchars($_POST['emailprofesseur']);
    $contact = htmlspecialchars($_POST['contact']);

    if(addProfesseur($nom,$prenom,$email,$contact,$nomcourt)){

        header("location:/Professeurs");
    }else header("location:/Professeurs/add");

    //
}else{
    include_once "views/Professeurs/add.php";
}