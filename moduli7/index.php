<?php

$host = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host", $username, $password);

    echo "Connected successfully";
}
catch(Exception $e){
    echo("Not connected");


}
?>