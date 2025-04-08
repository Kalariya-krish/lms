<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RKU Library Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f3e5f5; /* Light purple background */
    }
    .login-container {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .btn {
      background-color: #6a1b9a;
      border-color: #6a1b9a;
    }
    .btn:hover {
      background-color: #4a148c;
      border-color: #4a148c;
    }
    h3 {
      color: #6a1b9a;
    }
    .text-decoration-none {
      color: purple;
    }
    .text-decoration-none:hover {
      color: #4a148c;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
      <h3 class="text-center mb-3">Login</h3>
      <form action="#" method="POST">
        <div class="mb-3">
          <label for="libraryDropdown" class="form-label">Select Library</label>
          <select id="libraryDropdown" name="library" class="form-select">
            <option value="Engineering & Diploma Library">Engineering & Diploma Library</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Student Barcode No.</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your library barcode no." required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
      <div class="text-center mt-3">
        <a href="#" class="text-decoration-none">Forgot your password?</a>
      </div>
      <div class="text-center mt-2">
        <p>Don't have an account? <a href="register.html" class="text-decoration-none">Register</a></p>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
