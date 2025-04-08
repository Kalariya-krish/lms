<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #2c3e50;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .form-container {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 80px;
        }
        .toggle-link {
            cursor: pointer;
            color: #007bff;
        }
        .toggle-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Library System</a>
        </div>
    </nav>

    <!-- Login & Registration Forms -->
    <div class="container d-flex justify-content-center">
        <div class="form-container">
            
            <!-- Login Form -->
            <div id="loginForm">
                <h3 class="text-center">Login</h3>
                <form>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="text-center mt-3">Don't have an account? <span class="toggle-link" onclick="toggleForms()">Register here</span></p>
            </div>

            <!-- Registration Form (Hidden by Default) -->
            <div id="registerForm" style="display: none;">
                <h3 class="text-center">Register</h3>
                <form>
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name">
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter password">
                    </div>
                    <div class="mb-3">
                        <label>enrollment number </label>
                        <input type="enrollment number" class="form-control" placeholder="Enter enrollemnt number">
                    </div>
                    <div class="mb-3">
                        <label>Role</label>
                        <select class="form-control">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Register</button>
                </form>
                <p class="text-center mt-3">Already have an account? <span class="toggle-link" onclick="toggleForms()">Login here</span></p>
            </div>

        </div>
    </div>

    <!-- JavaScript for Form Toggle -->
    <script>
        function toggleForms() {
            let loginForm = document.getElementById("loginForm");
            let registerForm = document.getElementById("registerForm");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                registerForm.style.display = "block";
            }
        }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
