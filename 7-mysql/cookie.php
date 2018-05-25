<?php

    // cookies are used to leave a user logged in for a day as in examnple below, even though he leaves the browser

    // setcookie("customerID", "1234", time() + 60 * 60 * 24 );



    // unset a cookie

       setcookie("customerID", "", time() - 60 * 60);


       // update the value of a cookie

       $_COOKIE["customerID"] = "test";

    echo $_COOKIE["customerID"];

?>