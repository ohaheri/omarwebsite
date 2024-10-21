<?php
require 'config/database.php'; // Include your database connection

$message = ""; // Variable to store the message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password']; // Capture the second password
    $role = $_POST['role'];
    $phone = $_POST['phone']; // Capture the phone number

    // Validate if passwords match
    if ($password !== $confirm_password) {
        $message = "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert user into the database
        $query = $db->prepare("INSERT INTO users (username, email, password, role, phone) VALUES (:username, :email, :password, :role, :phone)");
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $hashed_password); // Store the hashed password
        $query->bindParam(':role', $role);
        $query->bindParam(':phone', $phone); // Bind the phone number
        
        if ($query->execute()) {
            // If registration is successful, redirect to login page
            header('Location:login.php');
            exit; // Ensure the script stops executing after redirection
        } else {
            $message = "Error registering user.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <script>
        // Client-side password confirmation check
        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Register</h2>
            <?php if ($message): ?> <!-- Display the message if it exists -->
                <div class="message">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>
            <form action="register.php" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" required pattern="[0-9]{10,15}" title="Please enter a valid phone number (10 to 15 digits)">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role:</label>
                    <select id="role" name="role" required>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>
