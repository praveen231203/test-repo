<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["contact_submit"])) {
    
    // Debugging: Check if form data is received
    if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["subject"]) || !isset($_POST["message"])) {
        die("Error: Form data not received.");
    }

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'shubhamsrivastav861@gmail.com'; // Replace with your Gmail
        $mail->Password = 'kmns ifet bvjk dlrw';   // Replace with your Google App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($email, $name); // Sender
        $mail->addAddress('shubhamsrivastav8088@gmail.com'); // Your email to receive messages

        $mail->Subject = $subject;
        $mail->Body = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

        if ($mail->send()) {
            echo "<script>alert('Message sent successfully!');</script>";
        } else {
            echo "<script>alert('Email sending failed!');</script>";
        }
    } catch (Exception $e) {
        echo "<script>alert('Email could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
} else {
    echo "<script>alert('Invalid request! Please submit the form.');</script>";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Horizon</title>
     <!-- Font Awesome for Icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
     
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
                
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
         /* Header Section */
         .header-section {
            background: linear-gradient(45deg, #0d47a1, #424242, #000000);
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none; /* Remove underline */
            color: inherit; /* Inherit color from parent */
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
        }

        .logo img {
            height: 70px;
            border-radius: 50%;
        }

        .logo h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #fff;
        }

        .search-container {
            display: flex;
            align-items: center;
            position: relative;
            width: 350px;
        }

        .search-bar {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            background-color: #fff;
            transition: all 0.3s ease;
        }

        .search-bar:focus {
            border-color: #2C3E50;
            box-shadow: 0 0 8px rgba(44, 62, 80, 0.5);
        }

        .search-container .fa-search {
            position: absolute;
            right: 15px;
            color: #aaa;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .search-container .fa-search:hover {
            color: #2C3E50;
        }

        .icon-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .icon-container button {
            background-color: transparent;
            color: #fff;
            font-size: 16px;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .icon-container button:hover {
            color: #f39c12;
        }

        .icon-container .purchase-icon {
            font-size: 20px;
            background-color: #FF6F61;
            border-radius: 50%;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .icon-container .purchase-icon:hover {
            background-color: #e74c3c;
        }

      
        /* Navigation Bar */
        .navigation-bar {
            background: #f1f1f1;
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            gap: 20px;
            padding: 0;
            margin: 0;
        }

        .nav-menu li {
            position: relative;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            padding: 5px 10px;
            transition: color 0.3s ease;
        }

        .nav-menu a:hover {
            color: #2C3E50;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            display: block;
            padding: 5px 10px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

/* Carousel Customizations */
.carousel-inner img {
    max-height: 475px;
    object-fit: cover;
    width: 100%;
    border-radius: 8px;
    /* Add smooth transition for image change */
    transition: opacity 3s ease-in-out;
}

/* Caption Styling */
.carousel-caption {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 5px;
    color: #fff;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    bottom: 0;
    left: 0;
    right: 0;
    
}

.carousel-caption h4, .carousel-caption p {
    font-size: 40px !important;
}

/* Controls Styling */
.carousel-control {
    width: 5%;
}

.carousel-control:hover {
    background-color: rgba(0, 0, 0, 0.2);
}

/* Custom Indicators */
.carousel-indicators {
    bottom: -20px; /* Move indicators down */
}

.carousel-indicators li {
    background-color: #666;
    width: 15px;
    height: 15px;
    border-radius: 50%;
}

.carousel-indicators .active {
    background-color: #000;
    width: 18px;
    height: 18px;
    border-radius: 50%;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .carousel-inner img {
        max-height: 300px;
    }

    h2 {
        font-size: 2em;
    }
}

/* Footer-like adjustment for bottom spacing */
.spacer {
    height: 20px;
}
 /* Gallery Section */
 .gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding: 20px;
}

.gallery img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.gallery .col {
    flex: 1 1 calc(33.333% - 20px);
    max-width: calc(33.333% - 20px);
}

.gallery .col img {
    margin-bottom: 20px;
    transition: transform 0.3s;
}

.gallery .col img:hover {
    transform: scale(1.05);
}

/* Section Headings */
h2 {
    font-size: 36px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 30px;
    position: relative;
}

h2::before {
    content: "";
    position: absolute;
    width: 60px;
    height: 4px;
    background-color: #FF6F61;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Dark background for modal */
    backdrop-filter: blur(10px); /* Apply blur effect */
    -webkit-backdrop-filter: blur(10px); /* Fallback for Safari */
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-container {
    display: flex; 
    flex-direction: column;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.9);
    padding: 20px;
    border-radius: 10px;
    max-width: 80%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
    position: relative;
}

.modal img {
    max-width: 100%;
    max-height: 60vh;
    border-radius: 10px;
}

.modal-content {
    margin-top: 15px;
    text-align: center;
    width: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    padding: 10px;
    border-radius: 10px;
}

.modal-content h3 {
    font-size: 24px;
    color: #ffffff;
    margin-bottom: 10px;
}

.modal-content p {
    font-size: 16px;
    color: #ffffff;
    line-height: 1.6;
    margin-bottom: 20px;
}

.icons {
    display: flex;
    justify-content: center;
    gap: 15px;
    font-size: 30px;
    margin-top: 10px;
}

.icons i {
    cursor: pointer;
    color: #ccc;
    transition: color 0.3s;
}

.icons i:hover {
    color: #FF6F61;
}

.icons i.liked {
    color: #FF6F61;
}

/* Navigation Arrows */
.arrow-left, .arrow-right {
    position: fixed;
    top: 50%;
    font-size: 40px;
    color: #fff;
    cursor: pointer;
    z-index: 1001;
    display: none;
    transition: color 0.3s;
}

.arrow-left:hover, .arrow-right:hover {
    color: #FF6F61;
}

.arrow-left {
    left: 20px;
    transform: translateY(-50%);
}

.arrow-right {
    right: 20px;
    transform: translateY(-50%);
}


         /* Portfolio Purchase Section */
         .portfolio-section {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 40px 30px;
            background: linear-gradient(55deg,#ca375c,#98fb98);
        }

        .portfolio-card {
            background: linear-gradient(45deg,#9dc183,#708238); /* Teal to green gradient */
            width: 280px;
            margin: 15px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .portfolio-card:hover {
            transform: translateY(-10px);
        }

        .portfolio-card img {
    max-width: 100%;
    height: 200px; /* Set a fixed height */
    object-fit: cover; /* Ensures the image fills the area while maintaining its aspect ratio */
    border-radius: 8px;
        }
        .portfolio-card h3 {
            font-size: 22px;
            margin-top: 15px;
            color: #fff; /* W91808te text for the title */
        }

        .portfolio-card p {
            font-size: 16px;
            color: #f0f0f0; /* Lighter text for description */
            margin: 10px 0;
        }

        .portfolio-card .price {
            font-size: 20px;
            font-weight: bold;
            color: #000000; /* Orange color for price */
        }

        .portfolio-card .buy-btn {
            background-color: #faa72b; /* Orange button */
            color: #000000;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .portfolio-card .buy-btn:hover {
            background-color: #f57c00; /* Darker orange on hover */
        }

        /* Responsive Design for Smaller Screens */
        @media (max-width: 768px) {
            .portfolio-card {
                width: 100%;
                max-width: 350px;
            }
        }

        
        /* Feedback Section */
        .feedback-section {
           
    padding: 50px 0;
    text-align: center;
}

.feedback-title h2 {
    font-size: 30px;
    color: #2c3e50; /* Dark navy for the title */
    margin-bottom: 30px;
}

.feedback-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    margin-top: 20px;
}

.feedback-item {
    padding: 20px;
    border-radius: 10px;
    width: 30%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
    opacity: 0;
    transform: translateY(50px); /* Initially positioned below */
    animation: slideIn 0.6s forwards;
}

/* Assign unique background colors */
.feedback-item:nth-child(1) {
    background-color: #ffebee; /* Soft red */
}

.feedback-item:nth-child(2) {
    background-color: #e8f5e9; /* Soft green */
}

.feedback-item:nth-child(3) {
    background-color: #e3f2fd; /* Soft blue */
}

.feedback-item:nth-child(4) {
    background-color: #fff3e0; /* Soft orange */
}

.feedback-item:nth-child(5) {
    background-color: #ede7f6; /* Soft purple */
}

.feedback-item:nth-child(6) {
    background-color: #fce4ec; /* Soft pink */
}

/* Show items with animation */
.feedback-item.show {
    opacity: 1;
    transform: translateY(80px);
}

/* Hover effect for all items */
.feedback-item:hover {
    transform: translateY(-15px) scale(1.05); /* Lift slightly and enlarge less */
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3); /* Bolder shadow */
    background-color: #ffd54f; /* Bright yellow hover color */
    border: 2px solid #ff6f00; /* Add a vibrant orange border */
    z-index: 2; /* Bring hovered card to the front */
}

/* Ensure text size remains constant */
.feedback-text {
    font-size: 16px; /* Fixed size */
    color: #555; /* Medium-dark gray for readability */
    font-style: italic;
    margin-bottom: 20px;
    transition: color 0.3s ease; /* Add color transition for hover */
}

.feedback-text:hover {
    color: #d84315; /* Dark orange for emphasis */
}

.feedback-author {
    display: flex;
    align-items: center;
    justify-content: center;
}

.avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
    border: 2px solid #2c3e50; /* Dark navy border */
}

.author-info {
    text-align: left;
}

.author-name {
    font-size: 18px; /* Fixed size */
    font-weight: bold;
    color: #2c3e50; /* Dark navy */
}

.author-title {
    font-size: 14px; /* Fixed size */
    color: #777; /* Light gray */
}

/* Add animation for feedback items */
@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(50px); /* Start from below */
    }
    to {
        opacity: 1;
        transform: translateY(0); /* End at the normal position */
    }
}

.feedback-item:nth-child(2) {
    animation-delay: 0.2s;
}

.feedback-item:nth-child(3) {
    animation-delay: 0.4s;
}

.feedback-item:nth-child(4) {
    animation-delay: 0.6s;
}

.feedback-item:nth-child(5) {
    animation-delay: 0.8s;
}

.feedback-item:nth-child(6) {
    animation-delay: 1s;
}
//*contact-page*/
.contact-container {
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #ff7eb3, #ff758c);
    padding: 20px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.contact-form {
    width: 45%;
    max-width: 650px;
    padding: 30px;
    border-radius: 15px;
    background: linear-gradient(45deg, #ff4e50, #fc913a);
    box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.4), -10px -10px 30px rgba(255, 255, 255, 0.3);
    text-align: center;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.contact-form:hover {
    transform: translateY(-10px);
    box-shadow: 14px 14px 35px rgba(0, 0, 0, 0.5), -14px -14px 35px rgba(255, 255, 255, 0.3);
}

.contact-form h1 {
    color: #fff;
    margin-bottom: 12px;
    font-size: 26px;
    font-weight: bold;
}

.contact-form p {
    color: #eee;
    margin-bottom: 18px;
    font-size: 16px;
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    font-size: 16px;
    border: none;
    border-radius: 8px;
    box-sizing: border-box;
    box-shadow: inset 4px 4px 8px rgba(0, 0, 0, 0.3), inset -4px -4px 8px rgba(255, 255, 255, 0.1);
    transition: box-shadow 0.3s ease;
}

.contact-form input:focus, .contact-form textarea:focus {
    box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.5), inset -2px -2px 5px rgba(255, 255, 255, 0.2);
    outline: none;
}

.contact-form textarea {
    height: 120px;
    resize: none;
}

.contact-form button {
    padding: 12px 24px;
    font-size: 16px;
    font-weight: bold;
    background-color: #ff3d4f;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.contact-form button:hover {
    background-color: #d62e3e;
    transform: scale(1.05);
}

.contact-form .reset {
    background-color: #ff6659;
}

.contact-form .reset:hover {
    background-color: #cc5045;
}

.background-shadow {
    position: absolute;
    width: 98%;
    height: 98%;
    background: rgba(255, 94, 98, 0.6);
    border-radius: 15px;
    top: 10px;
    left: 10px;
    z-index: -1;
    transition: transform 0.3s ease;
}

.contact-form:hover .background-shadow {
    transform: translateY(-10px);
}
/* Footer Styling */
.footer {
    background-color: #333;
    color: #fff;
    padding: 40px;
    text-align: left;
}

.footer-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.footer-section {
    width: 22%;
    margin-bottom: 20px;
    color: white;
}

.footer-title {
    font-size: 24px;
    font-weight: bold;
    color: #e2dcdb;  /* Coral for titles */
    margin-bottom: 15px;
    text-align: center;
    
}

.footer-section ul {
    list-style: none;
    padding-left: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #ddd;
    text-decoration: none;
}

.footer-section ul li a:hover {
    color: #f5f5f0;  /* Hover effect with Coral */
}

/* Dropdown menu */
.dropdown {
    position: relative;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    min-width: 160px;
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-content a {
    color: #ddd;
    padding: 10px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #FF6F61;
    color: #fff;
}

/* Social Media Section */
.social-media {
    display: flex;
    gap: 15px;
    justify-content: center;  /* Centers the icons */
    align-items: center;
    margin-top: 20px;  /* Adds space between the text and the icons */
}

.social-media a {
    text-decoration: none;
}

/* Styling for circular, small social media icons */
.social-media a img {
    width: 25px;   /* Smaller size of the social media icons */
    height: 25px;
    border-radius: 50%;  /* Makes the image circular */
    object-fit: cover;   /* Ensures the image fits wit91808n the circle */
    transition: transform 0.3s ease;
}

.social-media a img:hover {
    transform: scale(1.2); /* Slightly enlarge the icon on hover */
}

.footer-bottom {
    margin-top: 40px;
    text-align: center;
    border-top: 1px solid #fffefe;
    padding-top: 20px;
    color: white;
}

.app-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
}

.app-buttons a img {
    width: 120px;
    height: auto;
}


    </style>
</head>
<body>
     <!-- Header Section -->
     <div class="header-section">
        <div class="logo">
            <a href="index.php" class="logo-link">
                <div class="logo-circle">
                    <img src="images/logo/logo.jpg" alt="Art Gallery Logo">
                </div>
                <h1>Creative Horizon</h1>
            </a>
        </div>
        <div class="search-container">
            <input type="text" id="search-bar" class="search-bar" placeholder="Search for products, services, etc.">
            <i class="fa fa-search" aria-label="Search" onclick="performSearch()"></i>
        </div>
        <div class="icon-container">
            <button aria-label="Login" onclick="window.location.href='login.php';">
                <i class="fa fa-user"></i> Login
            </button>
            <button aria-label="Signup" onclick="window.location.href='signup.php';">
                <i class="fa fa-user-plus"></i> Signup
            </button>
            <div class="premium-icon" onclick="window.location.href='cart.php';">
                <i class="fa fa-crown"></i> Get Premium
            </div>
            
        </div>
    </div>

    <!-- Separate Navigation Bar -->
    <div class="navigation-bar">
        <div class="nav-container">
            <ul class="nav-menu">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a href="#">Categories <i class="fa fa-chevron-down dropdown-arrow"></i></a>
                    <div class="dropdown-content">
                        <a href="categ_nature.php">Nature</a>
                        <a href="categ_paint.php">Paint</a>
                        <a href="categ_sketch.php">Sketch</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a href="#">Artist <i class="fa fa-chevron-down dropdown-arrow"></i></a>
                    <div class="dropdown-content">
                        <a href="artist_1.php">Painter</a>
                        <a href="artist_2.php">Sculptor</a>
                        <a href="artist_3.php">Digital Artist</a>
                    </div>
                </li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>
   
        
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="false">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
          </ol>
      
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="images\herosection\h1.jpg" alt="Abstract Art">
              <div class="carousel-caption">
                <h4>Welcome to Creative Horizon </h4>
              </div>
            </div>
      
            <div class="item">
              <img src="images\8.jpg" alt="Modern Design">
              <div class="carousel-caption">
                <h4>An immersive art gallery interface showcasing curated masterpieces</h4>
              </div>
            </div>
          
            <div class="item">
              <img src="images\herosection\h2.jpg" alt="Timeless Classic">
              <div class="carousel-caption">
                <h4>An immersive art gallery interface showcasing curated masterpieces</h4>
              </div>
            </div>
          
          <div class="item">
            <img src="images\herosection\h3.jpg" alt="Timeless Classic">
            <div class="carousel-caption">
              <h4>An immersive art gallery interface showcasing curated masterpieces</h4>
            </div>
          </div>
       
        <div class="item">
          <img src="images\herosection\h4.jpg" alt="Timeless Classic">
          <div class="carousel-caption">
            <h4>An immersive art gallery interface showcasing curated masterpieces</h4>
          </div>
        </div>
      </div>
      
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyp91808con glyp91808con-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyp91808con glyp91808con-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      
        <!-- Spacer for bottom alignment -->
        <div class="spacer"></div>
      </div>
      
   <!-- Galleries Section -->
   <div class="scroll-section" id="gallery">
    <h2>Galleries</h2>
    <div class="gallery">
        <div class="col">
            <img src="images/4.webp" alt="Boat on Calm Water" onclick="openModal(0)">
            <img src="images/9.webp" alt="Wintry Mountain Landscape" onclick="openModal(1)">
        </div>
        <div class="col">
            <img src="images/5.webp" alt="Mountains in the Clouds" onclick="openModal(2)">
            <img src="images/8.jpg" alt="Forest During Sunset" onclick="openModal(3)">
        </div>
        <div class="col">
            <img src="images/6.webp" alt="Quiet Lake at Dawn" onclick="openModal(4)">
            <img src="images/7.webp" alt="Cityscape at Night" onclick="openModal(5)">
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="modal">
    <div class="modal-container">
        <img src="" id="modalImg" alt="Zoomed Art">
        <div class="modal-content">
            <h3 id="modalTitle">Image Title</h3>
            <p id="modalDescription">This is a brief description of the image.</p>
            <div class="icons">
                <i class="material-icons" id="like-icon" onclick="likeImage()">favorite_border</i>
                <i class="material-icons" onclick="downloadImage()">download</i>
                <i class="material-icons" onclick="shareImage()">share</i>
            </div>
        </div>
    </div>
</div>

<!-- Navigation Arrows -->
<i class="material-icons arrow-left" id="arrow-left" onclick="navigateImage(-1)">chevron_left</i>
<i class="material-icons arrow-right" id="arrow-right" onclick="navigateImage(1)">chevron_right</i>


    <!-- Portfolio Purchase Section -->
    <div class="portfolio-section">
        <h2 style="width: 100%; text-align: center; margin-bottom: 30px; color: #333;">Purchase</h2>
        <div class="portfolio-card">
            <img src="images\1.jpeg" alt="Nature Photography">
            <h3>Nature Photography</h3>
            <p>Download 91808gh-quality nature photographs for personal or commercial use.</p>
            <p class="price">$9.99</p>
            <a href="images/6.webp" class="buy-btn">Pay Now</a>
        </div>
        <div class="portfolio-card">
            <img src="images\3.jpeg" alt="Abstract Artwork">
            <h3>Abstract Artwork</h3>
            <p>Get stunning abstract digital artwork to enhance your space or project.</p>
            <p class="price">$14.99</p>
            <a href="" download class="buy-btn">Pay Now</a>
        </div>
        <div class="portfolio-card">
            <img src="images\10.webp" alt="Modern Design Templates">
            <h3>Modern Design Templates</h3>
            <p>Download ready-to-use design templates for your business or projects.</p>
            <p class="price">$19.99</p>
            <a href="images/design-template.zip" download class="buy-btn">Pay Now</a>
        </div>
    </div>

    <!--Contact us-->
    <div class="contact-container">
        <div class="contact-form">
        <section id="contact">
            <h1>Contact Us!</h1>
            <p>Fill up the form below to send us a message.</p>
            <form action="index.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit" name="contact_submit">Send Message</button>
               
            </form>
            </section>
        </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-title">About Us</h3>
                <p style="color: white;">Creative Horizon is your gateway to discovering the limitless potential of creativity through design, innovation, and inspiration.</p>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#">Categories <i class="fa fa-chevron-down dropdown-arrow"></i></a>
                        <div class="dropdown-content">
                            <a href="categ_nature.php">Web Design</a>
                            <a href="categ_paint.php">Graphic Design</a>
                            <a href="categ_sketch.php">Marketing</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="#">Artist <i class="fa fa-chevron-down dropdown-arrow"></i></a>
                        <div class="dropdown-content">
                            <a href="artist_1.php">Painter</a>
                            <a href="artist_2.php">Sculptor</a>
                            <a href="artist_3.php">Digital Artist</a>
                        </div>
                    </li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Contact</h3>
                <ul>
                    <li>Email: contact@creativehorizon.com</li>
                    <li>Phone: +123 456 789</li>
                    <li>Address: 123 Creative Street, City, Country</li>
                </ul>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Follow Us</h3>
                <div class="social-media">
                    <a href="https://facebook.com" target="_blank"><img src="images\logo\fb.jpeg" alt="Facebook"></a>
                <a href="https://twitter.com" target="_blank"><img src="images\logo\x.png" alt="Twitter"></a>
                <a href="https://instagram.com" target="_blank"><img src="images\logo\insta.jpeg" alt="Instagram"></a>
                <a href="https://linkedin.com" target="_blank"><img src="images\logo\lin.png" alt="LinkedIn"></a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p style="color:white;"> &copy; 2024 Creative Horizon. All Rights Reserved.</p>
            <div class="app-buttons">
                <a href="https://play.google.com/store/apps" target="_blank">
                    <img src="images/logo/play.avif" alt="Google Play">
                </a>
                <a href="https://www.apple.com/app-store/" target="_blank">
                    <img src="images/logo/app.avif" alt="App Store">
                </a>
            </div>
        </div>
    </div>

    <script>
        // Function for scrolling to content
        function scrollToContent() {
            document.getElementById("gallery").scrollIntoView({ behavior: "smooth" });
        }
        // Function to handle search
        function performSearch() {
            var query = document.getElementById("search-bar").value;
            if (query) {
                alert("Search for: " + query);
            }
        }
        window.onload = function() {
            const feedbackItems = document.querySelectorAll('.feedback-item');
            feedbackItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('show');
                }, index * 200); // Add a delay between each card's animation
            });
        };
         // Set the transition interval and disable pause on hover
  $('#myCarousel').carousel({
    interval: 2000, // 2 seconds
    pause: false // Disable pause on hover
  });

  const images = [
  { src: "images/4.webp", description: "Boat on calm water, showcasing serenity." },
  { src: "images/9.webp", description: "A wintry mountain landscape with snow-covered peaks." },
  { src: "images/5.webp", description: "Mountains surrounded by clouds, a breathtaking view." },
  { src: "images/8.jpg", description: "A forest glowing with a warm sunset." },
  { src: "images/6.webp", description: "A quiet lake at dawn, reflecting the morning glow." },
  { src: "images/7.webp", description: "A vibrant cityscape illuminated at night." }
];

