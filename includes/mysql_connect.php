<?php

$server ='localhost';
$username = 'root';
$password = 'ezxVt7yo56xzE&';
$database = 'hunt_market_db';

$mysql = mysqli_connect($server, $username, $password, $database);
if(!$mysql){
  die('Error'. mysqli_connect_error() );
}