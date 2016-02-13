<?php

    function addCours($idemploie, $idmatiere , $idsalle,$idprofesseur ,$jour, $datedebut, $datefin){

        global  $bdd;

        $req=$bdd->prepare("INSERT INTO cours SET idemploie=:idemploie,idmatiere=:idmatiere , idsalle=:idsalle, idprofesseur = :idprofesseur ,jour=:jour, datedebut=:datedebut , datefin =:datefin");
        $rows=$req->execute(array(
            ':idemploie'=>$idemploie,
            ':idmatiere'=>$idmatiere,
            ':idsalle'=>$idsalle,
            ':idprofesseur'=>$idprofesseur,
            ':datedebut'=>$datedebut,
            ':datefin'=>$datefin,
            ':jour'=>(int)$jour
        ));

        return $rows;

    }