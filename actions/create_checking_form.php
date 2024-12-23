<?php
session_start();
include '../config/db.php';
$accounts = $pdo->query("SELECT accnt_number FROM Account")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Checking Account</title></head><body>
<h2>Create Checking Account</h2>
<form method="post" action="create_checking.php">
  <label>Account:</label>
  <select name="accnt_number">
    <?php foreach($accounts as $a) echo "<option value='{$a['accnt_number']}'>{$a['accnt_number']}</option>"; ?>
  </select><br>
  <label>Overdraft Fee:</label><input type="number" step="0.01" name="overdraft_fee"><br>
  <input type="submit" value="Create">
</form>
</body></html>