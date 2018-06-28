<?php

    // --here we are looking if the key 'submit' within the POST variable exists in the array

    if (array_key_exists("submit", $_POST)) {

     //   print_r($_POST);


     // -- connecting to a database

        $link = mysqli_connect("127.0.0.1:3306", "root", "root");

        if (mysqli_connect_error()) {

            die ("Database connection error");

        }


     // --let's do some validation

        $error = "";

     // --if the user hasn't entered an email address or password we'll append the error message to the message below

        if (!$_POST['email']) {

            $error .= "An email address is required!<br>";

        }


        if (!$_POST['password']) {

            $error .= "A password is required!<br>";

        }

        if ($error != "") {

            $error = "<p>There were error(s) in your form:</p>".$error;

        } else {


            $query = "SELECT id FROM sys.secretdi WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

            $result = mysqli_query($link, $query);

            if (mysqli_num_rows($result) > 0 ) {


                $error = "That email address has already been taken.";


            } else {

                $query = "INSERT INTO sys.secretdi ('email', 'password') 
                          VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."',
                                  '".mysqli_real_escape_string($link, $_POST['password'])."')";

                if (!mysqli_query($link, $query)) {



                    $error = "<p>Could not sign you up, please try again later.</p>";


                } else {

                    echo "Sign up succesful";

                }

            }


        }


    }


?>


<div id="error"><?php echo $error; ?></div>



<form method="post">

    <input type="email" name="email" placeholder="Your email">

    <input type="password" name="password" placeholder="Your password">

    <input type="checkbox" name="stayLoggedIn" value=1>

    <input type="submit" name="submit" value="Sign up!">

</form>