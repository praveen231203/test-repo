<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery with Categories and Modal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Google Font for Artistic Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #3480cc;
        }

        h2 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

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

        /* Categories Styles */
        .categories {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .categories button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .categories button.active {
            background-color: #0056b3;
        }

        /* Gallery Section */
        .gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 30px; /* Increased gap between images */
    justify-content: center;
    padding: 20px;
}

.gallery .col {
    flex: 1 1 calc(33.333% - 30px); /* Adjusted to match new gap */
    max-width: calc(33.333% - 30px); /* Adjusted to match new gap */
}

.gallery img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: transform 0.3s;
}

.gallery img:hover {
    transform: scale(1.05);
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8); /* Dark semi-transparent background */
    backdrop-filter: blur(10px);
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.9); /* Slightly transparent black */
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
    background-color: rgba(0, 0, 0, 0.7); /* Slightly transparent background for text */
    padding: 10px;
    border-radius: 10px;
}

.modal-content h3 {
    font-size: 24px;
    color: #ffffff; /* Changed text color to white for contrast */
    margin-bottom: 10px;
}

.modal-content p {
    font-size: 16px;
    color: #ffffff; /* Changed text color to white for contrast */
    line-height: 1.6;
    margin-bottom: 20px;
}

.icons {
    display: flex;
    justify-content: center;
    gap: 20px; /* Increased gap between icons */
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

/* Navigation Arrows - Fixed Outside Modal */
.arrow-left, .arrow-right {
    position: fixed;
    top: 50%;
    font-size: 40px;
    color: #fff;
    cursor: pointer;
    z-index: 1000;
    display: none; /* Hide by default */
}

.arrow-left {
    left: 20px;
    transform: translateY(-50%);
}

.arrow-right {
    right: 20px;
    transform: translateY(-50%);
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
            </a>
            </div>
            <h1>Creative Horizon</h1></a>
        </div>
        <!-- Search Bar -->
        <div class="search-container">
          <input type="text" id="search-bar" class="search-bar" placeholder="Search for products, services, etc.">
          <i class="fa fa-search" aria-label="Search" onclick="performSearch()"></i>
      </div>
        <div class="user-container">
            <!-- Marquee for Welcome Message -->
            <marquee class="welcome-message" scrollamount="10" direction="left">
                Welcome, User! 
            </marquee>
            <!-- Logout Button -->
            <button class="logout-button" onclick="logoutUser()">Logout <i class="fa fa-sign-out-alt"></i></button>
            <!-- Purchase Icon -->
            <div class="purchase-icon" aria-label="Shopping Cart">
                <i class="fa fa-shopping-cart"></i>
            </div>
        </div>
    </div>

    <h2>Art Gallery</h2>

    <!-- Categories -->
    <div class="categories">
        <button class="active" onclick="filterGallery(event, 'all')">All</button>
        <button onclick="filterGallery(event, 'nature')">Nature</button>
        <button onclick="filterGallery(event, 'wildlife')">Wildlife</button>
        <button onclick="filterGallery(event, 'wildlife')">Heritage</button>
    </div>

    <!-- Galleries Section -->
    <div class="gallery" id="gallery">
        <div class="col" data-category="nature">
            <img src="categ/n1.jpg" alt="Boat on Calm Water" onclick="openModal(0)">
            <img src="images/9.webp" alt="Wintry Mountain Landscape" onclick="openModal(1)">
        </div>
        <div class="col" data-category="nature">
            <img src="images/5.webp" alt="Mountains in the Clouds" onclick="openModal(2)">
            <img src="images/8.jpg" alt="Forest During Sunset" onclick="openModal(3)">
        </div>
        <div class="col" data-category="wildlife">
            <img src="categ/w1.jpg" alt="Quiet Lake at Dawn" onclick="openModal(4)">
            <img src="categ/w2.jpg" alt="Cityscape at Night" onclick="openModal(5)">
        </div>
        <div class="col" data-category="nature">
            <img src="categ/n3.jpg" alt="Wintry Mountain Landscape" onclick="openModal(6)">
        </div>
        <div class="col" data-category="nature">
            <img src="categ/n4.jpg" alt="Mountains in the Clouds" onclick="openModal(7)">
            <img src="categ/n5.jpg" alt="Forest During Sunset" onclick="openModal(8)">
        </div>
        <div class="col" data-category="wildlife">
            <img src="categ/w3.jpg" alt="Quiet Lake at Dawn" onclick="openModal(9)">
            <img src="categ/w4.jpg" alt="Cityscape at Night" onclick="openModal(10)">
        </div>
        <div class="col" data-category="heritage">
            <img src="categ/h1.jpg" alt="Quiet Lake at Dawn" onclick="openModal(11)">
            <img src="categ/h2.jpg" alt="Cityscape at Night" onclick="openModal(12)">
        </div>
        <div class="col" data-category="heritage">
            <img src="categ/h3.jpg" alt="Quiet Lake at Dawn" onclick="openModal(13)">
            <img src="categ/h4.jpg" alt="Cityscape at Night" onclick="openModal(14)">
        </div>
        <div class="col" data-category="heritage">
            <img src="categ/h5.jpg" alt="Quiet Lake at Dawn" onclick="openModal(15)">
            <img src="categ/h6.jpg" alt="Cityscape at Night" onclick="openModal(16)">
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
    <i class="material-icons arrow-left" id="arrow-left" onclick="navigateImage(-1)">chevron_left</i>
    <i class="material-icons arrow-right" id="arrow-right" onclick="navigateImage(1)">chevron_right</i>
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
            const images = [
                { src: "categ/n1.jpg", category: "nature", description: "Boat on calm water, showcasing serenity." },
                { src: "categ/n2.jpg", category: "nature", description: "A wintry mountain landscape with snow-covered peaks." },
                { src: "categ/n3.jpg", category: "nature", description: "Mountains surrounded by clouds, a breathtaking view." },
                { src: "categ/n4.jpg", category: "nature", description: "A forest during sunset, highlighting the beauty of nature." },
                { src: "categ/w1.jpg", category: "wildlife", description: "A quiet lake at dawn with mist rising." },
                { src: "categ/w2.jpg", category: "wildlife", description: "A cityscape at night with lights twinkling." },
                { src: "categ/n5.jpg", category: "nature", description: "Snowy mountain landscape, peaceful and majestic." },
                { src: "categ/n6.jpg", category: "nature", description: "Majestic mountain peaks with clouds surrounding them." },
                { src: "categ/n7.jpg", category: "nature", description: "A rich sunset sky over a forest." },
                { src: "images/5.webp", category: "nature", description: "A serene lakeside scene with morning mist." },
                { src: "categ/w3.jpg", category: "wildlife", description: "A beautiful cityscape during night with lit buildings." },
                { src: "categ/h1.jpg", category: "heritage", description: "Snowy mountain landscape, peaceful and majestic." },
                { src: "categ/h2.jpg", category: "heritage", description: "Majestic mountain peaks with clouds surrounding them." },
                { src: "categ/h3.jpg", category: "heritage", description: "A rich sunset sky over a forest." },
                { src: "categ/h4.jpg", category: "heritage", description: "A serene lakeside scene with morning mist." },
                { src: "categ/h5.jpg", category: "heritage", description: "A beautiful cityscape during night with lit buildings." },
                { src: "categ/h6.jpg", category: "heritage", description: "A beautiful cityscape during night with lit buildings." },

            ];
        
            let currentIndex = 0;
        
            function openModal(index) {
                currentIndex = index;
                updateModalContent();
                document.getElementById('modal').style.display = 'flex';
                document.getElementById('arrow-left').style.display = 'block';
                document.getElementById('arrow-right').style.display = 'block';
            }
        
            function updateModalContent() {
                const modalImg = document.getElementById('modalImg');
                const modalTitle = document.getElementById('modalTitle');
                const modalDescription = document.getElementById('modalDescription');
        
                modalImg.src = images[currentIndex].src;
                modalTitle.innerText = Image_${currentIndex + 1};
                modalDescription.innerText = images[currentIndex].description;
            }
        
            function navigateImage(direction) {
                currentIndex = (currentIndex + direction + images.length) % images.length;
                updateModalContent();
            }
        
            function downloadImage() {
                const link = document.createElement('a');
                link.href = images[currentIndex].src;
                link.download = Image_${currentIndex + 1}.jpg;
                link.click();
            }
        
            function shareImage() {
                alert("Share this image on your preferred platform!");
            }
        
            function likeImage() {
                const likeIcon = document.getElementById('like-icon');
                likeIcon.classList.toggle('liked');
                likeIcon.innerText = likeIcon.classList.contains('liked') ? 'favorite' : 'favorite_border';
            }
        
            function filterGallery(event, category) {
                const gallery = document.querySelector('.gallery');
                gallery.innerHTML = ''; // Clear existing gallery items
        
                const filteredImages = category === 'all' ? images : images.filter(img => img.category === category);
        
                filteredImages.forEach((img, index) => {
                    const col = document.createElement('div');
                    col.className = 'col';
                    col.dataset.category = img.category;
        
                    const imgElement = document.createElement('img');
                    imgElement.src = img.src;
                    imgElement.alt = img.description;
                    imgElement.onclick = () => openModal(index);
        
                    col.appendChild(imgElement);
                    gallery.appendChild(col);
                });
        
                document.querySelectorAll('.categories button').forEach(btn => btn.classList.remove('active'));
                event.target.classList.add('active');
            }
        
            document.getElementById('modal').addEventListener('click', function (event) {
                if (event.target.id === 'modal') {
                    this.style.display = 'none';
                    document.getElementById('arrow-left').style.display = 'none';
                    document.getElementById('arrow-right').style.display = 'none';
                }
            });
        
            function performSearch() {
                var query = document.getElementById('search-bar').value;
                alert('Searching for: ' + query);
            }
        
            function logoutUser() {
                alert('You have been logged out');
            }
        </script>
        
    
</body>
</html>
