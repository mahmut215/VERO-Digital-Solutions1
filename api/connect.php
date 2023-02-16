<?php
include 'api_class.php';

$api = new api_class();

$api->token = $api->get_api_token();

//echo $api->token . "<br>";

$json1 = $api->get_datas($api->token);