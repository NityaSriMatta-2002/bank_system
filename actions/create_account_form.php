<?php
session_start();
include '../config/db.php';
$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Account</title></head><body>
<h2>Create Account</h2>
<form method="post" action="create_account.php">
  <label>Account Number:</label><input type="text" name="accnt_number" required><br>
  <label>Balance:</label><input type="number" step="0.01" name="acc_balance"><br>
  <label>Branch:</label>
  <select name="branch_id">
    <option value="">None</option>
    <?php foreach($branches as $b) echo "<option value='{$b['branch_id']}'>{$b['branch_name']}</option>"; ?>
  </select><br>
  <input type="submit" value="Create">
</form>
</body></html>