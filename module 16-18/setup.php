<?php

$host = "localhost";
$db = "movie";
$user = "root";
$pass = "";

try {
    // First connect without database to create the database
    $conn = new PDO("mysql:host=$host", $user, $pass);
    $conn->exec("CREATE DATABASE IF NOT EXISTS movie");
    echo "Database 'movie' created<br>";
    
    // Now connect to the database
    $connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
    echo "Connected to database<br>";
    
    // Create users table
    $connection->exec("CREATE TABLE IF NOT EXISTS users (
        id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        surname VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        confirmpassword VARCHAR(255) NOT NULL
    )");
    echo "Users table created<br>";
    
    // Insert users data
    $stmt = $connection->prepare("INSERT INTO users (name, surname, username, email, password, confirmpassword) VALUES (?, ?, ?, ?, ?, ?)");
    
    $stmt->execute(['Elma', 'Kutllovci', 'Elma123', 'elma@gmail.com', 'elma1234', 'elma1234']);
    echo "Added Elma Kutllovci<br>";
    
    $stmt->execute(['Ilma', 'Terstena', 'Ilma123', 'Ilma@gmail.com', 'ilma1234', 'ilma1234']);
    echo "Added Ilma Terstena<br>";
    
    echo "<br><b>Done! Now go to <a href='dashboard.php'>dashboard.php</a></b>";
    
} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
