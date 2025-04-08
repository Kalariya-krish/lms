<?php
include 'includes/db_config.php';

$mission = '';
$vision = '';
$contact = '';
$team_members = [];

$sql = "SELECT * FROM about_us";
$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {
    if ($row['section'] == 'mission') {
        $mission = $row['content'];
    } elseif ($row['section'] == 'vision') {
        $vision = $row['content'];
    } elseif ($row['section'] == 'contact') {
        $contact = explode('|', $row['content']);
    } elseif ($row['section'] == 'team') {
        $team_members[] = [
            'name' => $row['team_name'],
            'image' => $row['team_image']
        ];
    }
}
?>


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
                <h3 class="section-title"><i class="fa-solid fa-bullseye me-2"></i> Our Mission</h3>
                <p><?php echo $mission; ?></p>
            </div>
            <div class="col-md-6">
                <h3 class="section-title"><i class="fa-solid fa-eye me-2"></i> Our Vision</h3>
                <p><?php echo $vision; ?></p>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <div class="container mt-5">
        <h3 class="section-title text-center"> Meet Our Team</h3>
        <div class="row text-center">
            <?php foreach ($team_members as $member): ?>
                <div class="col-md-4">
                    <div class="card p-3">
                        <img src="<?php echo $member['image']; ?>" class="team-img mx-auto" alt="Team Member">
                        <h5 class="mt-3"><?php echo $member['name']; ?></h5>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="container mt-5 text-center">
        <h3 class="section-title"> Contact Us</h3>
        <p><i class="fa-solid fa-location-dot me-2"></i> <?php echo $contact[0]; ?></p>
        <p><i class="fa-solid fa-envelope me-2"></i> <?php echo $contact[1]; ?></p>
        <p><i class="fa-solid fa-phone me-2"></i> <?php echo $contact[2]; ?></p>
    </div>

    <!-- Footer -->
    <div>
        <?php include 'component/footer.php'; ?>
    </div>

</body>

</html>