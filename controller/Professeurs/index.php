<?php

include_once "model/Professeurs/index.php";

$allProfesseurs=getAllProfesseurs();

$page_title="Professeurs ";

include "views/Professeurs/index.php";