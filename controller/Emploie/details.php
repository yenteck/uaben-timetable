<?php


require 'model/Emploie/details.php';
require 'model/Salles/index.php'; // pour la liste des salles
require 'model/Matieres/index.php'; // pour la liste des matieres
require 'model/Professeurs/index.php'; // pour la liste des professeurs


$page_title="DETAILS EMPLOIE DE TEMPS ";

$idemploie=$_GET['id'];
$lib_classe=getLibelleClasse($idemploie);

// recuperer les salles a afficher dans la modification
$listeSalles=getAllSalles();

// liste matieres

// on recuperer idclasse de l'emploie 9

$listeMatieres=getAllMatieres();

// liste prof

$listeProfesseurs= getAllProfesseurs();

//

$tabEmploie=getTabEmploie($idemploie);

if($_POST['ajax_query']){
    echo json_encode($tabEmploie);
    exit();
}
require 'views/Emploie/details.php';