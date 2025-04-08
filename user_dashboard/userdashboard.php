user dashboard



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff; /* White background */
            color: #000; /* Black text color */
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: #4d328c; /* Dark purple */
            color: white;
            width: 250px;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
            transition: all 0.3s;
        }

        .sidebar.collapsed {
            width: 0;
            overflow: hidden;
            padding: 0;
        }

        .sidebar .profile-info {
            text-align: center;
            padding: 15px;
        }

        .profile-info img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .sidebar-nav .nav-link {
            color: white;
            padding: 12px;
            font-size: 1.1rem;
            display: block;
            transition: 0.3s;
        }

        .sidebar-nav .nav-link:hover {
            background-color:rgb(159, 156, 169);
        }

        .sidebar-nav .nav-link.text-danger:hover {
            background-color: rgb(159, 156, 169);;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        /* Adjust main content when sidebar is collapsed */
        .main-content.expanded {
            margin-left: 0;
        }

        /* Toggle Button */
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
        }

        @media (max-width: 768px) {
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
        .sidebar .profile-img img{
            width: 50%;
            height: 50%;
            border: 5px solid #333;
            border-radius: 50%;
            box-shadow: 6px 7px 9px 5px #5f5e5c73;
            margin-bottom: 10px;
            margin-left: 60px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="profile-img">
            <img src="user1.jpg" alt="Profile Picture">
            <h5 style="text-align: center">Welcome, John Doe</h5>
        </div>
        <h2><nav class="sidebar-nav">
            <a href="../borrow_book.php" class="nav-link" onclick="showSection('browse-books')"> Browse Books</a>
            <a href="notifications.php" class="nav-link" onclick="showSection('notifications')"> Notifications</a>
            <a href="pay_fines.php" class="nav-link" onclick="showSection('pay-fines')"> Pay Fines</a>
            <a href="setting.php" class="nav-link" onclick="showSection('settings-profile')"> Settings & Profile</a>
            <a href="issuebook.php" class="nav-link" onclick="showSection('issue_book')">Issue Book</a>
            <a href="../index.php" class="nav-link text-white" onclick="logout()"> Logout</a>
        </nav></h2>
    </div>

    <!-- Toggle Button -->
    <button class="toggle-btn" onclick="toggleSidebar()"> Menu</button>

    <!-- Main Content -->
    <div class="main-content" id="main-content">
        <h2> User Dashboard</h2>
        
        <!-- Quick Overview -->
        <div class="p-3 border rounded bg-secondary">
            <p> Total Books Borrowed: <strong>5</strong></p>
            <p> Pending Reservations: <strong>2</strong></p>
            <p> Overdue Books: <strong>1</strong></p>
            <p> Fines: <strong>₹500</strong></p>
        </div>

        <!-- Content Sections -->
        <div id="browse-books" class="section active">
            <h3>Browse Books</h3>
            <p>Explore our vast collection of books.</p>
        </div>

        <div id="notifications" class="section">
            <h3>Notifications</h3>
            <p>Check your latest notifications.</p>
        </div>

        <div id="pay-fines" class="section">
            <h3>Pay Fines</h3>
            <p>Pay your overdue fines online.</p>
        </div>

        <div id="settings-profile" class="section">
            <h3>Settings & Profile</h3>
            <p>Update your profile and settings.</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            let sidebar = document.getElementById("sidebar");
            let mainContent = document.getElementById("main-content");

            if (sidebar.classList.contains("open")) {
                sidebar.classList.remove("open");
                mainContent.classList.remove("expanded");
            } else {
                sidebar.classList.add("open");
                mainContent.classList.add("expanded");
            }
        }

        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => section.style.display = 'none');
            document.getElementById(sectionId).style.display = 'block';
        }

        function logout() {
            alert("Logging out...");
        }
    </script>
</body>
</html>
