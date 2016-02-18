<?php


function getAllMatieres($idclasse=false){
    global  $bdd;

    if(!empty($idclasse)){
        // on affiche seulement les matieres qui appartiennent au prof
        $rows=$bdd->query("SELECT * FROM matiere m ,classe c ,filiere f WHERE m.idclasse=c.idclasse  AND c.idclasse=$idclasse AND  f.idfiliere=c.idfiliere AND f.idutilisateur=".$_SESSION['idutilisateur']." ORDER BY codematiere");
    }else{

        $rows=$bdd->query("SELECT * FROM matiere m ,classe c ,filiere f WHERE m.idclasse=c.idclasse  AND  f.idfiliere=c.idfiliere AND  f.idutilisateur=".$_SESSION['idutilisateur']." ORDER BY codematiere");
    }


    return $rows;
}
