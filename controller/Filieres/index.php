<?php

include_once "model/Filieres/index.php";

$allFilieres=getAll();

$page_title="Filieres";

include "views/Filieres/index.php";