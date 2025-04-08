<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Library</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js for Reports -->

    <style>
        /* General Styles */
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #4d328c;
            color: white;
            width: 250px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
            transition: all 0.3s;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar .profile-info {
            text-align: center;
            padding: 15px;
        }

        /* .sidebar .profile-info img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid white;
        } */
        .sidebar .profile-img img{
            width: 50%;
            height: 50%;
            border: 5px solid #333;
            border-radius: 50%;
            box-shadow: 6px 7px 9px 5px #5f5e5c73;
            margin-bottom: 10px;
            margin-left: 60px;
        }

        .sidebar .nav-link {
            color: white;
            padding: 12px;
            display: block;
            transition: 0.3s;
            text-decoration: none;
        }

        .sidebar .nav-link:hover {
            background-color: #4e4376;
        }

        .sidebar .nav-link.text-danger:hover {
            background-color:rgb(236, 225, 226);
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        /* Sidebar Toggle Button */
        .toggle-btn {
            background-color: #4d328c;
            color: white;
            padding: 10px;
            cursor: pointer;
            position: fixed;
            top: 10px;
            left: 10px;
            border-radius: 5px;
            display: none;
            z-index: 1100;
            border: none;
        }

        /* Responsive Sidebar */
        @media (max-width: 992px) {
            .sidebar {
                position: fixed;
                left: -260px;
                transition: left 0.3s;
            }

            .sidebar.open {
                left: 0;
            }

            .toggle-btn {
                display: block;
            }

            .main-content {
                margin-left: 0;
            }
        }

        /* Responsive Cards */
        .card {
            text-align: center;
        }

        /* Responsive Chart */
        .chart-container {
            position: relative;
            height: 300px;
        }
       
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="profile-img">
            <img src="avtar.jpg" alt="Admin Profile">
        </div>
        <h5 style="text-align:center">Welcome, Admin</h5>
        <nav class="nav flex-column">
            <a href="../../admin_dashboard/pages/book_management.php" class="nav-link">Book Management</a>
            <a href="../../admin_dashboard/pages/user_management.php" class="nav-link"> User Management</a>
            <a href="../../admin_dashboard/pages/borrowing.php" class="nav-link"> Borrowing & Reservation</a>
            <a href="../../admin_dashboard/pages/pay_fines.php" class="nav-link"> Fine Management</a>
            <a href="../../admin_dashboard/pages/contact_message.php" class="nav-link">User Contact Message</a>
            <a href="../../admin_dashboard/pages/setting.php" class="nav-link"> Settings & Configuration</a>
            <a href="../../admin_dashboard/pages/security.php" class="nav-link">Security & Access Control</a>
            <a href="../../index.php" class="nav-link text-white" onclick="logout()"> Logout</a>
        </nav>
    </div>

    <!-- Toggle Button -->
    <button class="toggle-btn btn" onclick="toggleSidebar()">☰ Menu</button>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container mt-4">
            <h1> Admin Dashboard</h1>
            <p>Welcome to the library management system.</p>

            <div class="row g-3">
                <!-- Total Users -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Total Users</h5>
                            <p class="card-text fs-3" id="totalUsers">Loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Active Users -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Active Users</h5>
                            <p class="card-text fs-3" id="activeUsers">Loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Books Borrowed -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Books Borrowed</h5>
                            <p class="card-text fs-3" id="booksBorrowed">Loading...</p>
                        </div>
                    </div>
                </div>

                <!-- Fines Collected -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Fines Collected</h5>
                            <p class="card-text fs-3" id="finesCollected">Loading...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Activity Chart -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">📈 User Activity (Last 7 Days)</h5>
                    <div class="chart-container">
                        <canvas id="userActivityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("open");
        }

        function logout() {
            alert("Logging out...");
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Simulated data
            document.getElementById("totalUsers").innerText = "320";
            document.getElementById("activeUsers").innerText = "215";
            document.getElementById("booksBorrowed").innerText = "127";
            document.getElementById("finesCollected").innerText = "$540";
        })
            // Chart Data
            // const ctx = document.getElementById("userActivityChart").getContext("2d");
            // new Chart(ctx, {
            //     type: "line",
            //     data: {
            //         labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            //         datasets: [{
            //             label: "Active Users",
            //             data: [30, 45, 50, 40, 60, 75, 80],
            //             borderColor: "#007bff",
            //             backgroundColor: "rgba(0, 123, 255, 0.2)",
            //             borderWidth: 2
            //         }]
            //     },
            //     options: {
            //         responsive: true,
            //         maintainAspectRatio: false
            //     }
        //     });
        // });
    </script>

</body>
</html>
