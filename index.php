<?php

    session_start();
    require_once "inc/app.php";
    require_once "model/PDO/pdoconnect.php";

    //error_reporting(E_ALL);

    header('Access-Control-Allow-Origin: *');
    // traitement des requettes qui ont pas besoin de securité

    if (isset($_GET['section']) and $_GET['section']=='api')
    {

        include_once('controller/'.$_GET['section'].'/'.$_GET['action'].'.php');
        exit;
    }
    // la connection
    $isconnected=isConnected();

    // si pas logés

    if(!$isconnected){

        include_once "controller/Auth/login.php";

    }else{

        if (!isset($_GET['section']))
        {

            include_once('controller/index.php');

        }else{


                $section = $_GET['section'];

                if(isset($_GET['action'])){

                    $action = $_GET['action'].'.php';

                    if(isset($_GET['id']))
                        $id=(int) $_GET['id'];

                }else{
                    $action='index.php';
                }


                if(file_exists("controller/$section/$action")){

                    include_once("controller/$section/$action");
                }





        }
            // code a refractorer





    }




?>