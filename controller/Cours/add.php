<?php



    require "model/Cours/add.php";

    if(isset($_POST['datedebut'])){

        $idemploie=$_POST['idemploie'];
        $idmatiere=$_POST['idmatiere'];
        $idsalle=$_POST['idsalle'];
        $idprofesseur=$_POST['idprofesseur'];
        $datedebut=$_POST['datedebut'];
        $datefin=$_POST['datefin'];
        $jour=$_POST['jour'];
        $isdevoir=isset($_POST['devoir'])&&$_POST['devoir']=='dev'?1:0;




        $rep=addCours($idemploie, $idmatiere , $idsalle,$idprofesseur ,$jour, $datedebut, $datefin,$isdevoir);

        if($rep){
           echo "Cours ajoute";
        }else{
            echo  "impossible d'ajouter ce cours";
        }
    }
