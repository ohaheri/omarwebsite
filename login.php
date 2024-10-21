<?php
session_start(); // Start the session
require 'config/database.php'; // Include your database connection

$message = ""; // Variable to store login error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    // Verify user and password
    if ($user && password_verify($password, $user['password'])) {
        // Store user info in the session
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Check the role and redirect accordingly
        if ($user['role'] == 'admin') {
            header('Location: admin-dashboard.php'); // Redirect to admin dashboard
            exit;
        } else {
            header('Location: Mercedes-Benz1.html'); // Redirect to user homepage
            exit;
        }
    } else {
        $message = "Invalid username or password.";
    }
}        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <?php if ($message): ?> <!-- Display the message if it exists -->
                <div class="message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
                
            </form>
            <a href="register.php"><button >Register</button></a>
        </div>
    </div>
</body>
</html>
