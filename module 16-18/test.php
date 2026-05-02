<?php
echo "<h1>Testing Database Connection</h1>";

$host = "localhost";
$db = "movie";
$user = "root";
$pass = "";

try {
    // Try without database first
    $conn = new PDO("mysql:host=$host", $user, $pass);
    echo "✓ Connected to MySQL server<br>";
    
    // Check if database exists
    $stmt = $conn->query("SHOW DATABASES");
    $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if (in_array($db, $databases)) {
        echo "✓ Database '$db' exists<br>";
        
        // Connect to the specific database
        $connection = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
        
        // Check if users table exists
        $stmt = $connection->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        echo "Tables in database: " . implode(", ", $tables) . "<br>";
        
        if (in_array("users", $tables)) {
            echo "✓ Users table exists<br>";
            
            // Try to get data
            $stmt = $connection->query("SELECT * FROM users");
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            echo "Number of users: " . count($users) . "<br>";
            
            foreach ($users as $row) {
                echo "- " . $row['name'] . " " . $row['surname'] . "<br>";
            }
            
        } else {
            echo "✗ Users table does NOT exist<br>";
        }
        
    } else {
        echo "✗ Database '$db' does NOT exist<br>";
        echo "Available databases: " . implode(", ", $databases) . "<br>";
    }
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage();
}
?>
