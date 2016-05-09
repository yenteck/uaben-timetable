<?php

function getClassesPublic(){

        global $bdd;
        $rows=$bdd->query("SELECT * FROM classe ORDER BY codeclasse");
        $data= $rows->fetchAll();
        $rows->closeCursor();
        return $data;
    }

function getTabEmploiePublic($idclasse){

    global $bdd;

    $query="SELECT
            c.idcours,
            m.codematiere,
            p.nomcourt,
            s.codesalle,e.expired,
            cla.codeclasse,
             c.jour,c.estdevoir,s.lieu,
            CONCAT(DATE_FORMAT(c.datedebut, '%Hh-%i -'),
                    DATE_FORMAT(c.datefin, ' %Hh-%i')) heure
        FROM
            matiere m,
            professeur p,
            salle s,
            classe cla,
            cours c ,
            emploie e
        WHERE
				s.idsalle = c.idsalle
                AND p.idprofesseur = c.idprofesseur
                AND m.idmatiere = c.idmatiere
                AND c.idemploie = e.idemploie
                AND cla.idclasse = e.idclasse
                AND e.idemploie=(SELECT max(idemploie) FROM emploie WHERE idclasse=$idclasse )
        ORDER BY c.jour , c.datedebut";


    $req=$bdd->query($query);

    $tab=[];
    foreach($req as $r){
        $tmp='';
        if($r['estdevoir']>0) $tmp='Devoir-';

        $tab[($r['jour'])][($r['heure'])]['matiere']=$tmp.$r['codematiere'];
        $tab[($r['jour'])][($r['heure'])]['salle']=$r['codesalle'];
        $tab[($r['jour'])][($r['heure'])]['expired']=$r['expired'];
        $tab[($r['jour'])][($r['heure'])]['professeur']=$r['nomcourt'];
        $tab[($r['jour'])][($r['heure'])]['idcours']=$r['idcours'];
    }
    return $tab;
}

function dateTostring($i){

    $tab=['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];

    return $tab[$i];
}

function getLibelleClasse($idclasse){

    global $bdd;

    $query="SELECT e.idemploie,e.expired, DATE_FORMAT(e.datedebut,'%d %M') datedebut , DATE_FORMAT(e.datefin,'%d %M') datefin  , c.codeclasse FROM emploie e , classe c WHERE idemploie=(SELECT MAX(idemploie) FROM emploie WHERE idclasse=$idclasse) and c.idclasse=e.idclasse AND c.idclasse=$idclasse";

    $req=$bdd->query($query)->fetch();


    return [
        "libelleemploie"=>strtoupper("EMPLOI DU ".$req["datedebut"]." AU ".$req["datefin"]),
        "codeclasse"=>$req["codeclasse"],
        "expired"=>$req["expired"],
        "idemploie"=>$req["idemploie"]
    ];

}