<?php
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en"> <!-- Use the appropriate language code here -->

<head>
    <title>About Us - Elderly Chronic Disease Information System</title>
    <!-- Meta tag Keywords -->

    <!-- Add your meta tags, favicon, and other head content here -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <!-- Custom-Files -->

    <!-- Web-Fonts -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=cyrillic,latin-ext"
          rel="stylesheet">
    <!-- Web-Fonts -->

</head>

<body>
<?php include('includes/header.php'); ?>

<!-- banner 2 -->
<div class="inner-banner-w3ls">
    <div class="container">
        <!-- You can add content to the banner if needed -->
    </div>
</div>
<!-- //banner 2 -->

<!-- page details -->
<div class="breadcrumb-agile">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">About Us</li>
        </ol>
    </div>
</div>
<!-- //page details -->

<!-- about -->
<section class="about py-5">
    <div class="container py-xl-5 py-lg-3">
        <div class="w3ls-titles text-center mb-md-5 mb-4">
            <h3 class="title">About Elderly Chronic Disease Information System</h3>
            <span>
                <i class="fas fa-user-md"></i>
            </span>
        </div>
        <p class="aboutpara text-center mx-auto">
            Welcome to the Elderly Chronic Disease Information System! Our main objective is to provide valuable information,
            resources, and support to the elderly community and individuals living with chronic diseases. We understand
            the challenges that come with managing chronic health conditions and aging, and we are dedicated to offering
            comprehensive information to empower you and your loved ones.

            Our platform offers a wide range of educational content, from understanding different chronic diseases and
            their management strategies to lifestyle tips that can enhance overall well-being. We believe that knowledge
            is the key to better health, and we strive to make that knowledge accessible to all.

            Whether you're a senior citizen looking for advice on staying active and healthy in your golden years or
            someone managing a chronic condition, you'll find a wealth of information and resources tailored to your
            needs. Our team of medical experts and professionals curate and create content that is accurate, reliable,
            and up-to-date.

            We invite you to explore our website, browse through our articles, and take advantage of the information
            available here. Together, we can navigate the challenges of aging and chronic diseases and work towards a
            healthier and happier life.

            Thank you for choosing the Elderly Chronic Disease Information System. We're here for you every step of the way.
        </p>
    </div>
</section>

<!-- Mission, Vision, and Core Values Section -->
<section class="mission-vision-core p-5" style="background : rgba(0,0,0,0.1);">
    <div class="container ">
        <div class="row">
            <!-- Mission Card -->
            <div class="col-md-4 mb-4">
                <div class="card shadow " style=" background: rgba(255,0,0,0.3); ">
                    <div class="card-body">
                        <h4 class="card-title">Our Mission</h4>
                        <p class="card-text text-white">To provide comprehensive and reliable information, resources, and support
                            to the elderly community and individuals living with chronic diseases.</p>
                    </div>
                </div>
            </div>
            
            <!-- Vision Card -->
            <div class="col-md-4 mb-4">
                <div class="card" style=" background: rgba(255,0,0,0.3); ">
                    <div class="card-body">
                        <h4 class="card-title">Our Vision</h4>
                        <p class="card-text text-white">To create a world where seniors and individuals with chronic diseases
                            lead healthy, fulfilling, and empowered lives through accessible information and support.</p>
                    </div>
                </div>
            </div>
            
            <!-- Core Values Card -->
            <div class="col-md-4 mb-4">
                <div class="card" style=" background: rgba(255,0,0,0.3); ">
                    <div class="card-body">
                        <h4 class="card-title">Our Core Values</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3 text-white" ><i class="fas fa-check-circle"></i> Compassion </li>
                            <li class="mb-3 text-white"><i class="fas fa-check-circle"></i> Empowerment</li>
                            <li class="mb-3 text-white"><i class="fas fa-check-circle"></i> Collaboration </li>
                            <li class="text-white"><i class="fas fa-check-circle"></i> Integrity</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Mission, Vision, and Core Values Section -->


<!-- //about -->

<?php include('includes/footer.php'); ?>

<!-- Js files -->
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- Js files -->

</body>

</html>
