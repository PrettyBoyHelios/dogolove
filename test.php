<?php
    include ("db.php");
    include ("console.php");
    $user = getUserInfo(3);
    print_r($user);
    debug_to_console($user);
