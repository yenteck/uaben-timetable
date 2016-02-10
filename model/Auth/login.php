<?php

    function isIN($pseudo , $pass){
        global  $bdd;
        $pseudo=htmlspecialchars($pseudo);
        $pass=htmlspecialchars($pass);

        $req=$bdd->prepare("SELECT count(*) nb FROM utilisateur WHERE pseudo =? and motdepasse=?");
        $req->execute(array($pseudo,$pass));
        $rows=$req->fetchAll();
        $req->closeCursor();
        $reponse=[];

        if($rows[0]['nb']>0){


            $req=$bdd->prepare("SELECT * FROM utilisateur WHERE pseudo =? and motdepasse=?");
            $req->execute(array($pseudo,$pass));
            $rows=$req->fetchAll();
            $req->closeCursor();
            $reponse['isIN']=true;
            $reponse['pseudo']=$rows[0]['pseudo'];
            $reponse['idutilisateur']=$rows[0]['idutilisateur'];
        }else $reponse['isIN']=false;


        return $reponse;

    }