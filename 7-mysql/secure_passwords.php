<?php


    // creating hashes to store the users' passwords securely   =>   check it at crackstation.net

    // $salt = "nslfe4353*353n6";


    // creating a even more secure hash storage using the id number

    $row['id'] = 75;


    echo md5(md5($row['id'])."password");


?>