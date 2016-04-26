<?php

function getEmploie($idclasse){

    global $bdd;

    $query="SELECT
    c.idcours,
    e.idemploie,
    e.libelleemploie,
    m.codematiere,
    p.nomcourt,
    s.codesalle,
    cla.codeclasse,
    c.jour,c.estdevoir,
    CONCAT(DATE_FORMAT(c.datedebut, '%Hh-%i -'),
            DATE_FORMAT(c.datefin, ' %Hh-%i')) heure
FROM
    matiere m,
    professeur p,
    salle s,
    classe cla,
    cours c,
    emploie e
WHERE
    s.idsalle = c.idsalle
        AND p.idprofesseur = c.idprofesseur
        AND m.idmatiere = c.idmatiere
        AND c.idemploie = e.idemploie
        AND cla.idclasse = e.idclasse
        AND e.idemploie = (SELECT
            MAX(e.idemploie)
        FROM
            emploie e
        WHERE
            e.idclasse = $idclasse)
ORDER BY c.jour , c.datedebut";


    $req=$bdd->query($query);


    $tab=[];
    $libelleEmploie="";

    foreach($req as $r){
        $tmp='';
        if($r['estdevoir']>0) $tmp='DEV-';
        $libelleEmploie=$r['libelleemploie'];
        $tab[($r['jour'])][($r['heure'])]['matiere']=$tmp.$r['codematiere'];
        $tab[($r['jour'])][($r['heure'])]['salle']=$r['codesalle'];
        $tab[($r['jour'])][($r['heure'])]['professeur']=$r['nomcourt'];
        $tab[($r['jour'])][($r['heure'])]['idcours']=$r['idcours'];
    }

    $t['empData']=$tab;
    $t['empTitle']=$libelleEmploie;
    return $t;

}