<?php

class Pdoconnect{
    private $host='localhost';
    private $dbname='time_table';
    private $username='yenteck';
    private $password='beboila';
    private $bdd;

    public function __construct(){


       // $this->bdd->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);

    }
    public  function getBD(){
        return $this->bdd;
    }
    public function query($stat){
        $rep=$this->bdd->query($stat);

        $data=$rep->fetchAll();

        $rep->closeCursor();

        $errors=$rep->errorInfo();
        return $data;

    }
}

try{
    $bdd=new PDO("mysql:dbname=timetable;host=localhost","yenteck","beboila");

}catch(Exception $e){
    die("erreur .$e->getMessage()");
}




