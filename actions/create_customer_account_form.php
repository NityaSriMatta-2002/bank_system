<?php
session_start();
include '../config/db.php';
$customers = $pdo->query("SELECT ssn, customer_name FROM Customer")->fetchAll();
$accounts = $pdo->query("SELECT accnt_number FROM Account")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Link Customer to Account</title></head><body>
<h2>Link Customer to Account</h2>
<form method="post" action="create_customer_account.php">
  <label>Account:</label>
  <select name="accnt_number">
    <?php foreach($accounts as $a) echo "<option value='{$a['accnt_number']}'>{$a['accnt_number']}</option>"; ?>
  </select><br>
  <label>Customer:</label>
  <select name="ssn">
    <?php foreach($customers as $c) echo "<option value='{$c['ssn']}'>{$c['customer_name']} ({$c['ssn']})</option>"; ?>
  </select><br>
  <input type="submit" value="Link">
</form>
</body></html>