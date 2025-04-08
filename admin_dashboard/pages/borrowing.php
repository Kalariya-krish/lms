<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Borrow Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- FontAwesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .table thead { background-color: #4d328c; color: white; }
        .queue-card { border-left: 5px solid #4d328c; padding: 10px; }
        .mt-5 { padding-bottom: 10px;
            margin-bottom: 50px;
        }
        .container.mt-4{
            padding-bottom: 5px;
            margin-bottom: 50px;

        }
    </style>
</head>
<body>

<div class="container mt-4 ">
    <div class ="container mt-4 bg-dark text-white">
    <h2 style ="text-align:center ">Borrow Requests</h2> </div> 
    <table class="table table-bordered">
        <thead>
            <tr><th>Book Title</th><th>User</th><th>Status</th><th>Action</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>Atomic Habits</td>
                <td>John Doe</td>
                <td><span class="badge bg-success">Auto-Approved</span></td>
                <td><button class="btn btn-secondary">View</button></td>
            </tr>
            <tr>
                <td>The Alchemist</td>
                <td>Jane Smith</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>
                    <button class="btn btn-success approve-btn">Approve</button>
                    <button class="btn btn-danger reject-btn">Reject</button>
                </td>
            </tr>
        </tbody>
    </table>

    <h2 class="mt-5  bg-dark text-white" style ="text-align:center"  > Reservation Queue</h2>
    <div class="queue-card">
        <p><strong>User:</strong> Michael Scott</p>
        <p><strong>Book:</strong> The Alchemist</p>
        <p><strong>Queue Position:</strong> 1️⃣</p>
        <button class="btn btn-primary notify-btn">Notify Next</button>
    </div>
</div>
<div class="container py-3 -center">
        <a href="../../admin_dashboard/pages/admin_dashboard.php" class="btn btn-secondary">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div> 

<script>
    document.querySelectorAll(".approve-btn").forEach(btn => {
        btn.addEventListener("click", () => alert("✅ Reservation Approved!"));
    });

    document.querySelectorAll(".reject-btn").forEach(btn => {
        btn.addEventListener("click", () => alert("❌ Reservation Rejected!"));
    });

    document.querySelector(".notify-btn").addEventListener("click", () => {
        alert("📢 User Notified: The book is now available.");
    });
</script>

</body>
</html>
