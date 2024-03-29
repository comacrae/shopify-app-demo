<?php

$config = json_decode(file_get_contents("./config.json"), true);

$api_key = $config["api_key"];
$secret_key = $config["secret_key"];
$parameters = $_GET;
$hmac = $parameters["hmac"];

$parameters = array_diff_key($parameters, array('hmac' => ''));
ksort($parameters);

echo print_r($parameters);