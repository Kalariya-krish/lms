<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overdue Books & Fine Management</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <!-- FontAwesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



    <style>
        body { background-color: #f8f9fa; }
        .container { 
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 20px;
        
        
        }
        .card { border-radius: 10px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); }
        .table-responsive { overflow-x: auto; }
        .status-paid { color: green; font-weight: bold; }
        .status-unpaid { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center  my-4" style="background-color:#7d01a3; padding: 10px;"> Overdue Books & Fine Management</h2>

    

        <!-- Overdue Books Table -->
        <div class="container">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Book Title</th>
                                <th>Due Date</th>
                                <th>Fine (₹)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rahul Shah</td>
                                <td>Atomic Habits</td>
                                <td>2024-02-05</td>
                                <td>₹500</td>
                                <td class="status-unpaid">Unpaid</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Priya Mehta</td>
                                <td>The Alchemist</td>
                                <td>2024-02-03</td>
                                <td>₹700</td>
                                <td class="status-paid">Paid</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Aman Patel</td>
                                <td>Rich Dad Poor Dad</td>
                                <td>2024-02-01</td>
                                <td>₹1,000</td>
                                <td class="status-unpaid">Unpaid</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Sneha Gupta</td>
                                <td>Think and Grow Rich</td>
                                <td>2024-01-28</td>
                                <td>₹800</td>
                                <td class="status-paid">Paid</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Vikas Kumar</td>
                                <td>Deep Work</td>
                                <td>2024-01-25</td>
                                <td>₹1,200</td>
                                <td class="status-unpaid">Unpaid</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="container py-3 text-start #">
        <a href="../../admin_dashboard/pages/admin_dashboard.php" class="btn btn-secondary ">
            <i class="fa-solid fa-backward me-2"></i><strong>Back</strong>
        </a>
    </div>


    </div>
    

   
</body>
</html>
