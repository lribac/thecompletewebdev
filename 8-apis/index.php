<?php

$weather = "";
$error = "";

if ($_GET['city']) {

    $urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($_GET['city']) . "&appid=2face0e175a3cc251a56eb3dab56389b");


    // we need to build a function to process the json format ^ into php

    // so we are getting the json code and convert it into an array called weatherArray

    // we add the 'true' to get the data into an associative array so we could extract it later from there


    $weatherArray = json_decode($urlContents, true);

    if ($weatherArray['cod'] == 200) {

        $weather = "The weather in " . $_GET['city'] . " is currently '" . $weatherArray['weather'][0]['description'] . "'. ";

        // let's add more information like for example the temp. It comes in Kelvin so we convert it in Celcius by subtrackting 273

        $tempInCelcius = intval($weatherArray['main']['temp'] - 273);

        // let's append that to weather text

        $weather .= "The temperature is " . $tempInCelcius . "&deg;C and the wind speed is " . $weatherArray['wind']['speed'] . " m/s.";


    } else {

        $error = "Could not find the city - please try again";

    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Weather Scraper</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css"
          integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

    <style type="text/css">

        html {
            background: url(background.jpeg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        body {

            background: none;

        }

        .container {

            text-align: center;
            margin-top: 100px;
            width: 450px;

        }

        input {

            margin: 20px 0;

        }

        #weather {

            margin-top: 15px;

        }

    </style>

</head>
<body>

<div class="container">

    <h1>What's The Weather?</h1>


    <form>
        <fieldset class="form-group">
            <label for="city">Enter the name of a city.</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value="<?php

            if (array_key_exists('city', $_GET)) {
                echo $_GET['city'];
            }

            ?>">
        </fieldset>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="weather"><?php

        if ($weather) {

            echo '<div class="alert alert-success" role="alert">
  ' . $weather . '
</div>';

        } else if ($error) {

            echo '<div class="alert alert-danger" role="alert">
  ' . $error . '
</div>';

        }

        ?></div>
</div>

<!-- jQuery first, then Bootstrap JS. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"
        integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>
</body>
</html>