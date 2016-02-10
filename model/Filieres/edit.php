<?php
    function getDetails($idfiliere){

        global $bdd;

        $details=[];
        $req=$bdd->prepare("SELECT * FROM filiere WHERE idfiliere=?");

        $req->execute(array($idfiliere));

        $rows= $req->fetchAll();
        $req->closeCursor();

        $details['code']=$rows[0]['codefiliere'];
        $details['libelle']=$rows[0]['libellefiliere'];

        return $details;

    }

    function updateFiliere($id,$code,$libelle){

        global $bdd;


        $req=$bdd->prepare("UPDATE  filiere  set codefiliere=? , libellefiliere=? WHERE idfiliere=?");

        $rows=$req->execute(array($code,$libelle,$id));

        return $rows;

    }