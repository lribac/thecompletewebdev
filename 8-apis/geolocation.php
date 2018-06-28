<?php

echo file_get_contents
("https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyBojBnXVulRAKt680tKRBQ8vtgmkzSSAlY");

?>


<html>

    <head>
        <title>Geocoding an address</title>
    </head>

    <body>



    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript">

        $.ajax({

            url: "https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyBojBnXVulRAKt680tKRBQ8vtgmkzSSAlY",

            type: "GET",

            success: function (data) {

                // console.log(data);
                // now  to inspect page and you will have an object with all the json information stored

                // if we want to loop through the results part of the data, we'll use the 'each' function
                $.each(data['results'][0]["address_components"], function(key, value) {

                    if(value["types"][0] == "country") {

                        alert(value["short_name"]);

                    }

                })


            }

        })

    </script>

</html>

