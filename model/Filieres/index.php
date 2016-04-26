<?php
    function getAll(){
        global  $bdd;

        $rows=$bdd->query("SELECT * FROM filiere WHERE idutilisateur=".$_SESSION['idutilisateur']);

        return $rows;
    }

    function getClasses($idfiliere=false){
        global  $bdd;


        // if the idfiliere is set so the request come from classes page
        if(!empty($idfiliere)){

            $req=$bdd->prepare("SELECT c.idclasse ,c.codeclasse , c.libelleclasse , f.codefiliere FROM classe c , filiere f WHERE c.idfiliere = f.idfiliere and f.idfiliere=? AND idutilisateur=".$_SESSION['idutilisateur']." ORDER BY c.codeclasse ASC" );
            $req->execute(array($idfiliere));
        }else{

            $req=$bdd->prepare("SELECT c.idclasse , c.codeclasse , c.libelleclasse , f.codefiliere FROM classe c , filiere f WHERE c.idfiliere = f.idfiliere AND idutilisateur=".$_SESSION['idutilisateur']." ORDER BY c.codeclasse ASC");
            $req->execute();
        }



        return $req;
    }