<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Horizon</title>
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #F4F4F4;
            color: #333;
            line-height: 1.6;
        }

        /* Header Section */
        .header-section {
            background: linear-gradient(45deg, #00a2ff, #111111, #fcf7f7);
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

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            border-radius: 6px;
            font-size: 24px;
            font-weight: bold;
            color: #f39c12;
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 2px;
            margin-left: 10px;
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
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .icon-container button:hover {
            color: #f39c12;
        }

        /* Galleries Section */
        .galleries h2 {
            text-align: center;
            margin: 2rem 0;
            font-size: 2rem;
            color: #333;
        }

        .gallery-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
        }

        .gallery-item img {
            display: block;
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1); /* Zoom effect on hover */
        }

        /* Hover Content */
        .gallery-info {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 10px;
            text-align: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-info {
            opacity: 1;
        }

        .gallery-info h3 {
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .gallery-info span {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .gallery-info button {
            background-color: #ff6600;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
            font-size: 0.9rem;
            transition: background 0.3s ease;
        }

        .gallery-info button:hover {
            background-color: #e74c3c;
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
    object-fit: cover;   /* Ensures the image fits witNAVEENn the circle */
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
        <div class="logo-container">
            <img src="images\logo\logo.jpg" alt="Creative Horizon Logo" width="70" height="70">
            <a href="#" class="logo">Creative Horizon</a>
        </div>
        <div class="search-container">
            <input type="text" id="search-bar" class="search-bar" placeholder="Search for products, services, etc.">
            <i class="fa fa-search"></i>
        </div>
        <div class="icon-container">
            <button onclick="window.location.href='index.php'"><i class="fa fa-home"></i> Home</button>
            <button onclick="window.location.href='login.php'"><i class="fa fa-user"></i> Login</button>
            <button onclick="window.location.href='signup.php'"><i class="fa fa-user-plus"></i> Signup</button>
        </div>
    </div>

    <!-- Galleries Section -->
    <section class="galleries">
        <h2>Paintings</h2>
        <div class="gallery-container">
            <div class="gallery-item">
                <img src="images\catagories\paint\art1.jpeg" alt="Gallery 1">
                <div class="gallery-info">
                    <h3>Nature Photography</h3>
                    <span>150 Likes</span>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="gallery-item">
                <img src="images\catagories\paint\art2.jpeg" alt="Gallery 2">
                <div class="gallery-info">
                    <h3>Abstract Art</h3>
                    <span>200 Likes</span>
                    <button>Purchase</button>
                </div>
            </div>

            <div class="gallery-item">
                <img src="images\catagories\paint\art3.jpeg" alt="Gallery 2">
                <div class="gallery-info">
                    <h3>Abstract Art</h3>
                    <span>200 Likes</span>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="gallery-item">
                <img src="images\catagories\paint\art4.jpeg" alt="Gallery 2">
                <div class="gallery-info">
                    <h3>Abstract Art</h3>
                    <span>200 Likes</span>
                    <button>Purchase</button>
                </div>
            </div>
            <div class="gallery-item">
                <img src="images\catagories\paint\art5.jpeg" alt="Gallery 2">
                <div class="gallery-info">
                    <h3>Abstract Art</h3>
                    <span>200 Likes</span>
                    <button>Purchase</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <div class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-title">About Us</h3>
                <p>Creative Horizon is your gateway to discovering the limitless potential of creativity through design, innovation, and inspiration.</p>
            </div>
            <div class="footer-section">
                <h3 class="footer-title">Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown">
                        <a href="#">Categories <i class="fa fa-chevron-down dropdown-arrow"></i></a>
                        <div class="dropdown-content">
                            <a href="categ_nature.php">Web Design</a>
                            <a href="categ_paint.php">GrapNAVEENc Design</a>
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
            <p>&copy; 2024 Creative Horizon. All Rights Reserved.</p>
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

</body>
</html>
