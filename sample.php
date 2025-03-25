<?php
session_start();

// Redirect to login if session is not set
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION["user"]; // Get the username from the session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>

<h2 id="welcome-message">Welcome, <?php echo htmlspecialchars($username); ?>!</h2>

<button onclick="logout()">Logout</button>

<script>
    function logout() {
        window.location.href = "logout.php"; // Redirect to logout.php
    }
</script>

</body>
</html>
