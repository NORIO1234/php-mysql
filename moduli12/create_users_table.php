<?php
// Run once to create users table and test user
require 'config.php';

$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

try {
    $pdo->exec($sql);
    
    // Insert test user (plain 'password123' hashed)
    $test_email = 'test@example.com';
    $test_pass = password_hash('password123', PASSWORD_DEFAULT);
    $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$test_email]);
    
    if (!$check->fetch()) {
        $insert = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $insert->execute([$test_email, $test_pass]);
        echo "<div class='alert alert-success'>Users table created and test user added!</div>";
    } else {
        echo "<div class='alert alert-info'>Users table and test user already exist.</div>";
    }
    
    echo "<div class='alert alert-primary'>Test login: <strong>test@example.com</strong> / <strong>password123</strong></div>";
    echo "<p><a href='signin.php' class='btn btn-primary'>Go to Sign In</a> | <a href='dashboard.php' class='btn btn-secondary'>Dashboard (if logged)</a></p>";
    
} catch (PDOException $e) {
    echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
</body>
</html>

