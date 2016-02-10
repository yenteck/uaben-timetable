<?php
    function getAll(){
        global  $bdd;

        $rows=$bdd->query("SELECT * FROM filiere");

        return $rows;
    }

    function getClasses($idfiliere=false){
        global  $bdd;


        // if the idfiliere is set so the request come from classes page
        if(!empty($idfiliere)){

            $req=$bdd->prepare("SELECT c.idclasse ,c.codeclasse , c.libelleclasse , f.codefiliere FROM classe c , filiere f WHERE c.idfiliere = f.idfiliere and f.idfiliere=?");
            $req->execute(array($idfiliere));
        }else{

            $req=$bdd->prepare("SELECT c.idclasse , c.codeclasse , c.libelleclasse , f.codefiliere FROM classe c , filiere f WHERE c.idfiliere = f.idfiliere");
            $req->execute();
        }



        return $req;
    }