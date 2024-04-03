<?php
include_once("includes/mysql_connect.php");
$config = json_decode(file_get_contents("./config.json"), true);

$api_key = $config["api_key"];
$secret_key = $config["secret_key"];
$parameters = $_GET;
$hmac = $parameters["hmac"];
$shop_url = $parameters["shop"];

$parameters = array_diff_key($parameters, array('hmac' => ''));
ksort($parameters);

$new_hmac = hash_hmac('sha256', http_build_query($parameters), $secret_key);

if(hash_equals($hmac,$new_hmac)){
  echo 'this is coming from shopify and it\s legit';
  $access_token_endpoint = "https://" . $shop_url . "/admin/oauth/access_token";
  $var = array(
    "client_id" => $api_key,
    "client_secret" => $secret_key,
    "code" => $parameters['code']
  );
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $access_token_endpoint);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch, CURLOPT_POST,count($var));
  curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($var));
  $response = curl_exec($ch);
  curl_close($ch);

  $response = json_decode($response,true);

  echo print_r($response);

  $query = "INSERT INTO shops (shop_url, access_token, install_date) VALUES ('" . $shop_url . "','" . $response['access_token'] . "',NOW()) ON DUPLICATE KEY UPDATE access_token='" . $response['access_token'] . "'";

  if($mysql->query($query)){
    echo "<script>top.window.location = 'https://" . $shop_url .  "/admin/apps'</script>";
    die;
  }

}else{
  echo 'this is not legit';
}
