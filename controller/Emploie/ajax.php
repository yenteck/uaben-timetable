<?php

require_once "model/Emploie/ajax.php";
$idclasse=$_GET['id'];

$lastdate=getLastDate($idclasse);
echo $lastdate;