<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrowed Books Information</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            background-color: #6a1b9a;
            color: #ffffff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table th {
            background-color: rgb(2, 5, 9);
            color: white;
            white-space: nowrap;
        }

        .due-date {
            color: red;
            font-weight: bold;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
                padding: 10px;
            }

            th,
            td {
                padding: 10px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Borrowed Books Information</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Borrow Date</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>The Great Gatsby</td>
                        <td>F. Scott Fitzgerald</td>
                        <td>Fiction</td>
                        <td>01-Feb-2025</td>
                        <td class="due-date">15-Feb-2025</td>
                    </tr>
                    <tr>
                        <td>1984</td>
                        <td>George Orwell</td>
                        <td>Dystopian</td>
                        <td>05-Feb-2025</td>
                        <td class="due-date">20-Feb-2025</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Responsive Back Button -->
        <div class="row mt-3">
            <div class="col-3 col-md-auto">
                <a href="../user_dashboard/userdashboard.php" class="btn btn-secondary w-100">
                    <i class="fa-solid fa-backward"></i> <strong>Back</strong>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
