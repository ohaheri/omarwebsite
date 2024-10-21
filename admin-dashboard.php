<?php
session_start();


if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

require 'config/database.php'; 


$query = $db->prepare("SELECT id, username, email, role, phone FROM users");
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['delete_user'])) {
    $userId = $_POST['user_id'];
    $deleteQuery = $db->prepare("DELETE FROM users WHERE id = :id");
    $deleteQuery->bindParam(':id', $userId);
    $deleteQuery->execute();
    header('Location: admin-dashboard.php'); 
}


if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];
    $phone = $_POST['phone'];

    $addUserQuery = $db->prepare("INSERT INTO users (username, email, password, role, phone) VALUES (:username, :email, :password, :role, :phone)");
    $addUserQuery->bindParam(':username', $username);
    $addUserQuery->bindParam(':email', $email);
    $addUserQuery->bindParam(':password', $password);
    $addUserQuery->bindParam(':role', $role);
    $addUserQuery->bindParam(':phone', $phone);
    $addUserQuery->execute();
    header('Location: admin-dashboard.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="admin-container">
        <h1>Welcome, Admin</h1>
        
        <!-- Table displaying all users -->
        <h2>Manage Users</h2>
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td>
                        <td><?php echo htmlspecialchars($user['phone']); ?></td>
                        <td>
                            <!-- Edit user button (you can link this to an edit page) -->
                            <a href="edit-user.php?id=<?php echo $user['id']; ?>" class="edit-btn">Edit</a>
                            
                            <!-- Delete user form -->
                            <form action="admin-dashboard.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                <button type="submit" name="delete_user" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Form to add a new user -->
        <h2>Add New User</h2>
        <form action="admin-dashboard.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <button type="submit" name="add_user">Add User</button>
        </form>

        <!-- Logout link -->
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
