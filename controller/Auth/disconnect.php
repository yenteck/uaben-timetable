<?php
    unset($_SESSION['pseudo']);
    unset($_SESSION['isconnected']);

    header("location:/index");
