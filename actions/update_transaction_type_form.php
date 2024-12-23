<?php
session_start();
include '../config/db.php';
$code = $_GET['transaction_code'];
$stmt = $pdo->prepare("SELECT * FROM TransactionType WHERE transaction_code=?");
$stmt->execute([$code]);
$t = $stmt->fetch();
?>
<!DOCTYPE html>
<html><head><title>Update Transaction Type</title></head><body>
<h2>Update Transaction Type</h2>
<form method="post" action="update_transaction_type.php">
  <input type="hidden" name="original_code" value="<?=htmlspecialchars($t['transaction_code']);?>">
  <label>Name:</label><input type="text" name="transaction_name" value="<?=htmlspecialchars($t['transaction_name']);?>"><br>
  <input type="submit" value="Update">
</form>
</body></html>