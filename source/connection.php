<?php
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: *');
  header('Access-Control-Allow-Headers: *');
    $host="localhost";
    $root="root";
    $password="";
    $db_name="database";

    $conn = mysqli_connect($host,$root,$password,$db_name);
    if(!$conn){
        echo "Connection Failed";
    }

?>