<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$username = $_SESSION["user"]; // Get the username from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Horizon</title>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
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

        /* Marquee Effect for Welcome Message */
        .welcome-message {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: #fff;
            font-weight: 700;
            text-transform: uppercase;
        }

        .user-container {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        /* Search Bar */
        .search-container {
            display: flex;
            align-items: center;
            position: relative;
            width: 300px;
        }

        .search-bar {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
            background-color: #fff;
            color: #000;
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

        .logout-button, .purchase-icon {
            font-size: 20px;
            background-color: transparent;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: color 0.3s;
        }

        .logout-button:hover, .purchase-icon:hover {
            color: #f39c12;
        }

        .logout-button {
            padding: 5px 10px;
        }

        .purchase-icon {
            font-size: 20px;
            background-color: #FF6F61;
            border-radius: 50%;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .purchase-icon:hover {
            background-color: #e74c3c;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-section {
                flex-direction: column;
                text-align: center;
            }
            .user-container {
                margin-top: 10px;
                justify-content: center;
            }
            .search-container {
                width: 250px;
            }
        }
        .suggestions-dropdown {
    position: absolute; /* Position it relative to the parent container */
    background-color: #ffffff; /* White background for the dropdown */
    border: 1px solid #ddd; /* Border for the dropdown */
    border-radius: 5px; /* Rounded corners */
    z-index: 1000; /* Ensure it appears above other elements */
    width: calc(100% - 2px); /* Match the width of the input field with border adjustment */
    max-height: 200px; /* Limit height */
    overflow-y: auto; /* Scroll if too many suggestions */
    display: none; /* Initially hidden */
    top: 100%; /* Position it exactly below the input field */
    left: 0; /* Align it with the input field */
    margin-top: 5px; /* Space between the search bar and dropdown */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Add shadow for better visibility */
}

.suggestion-item {
    padding: 10px; /* Padding for each suggestion */
    cursor: pointer; /* Pointer cursor on hover */
    color: #333; /* Text color for suggestions */
}

.suggestion-item:hover {
    background-color: #f0f0f0; /* Highlight on hover */
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
        
    .profile-section {
        background: #ffffff;
        padding: 60px 0;
      }
  
      .section-title h2 {
        font-size: 32px;
        margin-bottom: 20px;
        color: #444;
        text-align: center;
      }
  
      .section-title p {
        font-size: 16px;
        margin-bottom: 40px;
        color: #666;
        text-align: center;
      }
  
      .swiper-wrapper {
        display: flex;
        gap: 20px;
      }
  
      .profile-item {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 15px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        width: 230px; /* Reduced width */
        height: 350px; /* Reduced height */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
  
      .profile-item:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 18px rgba(8, 8, 8, 0.2);
      }
  
      .profile-img {
        width: 115px; /* Reduced image size */
        height: 120px; /* Reduced image size */
        border-radius: 50%;
        object-fit: cover;
        margin: 0 auto 20px;
      }
  
      .profile-item h3 {
        font-size: 18px; /* Reduced font size */
        margin: 10px 0;
      }
  
      .profile-item h4 {
        font-size: 14px; /* Reduced font size */
        color: #777;
        margin-bottom: 15px;
      }
  
      .profile-item p {
        font-size: 12px; /* Reduced font size */
        line-height: 1.4;
      }
  
      .swiper-pagination-bullet {
        background: #888;
      }
  
      .swiper-pagination-bullet-active {
        background: #333;
      }
  
      /* Assign unique colors to cards */
      .swiper-slide:nth-child(1) .profile-item { background-color: #f9dce6; } /* Pink */
      .swiper-slide:nth-child(2) .profile-item { background-color: #dcf4dd; } /* Light Green */
      .swiper-slide:nth-child(3) .profile-item { background-color: #e2f0fc; } /* Light Blue */
      .swiper-slide:nth-child(4) .profile-item { background-color: #fbf9e8; } /* Yellow */
      .swiper-slide:nth-child(5) .profile-item { background-color: #f1eafd; } /* Purple */
      .swiper-slide:nth-child(6) .profile-item { background-color: #fbe8e3; } /* Light Orange */
      .swiper-slide:nth-child(7) .profile-item { background-color: #d2eef2; } /* Cyan */
      .swiper-slide:nth-child(8) .profile-item { background-color: #f5f8d7; } /* Light Lime */
      .swiper-slide:nth-child(9) .profile-item { background-color: #f5e1e1; } /* Light Red */
      .swiper-slide:nth-child(10) .profile-item { background-color: #e0f7fa; } /* Light Cyan */
      .swiper-slide:nth-child(11) .profile-item { background-color: #f3e5f5; } /* Lavender */
      .swiper-slide:nth-child(12) .profile-item { background-color: #fff3e0; } /* Light Peach */
  
/*contact-page*/
.contact-container {
    width: 90%;
    max-width: 550px;
    margin: auto;
}

.contact-form {
    background: linear-gradient(45deg, #4f4feb, #ccafe3);
    padding: 20px 30px;
    border-radius: 10px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2), -5px -5px 15px rgba(255, 255, 255, 0.1);
    text-align: center;
    position: relative;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.contact-form:hover {
    transform: translateY(-10px);
    box-shadow: 10px 10px 25px rgba(0, 0, 0, 0.3), -10px -10px 25px rgba(255, 255, 255, 0.2);
}

.contact-form h1 {
    color: #fff;
    margin-bottom: 10px;
    font-size: 24px;
}

.contact-form p {
    color: #eee;
    margin-bottom: 20px;
    font-size: 14px;
}

.contact-form input, .contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: none;
    border-radius: 5px;
    box-sizing: border-box;
    box-shadow: inset 3px 3px 6px rgba(0, 0, 0, 0.2), inset -3px -3px 6px rgba(255, 255, 255, 0.1);
    transition: box-shadow 0.3s ease;
}

.contact-form input:focus, .contact-form textarea:focus {
    box-shadow: inset 1px 1px 2px rgba(0, 0, 0, 0.4), inset -1px -1px 2px rgba(255, 255, 255, 0.2);
    outline: none;
}

.contact-form textarea {
    height: 100px;
    resize: none;
}

.contact-form button {
    padding: 10px 20px;
    background-color: #4B6FEE;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
}

.contact-form button:hover {
    background-color: #354FC7;
    transform: scale(1.05);
}

.contact-form .reset {
    background-color: #FF4E56;
}

.contact-form .reset:hover {
    background-color: #CC3B42;
}

.background-shadow {
    position: absolute;
    width: 90%;
    height: 90%;
    background: rgba(128, 93, 243, 0.5);
    border-radius: 10px;
    top: 15px;
    left: 15px;
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
                <div class="logo-circle">
                    <img src="images/logo/logo.jpg" alt="Art Gallery Logo">
                </div>
                <h1>Creative Horizon</h1>
            </div>
            <!-- Search Bar -->
            <div class="search-container">
                <input type="text" id="search-bar" class="search-bar" placeholder="Search for products, services, etc." oninput="showSuggestions(this.value)">
                <i class="fa fa-search" aria-label="Search" onclick="performSearch()"></i>
                <div id="suggestions" class="suggestions-dropdown"></div> <!-- Dropdown for suggestions -->
            </div>
            <div class="user-container">
                <!-- Marquee for Welcome Message -->
                <marquee class="welcome-message" id="welcome-message" scrollamount="10" direction="left">
                <div class="welcome-message" id="welcome-message">
    Welcome, <?php echo htmlspecialchars($username); ?>!
</marquee>
</div>

<button class="logout-btn" onclick="logoutUser ()">Logout</button>
                <!-- Purchase Icon -->
                <div class="purchase-icon" aria-label="Shopping Cart">
                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
        </div>
    <!-- Separate Navigation Bar -->
    <div class="navigation-bar">
        <div class="nav-container">
            <ul class="nav-menu">
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
            <a href="images/6.webp" download class="buy-btn">Pay Now</a>
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
<img src="https://via.placeholder.com/140" class="profile-img" alt="Pablo Picasso">
              <h3>Pablo Picasso</h3>
              <h4>Cubism Pioneer</h4>
              <p>Renowned for transforming modern art with groundbreaking styles and techniques, Picasso redefined artistic expression.</p>
            </div>
          </div>

          <!-- Artist Item 2 -->
          <div class="swiper-slide">
            <div class="profile-item">
              <img src="https://via.placeholder.com/140" class="profile-img" alt="Frida Kahlo">
              <h3>Frida Kahlo</h3>
              <h4>Iconic Painter</h4>
              <p>Famous for her vibrant self-portraits and exploration of identity, gender, and culture in her art.</p>
            </div>
          </div>

          <!-- Artist Item 3 -->
          <div class="swiper-slide">
            <div class="profile-item">
              <img src="https://via.placeholder.com/140" class="profile-img" alt="Leonardo da Vinci">
              <h3>Leonardo da Vinci</h3>
              <h4>Renaissance Genius</h4>
              <p>A true polymath, da Vinci created masterpieces like the Mona Lisa and contributed to art, science, and invention.</p>
            </div>
          </div>

          <!-- Artist Item 4 -->
          <div class="swiper-slide">
            <div class="profile-item">
              <img src="https://via.placeholder.com/140" class="profile-img" alt="Vincent van Gogh">
              <h3>Vincent van Gogh</h3>
              <h4>Post-Impressionist Master</h4>
              <p>Known for his expressive brushwork and emotional depth, Van Gogh's work remains iconic in art history.</p>
            </div>
          </div>

          <!-- Artist Item 5 -->
          <div class="swiper-slide">
            <div class="profile-item">
              <img src="https://via.placeholder.com/140" class="profile-img" alt="Claude Monet">
              <h3>Claude Monet</h3>
              <h4>Impressionist Innovator</h4>
              <p>Monet's use of light and color in works like "Water Lilies" shaped the Impressionist movement.</p>
            </div>
          </div>

          <!-- Artist Item 6 -->
          <div class="swiper-slide">
            <div class="profile-item">
              <img src="https://via.placeholder.com/140" class="profile-img" alt="Georgia O'Keeffe">
              <h3>Georgia O'Keeffe</h3>
              <h4>Modernist Icon</h4>
              <p>Known for her large-scale depictions of flowers and southwestern landscapes, O'Keeffe revolutionized American art.</p>
            </div>
          </div>

          <!-- Artist Item 7 -->
          <div class="swiper-slide">
            <div class="profile-item">
              <img src="https://via.placeholder.com/140" class="profile-img" alt="Salvador Dalí">
              <h3>Salvador Dalí</h3>
              <h4>Surrealist Genius</h4>
              <p>Dalí's surrealist works, filled with dreamlike imagery, have captivated viewers worldwide for decades.</p>
            </div>
          </div>

          <!-- Artist Item 8 -->
          <div class="swiper-slide">
            <div class="profile-item">
              <img src="https://via.placeholder.com/140" class="profile-img" alt="Andy Warhol">
              <h3>Andy Warhol</h3>
              <h4>Pop Art Pioneer</h4>
              <p>Warhol's work, including his famous Campbell's Soup Cans, transformed consumer culture into high art.</p>
            </div>
          </div>

        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </section>
   <!-- Swiper JS -->
   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!--Contact us-->
    <div class="contact-container">
        <div class="contact-form">
            <h1>Contact Us!</h1>
            <p>Fill up the form below to send us a message.</p>
            <form>
                <input type="text" placeholder="Name" required>
                <input type="email" placeholder="Email" required>
                <input type="text" placeholder="Subject" required>
                <textarea placeholder="Type your message here..." required></textarea>
                <button type="submit">Send</button>
                <button type="reset" class="reset">Reset</button>
            </form>
            <div class="background-shadow"></div>
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
        function performSearch() {
    const searchBar = document.getElementById('search-bar');
    const query = searchBar.value.toLowerCase(); // Convert query to lower case
    const allElements = document.body.querySelectorAll("*"); // Select all elements in the body
    let found = false;

    allElements.forEach((el) => {
        if (found) return; // Stop further iterations once the word is found
        if (el.textContent && el.textContent.toLowerCase().includes(query)) { // Convert text content to lower case
            found = true;

            // Scroll to the element containing the word
            el.scrollIntoView({
                behavior: "smooth",
                block: "center",
            });
        }
    });

    if (!found) {
        alert("No matches found.");
    }
}
// Add keypress event listener to the search bar for the Enter key
document.getElementById('search-bar').addEventListener('keypress', function (event) {
    if (event.key === 'Enter') {
        performSearch();
    }
}); 
const suggestions = [
    "Nature Photography",
    "Abstract Artwork",
    "Modern Design Templates",
    "Digital Art",
    "Graphic Design",
    "Web Design",
    "Sculpture Art",
    "Painting Techniques",
    "Art History",
    "Photography Tips"
];

function showSuggestions(value) {
    const suggestionsDropdown = document.getElementById('suggestions');
    suggestionsDropdown.innerHTML = ''; // Clear previous suggestions

    if (value.length === 0) {
        suggestionsDropdown.style.display = 'none'; // Hide dropdown if input is empty
        return;
    }

    const filteredSuggestions = suggestions.filter(suggestion => 
        suggestion.toLowerCase().includes(value.toLowerCase())
    );

    if (filteredSuggestions.length > 0) {
        suggestionsDropdown.style.display = 'block'; // Show dropdown
        filteredSuggestions.forEach(suggestion => {
            const suggestionItem = document.createElement('div');
            suggestionItem.classList.add('suggestion-item');
            suggestionItem.textContent = suggestion;
            suggestionItem.onclick = () => selectSuggestion(suggestion); // Handle suggestion click
            suggestionsDropdown.appendChild(suggestionItem);
        });
    } else {
        suggestionsDropdown.style.display = 'none'; // Hide dropdown if no suggestions
    }
}

function selectSuggestion(suggestion) {
    document.getElementById('search-bar').value = suggestion; // Set input value to selected suggestion
    document.getElementById('suggestions').style.display = 'none'; // Hide dropdown
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
  document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".swiper", {
      loop: true,
      speed: 600,
      autoplay: {
        delay: 5000,
      },
      slidesPerView: 4, /* Show 4 cards at once */
      spaceBetween: 20,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 2, /* 2 cards on smaller screens */
        },
        1200: {
          slidesPerView: 4, /* 4 cards on larger screens */
        },
      },
    });
  });
  function logoutUser () {
        // Clear the stored user data from local storage
        localStorage.removeItem('username');
        localStorage.removeItem('email');
        localStorage.removeItem('password');
        
        // Redirect to the logout script
        window.location.href = 'logout.php'; // Redirect to logout script
    }
     const images = [
        { src: "images/4.webp", description: "Boat on calm water, showcasing serenity." },
        { src: "images/9.webp", description: "A wintry mountain landscape with snow-covered peaks." },
        { src: "images/5.webp", description: "Mountains surrounded by clouds, a breathtaking view." },
        { src: "images/8.jpg", description: "A forest glowing with a warm sunset." },
        { src: "images/6.webp", description: "A quiet lake at dawn, reflecting the morning glow." },
        { src: "images/7.webp", description: "A vibrant cityscape illuminated at night." }
    ];

    let currentIndex = 0;
    let debounceTimeout;

    function openModal(index) {
        currentIndex = index;
        updateModalContent();
        const modal = document.getElementById('modal');
        const arrows = document.querySelectorAll('.arrow-left, .arrow-right');

        modal.style.display = 'flex';
        arrows.forEach(arrow => (arrow.style.display = 'block'));
    }

    function closeModal() {
        const modal = document.getElementById('modal');
        const arrows = document.querySelectorAll('.arrow-left, .arrow-right');

        modal.style.display = 'none';
        arrows.forEach(arrow => (arrow.style.display = 'none'));
    }

    function updateModalContent() {
        const modalImg = document.getElementById('modalImg');
        const modalTitle = document.getElementById('modalTitle');
        const modalDescription = document.getElementById('modalDescription');

        if (images[currentIndex]) {
            const { src, description } = images[currentIndex];
            modalImg.src = src;
            modalImg.alt = description || `Image ${currentIndex + 1}`;
            modalTitle.innerText = `Image ${currentIndex + 1}`;
            modalDescription.innerText = description;
        } else {
            console.error('Invalid image index.');
        }
    }

    function navigateImage(direction) {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(() => {
            currentIndex = (currentIndex + direction + images.length) % images.length;
            updateModalContent();
        }, 200);
    }

    function downloadImage() {
        if (images[currentIndex]) {
            const link = document.createElement('a');
            link.href = images[currentIndex].src;
            link.download = `Image_${currentIndex + 1}.jpg`;
            link.click();
        } else {
            console.error('Invalid image index.');
        }
    }

    function shareImage() {
        const imageUrl = images[currentIndex].src;

        if (navigator.share) {
            navigator.share({
                title: 'Check out this image!',
                text: `Look at this amazing artwork: ${images[currentIndex].description}`,
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

