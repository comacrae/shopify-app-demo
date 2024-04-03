<?php
$_API_KEY = "6db78a9b1ce5b76780f737de0c2ac31f";
$_NGROK_URL = "https://e378-2601-240-cc02-bcb0-1da9-fa82-84a6-c472.ngrok-free.app";

$shop = $_GET['shop'];
$scopes = "read_products,write_products,read_orders,write_orders";
$redirect_uri = $_NGROK_URL . "/demo-app/shopify-app-demo/token.php";
$nonce = bin2hex(random_bytes(12));
$access_mode = 'per-user';
$oauth_url = "https://" . $shop . "/admin/oauth/authorize?client_id=" . $_API_KEY . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri) . "&state=" . $nonce . "&grant_options[]=" . $access_mode; 

header("Location: " . $oauth_url);
exit();
