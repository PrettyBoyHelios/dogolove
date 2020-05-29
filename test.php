<?php
    include ("db.php");
    include ("console.php");
    $user = getUserInfo(3);
    print_r($user);
    $user->username = 'Jorge';
    updateUserInfo($user);
