<?php
session_start();
require 'config.php';

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit;
}

// Logout handler
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: signin.php');
    exit;
}

// Fetch user info (optional)
$stmt = $pdo->prepare("SELECT email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h3>Welcome, <?= htmlspecialchars($user['email'] ?? 'User') ?>!</h3>
          </div>
          <div class="card-body">
            <p>You have successfully signed in.</p>
            <form method="post" class="mt-3">
              <button type="submit" name="logout" class="btn btn-danger">Logout</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

