<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Fine - Library Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        label.error {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <script>
        $(document).ready(function() {
            // Add custom rule for alphanumeric validation
            $.validator.addMethod("alphanumeric", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
            }, "User ID must contain only alphanumeric characters.");

            // Form validation rules
            $("#fineForm").validate({
                rules: {
                    userId: {
                        required: true,
                        minlength: 5,
                        maxlength: 15,
                        alphanumeric: true
                    },
                    paymentAmount: {
                        required: true,
                        min: 0.01
                    }
                },
                messages: {
                    userId: {
                        required: "User ID is required.",
                        minlength: "User ID must be at least 5 characters long.",
                        maxlength: "User ID cannot exceed 15 characters.",
                    },
                    paymentAmount: {
                        required: "Please enter a payment amount.",
                        min: "Payment amount must be greater than 0."
                    }
                }
            });
        });
    </script>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Pay Fine</h1>
        <div class="card mt-4 p-4">
            <form id="fineForm" action="process_payment.php" method="POST">
                <div class="form-group">
                    <label for="userId">User ID</label>
                    <input type="text" id="userId" name="userId" class="form-control" placeholder="Enter your User ID">
                </div>

                <div class="form-group mt-3">
                    <label for="fineAmount">Pending Fine Amount (in $)</label>
                    <input type="number" id="fineAmount" name="fineAmount" class="form-control" value="0.00" disabled>
                </div>

                <div class="form-group mt-3">
                    <label for="paymentAmount">Payment Amount</label>
                    <input type="number" id="paymentAmount" name="paymentAmount" class="form-control" placeholder="Enter payment amount" min="0.01" step="0.01">
                </div>

                <button type="submit" class="btn btn-primary mt-4 w-100">Pay Fine</button>
            </form>
        </div>
    </div>
    <!-- Back Button -->
    <div class="container py-3 text-start">
            <a href="../user_dashboard/userdashboard.php" class="btn btn-secondary">
                <i class="fa-solid fa-backward"></i> <strong>Back</strong>
            </a>
        </div>

</body>

</html>