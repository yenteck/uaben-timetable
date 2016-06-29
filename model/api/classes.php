<?php
function getClasses(){
    global  $bdd;



    $req=$bdd->prepare("SELECT codeclasse , idclasse FROM classe");
    $req->execute();
    

    $classes=[];

    foreach($req as $r){
        $classes[]=['code'=>$r['codeclasse'],'id'=>$r['idclasse']];
    }


    return $classes;
}