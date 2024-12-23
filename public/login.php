<?php
session_start();
include '../includes/header.php'; // Basic HTML head
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Placeholder login logic
    $username = $_POST['username'];
    $password = $_POST['password'];
    // In a real scenario, validate against a Users table
    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['user_id'] = 1;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<form method="POST">
  <label>Username:</label><input type="text" name="username"><br>
  <label>Password:</label><input type="password" name="password"><br>
  <input type="submit" value="Login">
</form>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
<?php include '../includes/footer.php'; ?>