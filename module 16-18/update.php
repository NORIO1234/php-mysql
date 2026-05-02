<?php

include_once('config.php');

// Get user ID from URL if provided
$user_id = $_GET['id'] ?? null;
$message = "";

// If form is submitted, update the user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "UPDATE users SET name=?, surname=?, username=?, email=?, password=? WHERE id=?";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$name, $surname, $username, $email, $password, $id]);
    
    $message = "User updated successfully!";
    $user_id = null; // Go back to list mode
}

// If a user ID is provided, get that user for editing
$userToEdit = null;
if ($user_id) {
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$user_id]);
    $userToEdit = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Get all users for the list
$sql = "SELECT * FROM users";
$stmt = $connect->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Users</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
        td, th {
            padding: 10px;
        }
        form {
            margin: 20px 0;
        }
        input {
            padding: 5px;
            margin: 5px;
        }
        .message {
            color: green;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<h1>Update Users</h1>

<?php if ($message): ?>
    <p class="message"><?= $message ?></p>
<?php endif; ?>

<?php if ($userToEdit): ?>
    <!-- Edit Form -->
    <h2>Edit User</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $userToEdit['id'] ?>">
        
        <label>Name: <input type="text" name="name" value="<?= $userToEdit['name'] ?>" required></label><br>
        <label>Surname: <input type="text" name="surname" value="<?= $userToEdit['surname'] ?>" required></label><br>
        <label>Username: <input type="text" name="username" value="<?= $userToEdit['username'] ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?= $userToEdit['email'] ?>" required></label><br>
        <label>Password: <input type="text" name="password" value="<?= $userToEdit['password'] ?>" required></label><br>
        
        <button type="submit">Update User</button>
        <a href="update.php">Cancel</a>
    </form>

<?php else: ?>
    <!-- User List -->
    <table>
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['surname'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['password'] ?></td>
            <td><a href="update.php?id=<?= $user['id'] ?>">Edit</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<p><a href="dashboard.php">Back to Dashboard</a></p>

</body>
</html>
