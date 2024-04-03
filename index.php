<?php
include_once("includes/mysql_connect.php");
include_once("includes/shopify.php");

$shopify = new Shopify();
$parameters = $_GET;
// Use Query and SELECT statement to get the shop information
$query = "SELECT * FROM shops WHERE shop_url='" . $parameters['shop'] . "' LIMIT 1" ;
$result = $mysql ->query($query);

//Check if the number of rows < 1. If so, then we need to redirect the merchant to the installation page
//Otherwise, use fetch assoc function to get records
if ($result -> num_rows < 1){
  header("Location: install.php?shop=" . $_GET['shop']);
  exit();
}

$store_data = $result-> fetch_assoc();

$shopify->set_url($parameters['shop']);
$shopify->set_access_token($store_data['access_token']);

echo $shopify->get_url();
echo '<br />';
echo $shopify->get_access_token();

$products = $shopify -> rest_api("/admin/api/2021-04/products.json",array(),"GET");





