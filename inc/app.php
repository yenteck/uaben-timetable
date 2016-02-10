<?php

function isConnected(){
    if(isset($_SESSION['isconnected']) and !empty($_SESSION['pseudo'])){
        return true;
    }else return false;
}