<?php
session_start();
include '../config/db.php';
$accounts = $pdo->query("SELECT accnt_number FROM Account")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Savings Account</title></head><body>
<h2>Create Savings Account</h2>
<form method="post" action="create_savings.php">
  <label>Account:</label>
  <select name="accnt_number">
    <?php foreach($accounts as $a) echo "<option value='{$a['accnt_number']}'>{$a['accnt_number']}</option>"; ?>
  </select><br>
  <label>Fix Interest Rate:</label><input type="number" step="0.01" name="fix_interest_rate"><br>
  <input type="submit" value="Create">
</form>
</body></html>