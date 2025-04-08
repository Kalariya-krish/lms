<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Navbar - Online Library</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        /* Header Styling */
        .header {
            background-color: #7d01a3;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .header-left img {
            width: 150px;
        }

        .header-center {
            text-align: center;
            flex: 1;
        }

        .header-right a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px;
        }

        .header-right a:hover {
            text-decoration: underline;
        }

        /* Search Bar */
        .search-bar {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .search-bar input {
            width: 60%;
            padding: 8px;
            border: 1px solid #e079ff;
            border-radius: 5px 0 0 5px;
        }

        .search-bar button {
            padding: 8px 15px;
            background-color: #e079ff;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #4d328c;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #e18afc;
        }

        .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: black;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                text-align: center;
                flex-direction: column;
            }

            .header-left,
            .header-right {
                margin-top: 10px;
            }

            .search-bar input {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <img src="assets/images/logo2.jpg" alt="Library Logo">
        </div>
        <div class="header-center">
            <h1>Welcome to Our Library</h1>
            <p>Discover a world of knowledge</p>
            <div class="search-bar">
                <input type="text" placeholder="Search books, authors...">
                <button>Search</button>
            </div>
        </div>
        <div class="header-right">
            <a href="login.php">Login</a> / <a href="register.php">Register</a>
        </div>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <!-- <div class="container"> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="aboutUs.php">About Us</a></li>
                <li class="nav-item"><a class="nav-link" href="borrow_book.php">Borrow Book</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
            </ul>
        </div>
        </div>
    </nav>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>