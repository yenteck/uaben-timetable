<?php
function getTabEmploie($idemploie){

    global $bdd;

    $query="SELECT
            c.idcours,
            m.codematiere,
            p.nomcourt,
            s.codesalle,
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
                AND e.idemploie=$idemploie
        ORDER BY c.jour , c.datedebut";


    $req=$bdd->query($query);

    $tab=[];
    foreach($req as $r){
        $tmp='';
        if($r['estdevoir']>0) $tmp='Devoir-';

        $tab[($r['jour'])][($r['heure'])]['matiere']=$tmp.$r['codematiere'];
        $tab[($r['jour'])][($r['heure'])]['salle']=$r['codesalle'];
        $tab[($r['jour'])][($r['heure'])]['professeur']=$r['nomcourt'];
        $tab[($r['jour'])][($r['heure'])]['idcours']=$r['idcours'];
    }
    return $tab;
}









function getNameClasse($ide){
    global  $bdd;
    $rep=$bdd->query("SELECT c.libelleclasse ,c.codeclasse ,e.libelleemploie FROM classe c , emploie e WHERE e.idemploie=$ide AND e.idclasse=c.idclasse");

    $re=$rep->fetch();
    return $re;
}

function dateTostring($i){

    $tab=['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];

    return $tab[$i];
}