<?php

function getListeEmploie($idclasse){

    global $bdd;

    $query="SELECT idclasse,expired ,idemploie, DATE_FORMAT(datedebut,'%d %M') datedebut , DATE_FORMAT(datefin,'%d %M') datefin FROM emploie WHERE idclasse=$idclasse ORDER BY idemploie";

    $req=$bdd->query($query);

    while($res=$req->fetch()){
        $tabRespone[]=[
            "idemploie"=>$res['idemploie'],
            "expired"=>$res["expired"],
            "idclasse"=>$res['idclasse'],
            "libelleemploie"=>strtoupper("EMPLOI DU ".$res['datedebut']." AU ".$res['datefin'])
        ];
    }

    $req->closeCursor();


    return $tabRespone;



}


function checkIFexpired(){
    global $bdd;
    $res=$bdd->exec("UPDATE emploie SET expired=1 WHERE datefin<CURRENT_DATE ");
}