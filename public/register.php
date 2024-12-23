<?php
session_start();
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Placeholder registration logic
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Insert into Users table (not shown in schema)
    // ...
    echo "<p>Registration successful. <a href='login.php'>Login</a></p>";
}
?>
<form method="POST">
  <label>Username:</label><input type="text" name="username"><br>
  <label>Password:</label><input type="password" name="password"><br>
  <input type="submit" value="Register">
</form>
<?php include '../includes/footer.php'; ?>