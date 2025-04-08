<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fine & Payment Management</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS */
    .card-body {
      padding: 20px;
    }
    .table th, .table td {
      vertical-align: middle;
    }
    .fine-status {
      font-weight: bold;
      color: red;
    }
    .paid-status {
      font-weight: bold;
      color: green;
    }
    .payment-btn {
      background-color: #28a745;
      color: white;
      border: none;
    }
    .payment-btn:hover {
      background-color: #218838;
    }
    .modal-content {
      border-radius: 10px;
    }
    /* Media queries for responsiveness */
    @media (max-width: 767px) {
      .table-responsive {
        overflow-x: auto;
      }
    }
  </style>
</head>
<body>

<div class="container my-5">
  <h2 class="text-center">Fine & Payment Management</h2>

  <!-- Fine Overview Section -->
  <div class="card">
    <div class="card-header">
      <h4>Pending Fines Overview</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>User Name</th>
              <th>Overdue Book(s)</th>
              <th>Total Fine</th>
              <th>Fine Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>Book 1, Book 2</td>
              <td>₹200</td>
              <td class="fine-status">Unpaid</td>
              <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentModal">Pay Now</button>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#reminderModal">Send Reminder</button>
              </td>
            </tr>
            <tr>
              <td>Jane Smith</td>
              <td>Book 3</td>
              <td>₹150</td>
              <td class="fine-status">Unpaid</td>
              <td>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paymentModal">Pay Now</button>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#reminderModal">Send Reminder</button>
              </td>
            </tr>
            <!-- Add more rows as needed -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Payment Modal -->
  <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="paymentModalLabel">Fine Payment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Please select a payment method to pay the fine.</p>
          <button class="payment-btn w-100">Pay with Razorpay</button>
          <button class="payment-btn w-100 mt-2">Pay with PayPal</button>
          <button class="payment-btn w-100 mt-2">Pay with Stripe</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Reminder Modal -->
  <div class="modal fade" id="reminderModal" tabindex="-1" aria-labelledby="reminderModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="reminderModalLabel">Send Reminder</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to send a reminder for overdue fines?</p>
          <button class="btn btn-primary w-100">Send Reminder</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
