<?php

    $link = mysqli_connect("127.0.0.1:3306", "root", "root");

    if (mysqli_connect_error()) {

        die ("There was an error connecting to the database");


    }



    $query = "SELECT * FROM sys.users WHERE email LIKE '%p%'";

    if ($result = mysqli_query($link, $query)) {

        while ($row = mysqli_fetch_array($result)) {

            print_r($row);

        }
    }




?>