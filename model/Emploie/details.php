<?php
    function getLibelleClasse($idemploie){

        global $bdd;

        $query="SELECT e.libelleemploie , c.codeclasse FROM emploie e , classe c WHERE idemploie=$idemploie and c.idclasse=e.idclasse ";

        $req=$bdd->query($query)->fetch();


        return $req;

    }

    function getTabEmploie($idemploie){

        global $bdd;

        $query="SELECT
            c.idcours,
            m.codematiere,
            p.nomcourt,
            s.codesalle,
            cla.codeclasse,
             c.jour,
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
            $tab[($r['jour'])][($r['heure'])]['matiere']=$r['codematiere'];
            $tab[($r['jour'])][($r['heure'])]['salle']=$r['codesalle'];
            $tab[($r['jour'])][($r['heure'])]['professeur']=$r['nomcourt'];
            $tab[($r['jour'])][($r['heure'])]['idcours']=$r['idcours'];
        }
        return $tab;
    }

    function dateTostring($i){

        $tab=['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'];

        return $tab[$i];
    }