<?php


    session_start();

    // -- session lets the user remain loggded in (or live) while browsing the page, even if he reloads it -- //

    // $_SESSION['username'] = "luciaribac"; //

    // echo $_SESSION['username']; //

    if ($_SESSION['email']) {

        echo "You are logged in!";

    } else {

        header("Location: signupform.php");

    }


?>