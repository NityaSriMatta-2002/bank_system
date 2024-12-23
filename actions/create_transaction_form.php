<?php
session_start();
include '../config/db.php';
$types = $pdo->query("SELECT transaction_code, transaction_name FROM TransactionType")->fetchAll();
$accounts = $pdo->query("SELECT accnt_number FROM Account")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Transaction</title></head><body>
<h2>Create Transaction</h2>
<form method="post" action="create_transaction.php">
  <label>Transaction ID:</label><input type="text" name="transaction_id" required><br>
  <label>Type:</label>
  <select name="transaction_code">
    <?php foreach($types as $t) echo "<option value='{$t['transaction_code']}'>{$t['transaction_name']} ({$t['transaction_code']})</option>"; ?>
  </select><br>
  <label>Account:</label>
  <select name="accnt_number">
    <?php foreach($accounts as $a) echo "<option value='{$a['accnt_number']}'>{$a['accnt_number']}</option>"; ?>
  </select><br>
  <label>Amount:</label><input type="number" step="0.01" name="amount"><br>
  <input type="submit" value="Create">
</form>
</body></html>