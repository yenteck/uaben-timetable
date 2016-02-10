<?php

include_once "model/Salles/index.php";

$allSalles=getAllSalles();

$page_title="Sales ";

include "views/Salles/index.php";