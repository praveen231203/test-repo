<?php
include 'db.php';

$error_message = ""; // Initialize an error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match!";
    } else {
        // Check if username or email already exists
        $check_user = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $check_user->bind_param("ss", $username, $email);
        $check_user->execute();
        $result = $check_user->get_result();

        if ($result->num_rows > 0) {
            $error_message = "Username or Email already exists. Try another one.";
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Prepare the insert statement
            $stmt = $conn->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
            if ($stmt) { // Check if the statement was prepared successfully
                $stmt->bind_param("ssss", $username, $email, $phone, $hashed_password);

                if ($stmt->execute()) {
                    // Redirect to login page after successful signup
                    header("Location: login.php");
                    exit();
                } else {
                    $error_message = "Error: " . $conn->error;
                }
                $stmt->close(); // Close the statement
            } else {
                $error_message = "Error preparing statement: " . $conn->error;
            }
        }

        $check_user->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('signupbg.avif');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            transition: background 0.5s ease-in-out;
        }

        /* Home Button */
        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .home-button a {
            text-decoration: none;
            color: #ff4d4d;
            font-weight: 600;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .home-button a:hover {
            color: #d40000;
        }

        /* Container */
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            animation: fadeIn 1s ease-in-out;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
            font-size: 1.8rem;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 400;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: #ff4d4d;
            box-shadow: 0 0 5px rgba(255, 77, 77, 0.5);
        }

        .form-group i {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            color: #999;
            transition: color 0.3s ease;
        }

        .form-group input:focus + i {
            color: #ff4d4d;
        }

        /* Signup Button */
        .signup-btn {
            width: 100%;
            padding: 12px;
            background-color: #ff4d4d;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .signup-btn:hover {
            background-color: #d40000;
            transform: scale(1.05);
        }

        /* Login Option */
        .login-option {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #555;
        }

        .login-option a {
            color: #ff4d4d;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .login-option a:hover {
            text-decoration: underline;
            color: #d40000;
        }

        /* Fade In Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

<!-- Home Button -->
<div class="home-button">
    <a href="index.php"><i class="fas fa-home"></i> Home</a>
</div>

<!-- Signup Form -->
<div class="container">
    <h2>Sign Up</h2>
    <form method="POST" action="">
        <!-- Username -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
            <i class="fas fa-user"></i>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email ID</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <i class="fas fa-envelope"></i>
        </div>

        <!-- Phone Number -->
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            <i class="fas fa-phone"></i>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <i class="fas fa-lock"></i>
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
            <i class="fas fa-lock"></i>
        </div>

        <!-- Signup Button -->
        <button type="submit" class="signup-btn">Sign Up</button>
    </form>

    <!-- Login Option -->
    <div class="login-option">
        Already have an account? <a href="login.php">Login</a>
    </div>
</div>

<?php if ($error_message): ?>
    <script>
        alert("<?php echo $error_message; ?>");
    </script>
<?php endif; ?>

</body>
</html>