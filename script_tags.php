<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

$shopify = new Shopify();
$parameters = $_GET;

include_once("includes/check_token.php");

$script_tags = $shopify -> rest_api("/admin/api/2021-04/script_tags.json",array(), "GET");
$script_tags = json_decode($script_tags['body'], true);

echo print_r($script_tags);

?>