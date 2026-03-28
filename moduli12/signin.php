<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body>
  

<div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="dropdown-menu p-4" style="border: 1px solid #dee2e6; border-radius: 0.375rem;">
            <form>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="email@example.com">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
              <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">
                  Remember me
                </label>
              </div>
              <button type="submit" class="btn btn-primary w-100">Sign in</button>
            </form>
            <hr class="dropdown-divider">
            <a href="signup.php" class="dropdown-item py-2">New around here? Sign up</a>
            <a href="#" class="dropdown-item py-2">Forgot password?</a>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>