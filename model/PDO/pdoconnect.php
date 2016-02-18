<?php

class Pdoconnect{
    private $host='tviw6wn55xwxejwj.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    private $dbname='siviletesda0ijjt';
    private $username='jqtgwvqg6i63oquv';
    private $password='dbvhoq9nbjf9jnvz';
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
     //$bdd=new PDO("mysql:dbname=siviletesda0ijjt;host=tviw6wn55xwxejwj.cbetxkdyhwsb.us-east-1.rds.amazonaws.com","jqtgwvqg6i63oquv","dbvhoq9nbjf9jnvz");
     $bdd=new PDO("mysql:host=localhost;dbname=timetable","yenteck","beboila");
}catch(Exception $e){
    die("erreur ".$e->getMessage());
}




