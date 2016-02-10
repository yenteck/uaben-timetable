<?php

$page_title="Page de connexion";
// ici on inclu la vue login seulement
if(empty($_POST['pseudo']) && empty($_POST['password'])){


    include "views/Auth/login.php";

}else {

    include_once "model/Auth/login.php";


    $reponse =isIN($_POST['pseudo'],$_POST['password']);


    if($reponse['isIN']){
        $_SESSION['pseudo']=$reponse['pseudo'];
        $_SESSION['idutilisateur']=$reponse['idutilisateur'];
        $_SESSION['isconnected']=true;

        header('location:/');
    }else{


        // si pas logges
        header('location:/');
        $_SESSION['isconnected']=false;
    }
}
