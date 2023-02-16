<?php
include 'api_class.php';

$api = new api_class();

$api->key = "gIaFiiLUxRMF8G8ldIlRxv3LJOcBhE6Ju0TeCcSDFzsgz2zNqugobqqjmW13pQoe2s1zwHhs8WcbXqLfSKwfe3J74x0r1wLhvkHmYfvPkdkiqbSOsDAgkNxJOpsIDFfcDCXUARNDODNZTXI1QaMWHwiG1CyjW7yaTDw5wgso3r4B4esByjgNDZMNy2qnXgu4Qe1PQl1jhcEgjs75zSf6bwI4uvzsTzQulIJGQzRCfJVNemazwBsT458tlD7f8OrT";
$api->url = "https://www.hardlinenutrition.com";
$api->username = "akademi";

$api->price = 1;
$api->product_id = 1 ;
$api->quantuty = 1 ;
$api->token = $api->get_api_token();

echo $api->token . "<br>";

//echo $api->card_add();
$api->card_add();
$api->user_info();
echo "https://www.hardlinenutrition.com/odeme-ve-teslimat?actoken=" . $api->token;