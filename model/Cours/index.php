<?php

function getEmploie($idclasse){

    global $bdd;

    $query="select c.idcours, m.codematiere ,p.nomprofesseur , s.codesalle  ,cla.codeclasse , DATE_FORMAT(c.datedebut, '%W') jour , concat( date_format(c.datedebut,'%H\h-%i -') ,date_format(c.datefin,' %H\h-%i')) heure
        FROM matiere m , professeur p , salle s , classe cla , cours c

        WHERE c.idclasse=cla.idclasse AND s.idsalle=c.idsalle
        AND  p.idprofesseur = c.idprofesseur AND m.idmatiere=c.idmatiere
        AND cla.idclasse=$idclasse
        ORDER BY c.datedebut
        ";

    $req=$bdd->query($query);

    $tab=[];
    foreach($req as $r){
        $tab[($r['jour'])][($r['heure'])]['matiere']=$r['codematiere'];
        $tab[($r['jour'])][($r['heure'])]['salle']=$r['codesalle'];
        $tab[($r['jour'])][($r['heure'])]['professeur']=$r['nomprofesseur'];
        $tab[($r['jour'])][($r['heure'])]['idcours']=$r['idcours'];
    }
    /*echo "<pre>";
    var_dump($tab);
    echo "</pre>";*/
    return $tab;


}