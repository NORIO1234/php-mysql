<?php
session_start();
require_once 'config.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields.';
    } else {
        try {
            $stmt = $pdo->prepare('SELECT id, password FROM users WHERE email = ?');
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                session_regenerate_id(true);
                if ($remember) {
                    setcookie('remember_user', $user['id'], time() + (86400 * 30), '/', '', false, true);
                }
                header('Location: dashboard.php');
                exit;
            } else {
                $error = 'Invalid email or password.';
            }
        } catch (PDOException $e) {
            $error = 'Login error. Try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In - Moduli12</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php if (isset($_SESSION['user_id'])): ?>
    <script>window.location = 'dashboard.php';</script>
  <?php endif; ?>

<?php include('header.php') ?>


  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body p-5">
            <?php if ($error): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <form method="post">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control <?= isset($error) ? 'is-invalid' : '' ?>" name="email" required placeholder="test@example.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control <?= isset($error) ? 'is-invalid' : '' ?>" name="password" required placeholder="password123">
              </div>
              <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
              </div>
              <button class="btn btn-primary w-100">Sign In</button>
            </form>
            <hr class="my-3">
            <div class="text-center">
              <a href="signup.php">Sign up</a> | <a href="#">Forgot password?</a>
            </div>
            <div class="mt-3 small text-muted">
              <a href="create_users_table.php">Setup DB (run once)</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <?php include('footer.php') ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

