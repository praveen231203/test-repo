<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Profile</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Artist Profile</title>
        
        <!-- Font Awesome for Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        
        <!-- Google Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
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
        }        .suggestions-dropdown {
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

        /* Main container */
        .profile-container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            gap: 20px;
            margin-top: 20px; /* Adjusted margin for profile section */
            flex-wrap: wrap; /* Allow items to wrap */
        }

        /* Artist profile container */
        .profile {
            flex: 1 1 300px; /* Flex-grow, flex-shrink, and flex-basis */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-pic img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 20px;
        }

        .profile-info {
            flex: 1;
        }

        .profile-info h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
        }

        .profile-info p {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
        }

        .like-container {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.2rem;
        }

        .like-container i {
            color: #f00;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .like-container i:hover {
            transform: scale(1.2);
        }

        /* Gallery container for artwork */
        .gallery {
            flex: 3 1 600px; /* Flex-grow, flex-shrink, and flex-basis */
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Adjusted to fit more images */
            gap: 15px;
            animation: fadeIn 1s ease-in-out;
        }

        .gallery img {
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .gallery img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Modal for zoomed image */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal img {
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
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


<!-- Profile and Gallery Section -->
<div class="profile-container">
    <!-- Artist Profile -->
    <div class="profile">
        <div class="profile-header">
            <div class="profile-pic">
                <img src="images\artists\photographers\art_1.jpeg" alt="Artist Profile Pic" />
            </div>
            <div class="profile-info">
                <h2>Aronja</h2>
                <p>Artist Bio: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum quam vitae magna convallis, ac varius felis mollis.</p>
                <div class="like-container">
                    <i class="fas fa-heart"></i>
                    <span>120 Likes</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
<div class="gallery">
    <img src="images\artists\artist_painting\pain_1.jpeg" alt="Art 5" onclick="openModal(this.src)">
    <img src="images\artists\artist_painting\pain_2.jpeg" alt="Art 6" onclick="openModal(this.src)">
    <img src="images\artists\artist_painting\pain_3.jpeg" alt="Art 7" onclick="openModal(this.src)">
    <img src="images\artists\artist_painting\pain_4.jpeg" alt="Art 8" onclick="openModal(this.src)">
    <img src="images\artists\artist_painting\pain_1.jpeg" alt="Art 8" onclick="openModal(this.src)">
    <img src="images\3.jpeg" alt="Art 8" onclick="openModal(this.src)">
    <img src="images\7.webp" alt="Art 8" onclick="openModal(this.src)">
    <img src="images\5.webp" alt="Art 8" onclick="openModal(this.src)">
    <img src="images\13.webp" alt="Art 8" onclick="openModal(this.src)">
    <img src="images\9.webp" alt="Art 8" onclick="openModal(this.src)">
</div>

<!-- Modal for Viewing Image in Full Screen -->
<div class="modal" id="modal">
    <img src="" id="modalImg" alt="Zoomed Art">
</div>


<script>
  // Open modal with the clicked image
function openModal(src) {
    const modal = document.getElementById('modal');
    const modalImg = document.getElementById('modalImg');
    modal.style.display = 'flex';
    modalImg.src = src;
}

// Close the modal when clicked outside the image
document.getElementById('modal').addEventListener('click', function () {
    const modal = document.getElementById('modal');
    modal.style.display = 'none';
});

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
// Function to logout the user
function logoutUser() {
// Clear the stored user data from local storage
localStorage.removeItem('username');
localStorage.removeItem('email');
localStorage.removeItem('password');
alert('You have been logged out');
// Redirect to the login page or homepage
window.location.href = 'index.php';
}

// Function to handle the login flow
function loginUser(username, password) {
// Here we are assuming the username and password are valid. In real-world scenarios, you should validate them with your backend.
localStorage.setItem('username', username);
alert('Logged in successfully');
window.location.href = 'nature.php'; // Redirect to the nature page or desired page after login
}

// Function to display the username after login
function displayUsername() {
const username = localStorage.getItem('username');
if (username) {
    document.getElementById('welcome-message').textContent = `Welcome, ${username}!`;
    document.getElementById('welcome-message').style.display = 'block';
    document.getElementById('logout-btn').style.display = 'block'; // Show logout button if the user is logged in
} else {
    document.getElementById('welcome-message').style.display = 'none';
    document.getElementById('logout-btn').style.display = 'none'; // Hide logout button if not logged in
}
}

// Display the username on page load
document.addEventListener('DOMContentLoaded', displayUsername);

// Function to handle signup
function signupUser(username, email, password) {
// Save the signup details to local storage (or send to backend for real authentication)
localStorage.setItem('username', username);
localStorage.setItem('email', email);
localStorage.setItem('password', password);
alert('Signup successful');
window.location.href = 'profile.php'; // Redirect to nature page after signup
}

</script>

</body>
</html>
