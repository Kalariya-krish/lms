<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Online Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .team-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .section-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card {
            border: none;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>

<body>
<?php include 'component/header.php'; ?>

    <!-- Header -->
    <div class="container text-center mt-5">
        <h1 class="fw-bold"> About Us</h1>
        <p class="text-muted">Learn more about our mission, vision, and team behind the Online Library Management System.</p>
    </div>

    <!-- Mission & Vision Section -->
    <div class="container mt-5">
        <div class="row text-center">
            <div class="col-md-6">
                <h3 class="section-title"><i class="fa-solid fa-bullseye me-2" ></i> Our Mission</h3>
                <p>Our mission is to provide an innovative and user-friendly library experience that meets the needs of our diverse community. We strive to:

                    Offer a wide range of books, digital resources, and multimedia materials.

                    Enhance the accessibility of knowledge through cutting-edge technology and user-focused services.

                    Create a welcoming and inclusive space for learning, research, and cultural enrichment.

                    Support the personal and professional growth of our users by offering programs, workshops, and events that inspire and educate.</p>
            </div>
            <div class="col-md-6">
                <h3 class="section-title"><i class="fa-solid fa-eye me-2" ></i> Our Vision</h3>
                <p>At Our Lib Central Library, our vision is to become a leading digital and physical hub of knowledge and learning, accessible to everyone, everywhere. We aim to empower our community by providing a rich and diverse collection of resources, fostering an environment of intellectual curiosity, and promoting lifelong learning.</p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="container mt-5">
        <h3 class="section-title text-center"> Meet Our Team</h3>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card p-3">
                    <img src="https://via.placeholder.com/100" class="team-img mx-auto" alt="Team Member">
                    <h5 class="mt-3">Disha Rudakiya</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <img src="https://via.placeholder.com/100" class="team-img mx-auto" alt="Team Member">
                    <h5 class="mt-3">Mahek Kariyani</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <img src="https://via.placeholder.com/100" class="team-img mx-auto" alt="Team Member">
                    <h5 class="mt-3">Prarthana </h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container mt-5 text-center">
        <h3 class="section-title"> Contact Us</h3>
        <p><i class="fa-solid fa-location-dot me-2"></i> Location: Rajkot, India</p>
        <p><i class="fa-solid fa-envelope me-2"></i>Email: libcentral@onlinelibrary.com</p>
        <p><i class="fa-solid fa-phone me-2" ></i> Phone: +91 98765 43210</p>
    </div>

    <!-- Footer -->
     <div>
     <?php include 'component/footer.php'; ?>
     </div>
    
</body>

</html>