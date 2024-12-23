<?php
session_start();
include '../config/db.php';
$acc = $_GET['accnt_number'];
$stmt = $pdo->prepare("SELECT * FROM Checking WHERE accnt_number=?");
$stmt->execute([$acc]);
$c = $stmt->fetch();
?>
<!DOCTYPE html>
<html><head><title>Update Checking</title></head><body>
<h2>Update Checking Account</h2>
<form method="post" action="update_checking.php">
  <input type="hidden" name="original_accnt_number" value="<?=htmlspecialchars($c['accnt_number']);?>">
  <label>Overdraft Fee:</label><input type="number" step="0.01" name="overdraft_fee" value="<?=htmlspecialchars($c['overdraft_fee']);?>"><br>
  <input type="submit" value="Update">
</form>
</body></html>