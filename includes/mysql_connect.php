<?php
$config = json_decode(file_get_contents("./config.json"), true);

$server ='localhost';
$username = 'root';
$password = $config['db_password'];
$database = 'hunt_market_db';

$mysql = mysqli_connect($server, $username, $password, $database);
if(!$mysql){
  die('Error'. mysqli_connect_error() );
}

?>