<?php
// Simple insert script - run this to add users

$host = "localhost";
$db = "movie";
$user = "root";
$pass = "";

try {
    $connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
    
    // First, delete existing users to start fresh
    $connection->exec("DELETE FROM users");
    echo "Cleared existing users<br>";
    
    // Insert Elma
    $stmt = $connection->prepare("INSERT INTO users (id, name, surname, username, email, password, confirmpassword) VALUES (1, 'Elma', 'Kutllovci', 'Elma123', 'elma@gmail.com', 'elma1234', 'elma1234')");
    $stmt->execute();
    echo "Inserted Elma Kutllovci<br>";
    
    // Insert Ilma
    $stmt = $connection->prepare("INSERT INTO users (id, name, surname, username, email, password, confirmpassword) VALUES (2, 'Ilma', 'Terstena', 'Ilma123', 'Ilma@gmail.com', 'ilma1234', 'ilma1234')");
    $stmt->execute();
    echo "Inserted Ilma Terstena<br>";
    
    echo "<br><b>Success! Now go to <a href='dashboard.php'>dashboard.php</a></b>";
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