let currentIndex = 0;

function openModal(index) {
  currentIndex = index;
  updateModalContent();
  document.getElementById('modal').style.display = 'flex';
  document.getElementById('arrow-left').style.display = 'block';
  document.getElementById('arrow-right').style.display = 'block';
}

function closeModal() {
  document.getElementById('modal').style.display = 'none';
  document.getElementById('arrow-left').style.display = 'none';
  document.getElementById('arrow-right').style.display = 'none';
}

function updateModalContent() {
  const modalImg = document.getElementById('modalImg');
  const modalTitle = document.getElementById('modalTitle');
  const modalDescription = document.getElementById('modalDescription');

  modalImg.src = images[currentIndex].src;
  modalTitle.innerText = `Image ${currentIndex + 1}`;
  modalDescription.innerText = images[currentIndex].description;
}

function navigateImage(direction) {
  currentIndex = (currentIndex + direction + images.length) % images.length;
  updateModalContent();
}

function downloadImage() {
  const link = document.createElement('a');
  link.href = images[currentIndex].src;
  link.download = `Image_${currentIndex + 1}.jpg`;
  link.click();
}

function shareImage() {
            const imageUrl = images[currentIndex].src;

            if (navigator.share) {
                navigator.share({
                    title: 'Check out this image!',
                    text: 'Look at this beautiful image I found.',
                    url: imageUrl,
                }).catch(error => console.error('Error sharing:', error));
            } else {
                navigator.clipboard.writeText(imageUrl).then(() => {
                    alert('Image link copied to clipboard!');
                }).catch(err => console.error('Error copying link:', err));
            }
        }

function likeImage() {
  const likeIcon = document.getElementById('like-icon');
  likeIcon.classList.toggle('liked');
  likeIcon.innerText = likeIcon.classList.contains('liked') ? 'favorite' : 'favorite_border';
}

document.getElementById('modal').addEventListener('click', function (event) {
  if (event.target.id === 'modal') {
      closeModal();
  }
});
    </script>
</body>
</html>
