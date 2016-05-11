<?php


include_once 'inc/html2pdf/html2pdf.class.php';
include_once "model/Emploie/print.php";


$idemploie=$_GET['id'];
$tabEmploie=getTabEmploie($idemploie);

$libclasse=getNameClasse($idemploie)["libelleclasse"];
$libemploie=getNameClasse($idemploie)["libelleemploie"];
$codeclasse=getNameClasse($idemploie)["codeclasse"];
ob_start();

    include_once "views/Emploie/print.php";
$contenu=ob_get_clean();


$monpdf=new HTML2PDF('l','A4','fr');




$monpdf->writeHTML($contenu);
if(substr($_SERVER['HTTP_REFERER'],-6,6)=='public')
$monpdf->output("$libemploie.$libclasse.pdf",'D');
else $monpdf->output("$libemploie.$libclasse.pdf");
