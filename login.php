<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_id = $_POST["login_id"]; // Can be username or email
    $password = $_POST["password"];

    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $login_id, $login_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user"] = $user["username"];
        header("Location: profile.php"); // Redirect to the profile page
        exit();
    } else {
        $error_message = "Invalid username/email or password.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
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
            background-color: #f7f7f7;
            background-image: url('loginbg.avif');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            transition: background 0.5s;
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
            font-weight: bold;
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        .home-button a:hover {
            color: #d40000;
        }

        /* Login Container */
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
            width: 400px;
            animation: fadeIn 1s ease-in-out;
            text-align: center;
        }

        .container h2 {
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
            color: #aaa;
            transition: color 0.3s;
        }

        .form-group input:focus + i {
            color: #ff4d4d;
        }

        /* Login Button */
        .login-btn {
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

        .login-btn:hover {
            background-color: #d40000;
            transform: scale(1.05);
        }

        /* Signup Option */
        .signup-option {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #555;
        }

        .signup-option a {
            color: #ff4d4d;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        .signup-option a:hover {
            text-decoration: underline;
            color: #d40000;
        }

        /* Error Message */
        .error-message {
            color: red;
            margin-bottom: 20px;
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

<!-- Login Form -->
<div class="container">
    <h2>Login</h2>
    <?php if (isset($error_message)): ?>
        <div class="error-message"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <!-- Username/Email -->
        <div class="form-group">
            <label for="username">Username or Email</label>
            <input type="text" id="username" name="login_id" placeholder="Enter your username or email" required>
            <i class="fas fa-user"></i>
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
            <i class="fas fa-lock"></i>
        </div>

        <!-- Login Button -->
        <button type="submit" class="login-btn">Login</button>
    </form>

    <!-- Signup Option -->
    <div class="signup-option">
        Don't have an account? <a href="signup.php">Sign Up</a>
    </div>
</div>
</script>

</body>
</html>