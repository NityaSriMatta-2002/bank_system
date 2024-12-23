<?php
session_start();
include '../config/db.php';
$bid = $_GET['branch_id'];
$stmt = $pdo->prepare("SELECT * FROM Branch WHERE branch_id=?");
$stmt->execute([$bid]);
$b = $stmt->fetch();
?>
<!DOCTYPE html>
<html><head><title>Update Branch</title></head><body>
<h2>Update Branch</h2>
<form method="post" action="update_branch.php">
  <input type="hidden" name="original_branch_id" value="<?=htmlspecialchars($b['branch_id']);?>">
  <label>Name:</label><input type="text" name="branch_name" value="<?=htmlspecialchars($b['branch_name']);?>" required><br>
  <label>City:</label><input type="text" name="city" value="<?=htmlspecialchars($b['city']);?>"><br>
  <label>Street:</label><input type="text" name="street" value="<?=htmlspecialchars($b['street']);?>"><br>
  <label>Assets:</label><input type="number" step="0.01" name="assets" value="<?=htmlspecialchars($b['assets']);?>"><br>
  <input type="submit" value="Update">
</form>
</body></html>