<?php
$host = 'localhost';
$db = 'movie';
$username = 'root';
$password = '';


try{
    $connect = new PDO("mysql:host=$host; dbname=$db", $username, $password);

    echo "Successful";


}
catch(Exception $e){
    echo "Something went wrong";
}


?>