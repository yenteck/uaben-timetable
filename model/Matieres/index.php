<?php

function getAllMatieres($idclasse=false){
    global  $bdd;

    if(!empty($idclasse)){
        $rows=$bdd->query("SELECT * FROM matiere ,classe WHERE matiere.idclasse=classe.idclasse  AND classe.idclasse=$idclasse");
    }else{

        $rows=$bdd->query("SELECT * FROM matiere ,classe WHERE matiere.idclasse=classe.idclasse ");
    }


    return $rows;
}
