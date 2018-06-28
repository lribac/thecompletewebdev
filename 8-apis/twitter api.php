<?php

require "/Users/lucia/Downloads/twitteroauth-master/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

$consumerkey = "HMjbLM2ZfMEa6UwxI4fEZGL4z";
$consumersecret = "cSC7T89fj6A0o03ol9slOfZny5AZn2bk3Mzhuu12ReH96JbVkF";
$access_token = "968998980989472768-ovcEOLndoG2ZooXIJAegG6kIRkcmu1a";
$access_token_secret = "GO3lZZYwjokESULXE6gtg2qOmnxYftmyZHDmsurfwWcoK";


$connection = new TwitterOAuth($consumerkey, $consumersecret, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");



$statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

//print_r($content);

print_r($statuses);

?>