<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Library</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="assets/css/style.css"rel="stylesheet"> -->

    <!-- Custom CSS -->
    <style>
        /* General Body Styling */
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #4a4a4a;
        }

   
        /* Hero Section */
        .hero {
            text-align: center;
            padding: 100px 22px;
            background-image: url('assets/images/home_page1.jpg'); /* Replace with actual image */
            background-size: cover;
            background-position: center;
            color: #fff;
            position: relative;
            min-height: 60vh; /* 100% of viewport height */
        }
        \end{code}

        .hero h2 {
            font-size: 2rem;
            margin:0 0 30px;
        }

        .hero p {
            font-size: 1.2rem;
            margin:0 0 30px;
            margin-bottom: 60px;
        }

        .btn-explore {
            padding: 12px 20px;
            font-size: 18px;
            background-color : purple !important;
            color: white;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 40px;
        }

        .btn-explore:hover {
            background-color: #4a148c !important;
            
        }
        

        
        @media (max-width: 768px) {
    .hero {
        min-height: 70vh; 
    }
}

    
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .search-bar input {
                width: 80%;
            }

            .navbar-nav {
                text-align: center;
            }
        }
    </style>
</head>
<body>
<?php include 'component/header.php'; ?>
    


<!-- Hero Section -->
<section class="hero">
    <div class="container">
    <h1>Welcome to the world of knowledge...</h1>
    <h2>Your Gateway to Endless Knowledge</h2>
        <p>Explore our extensive collection of books, archives, and digital resources.</p>
        <a href="borrow_book.php" class=" btn-explore " >Explore Books</a>
        <!-- <p class=" mt-5 paregraph">
            The RKU Library has been a cornerstone of knowledge for our university since 2005. With a vast collection of resources 
            and a commitment to literacy and education, we strive to inspire lifelong learning and curiosity.
            Providing books for engineering, pharmacy, physiotherapy, and management studies.
        </p> -->
    </div>
</section>


<!-- Footer -->
<?php include 'component/footer.php'; ?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
