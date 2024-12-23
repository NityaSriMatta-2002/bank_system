<?php
session_start();
include '../config/db.php';
$customers = $pdo->query("SELECT ssn, customer_name FROM Customer")->fetchAll();
$loans = $pdo->query("SELECT loan_number FROM Loan")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Link Customer to Loan</title></head><body>
<h2>Link Customer to Loan</h2>
<form method="post" action="create_customer_loan.php">
  <label>Loan:</label>
  <select name="loan_number">
    <?php foreach($loans as $l) echo "<option value='{$l['loan_number']}'>{$l['loan_number']}</option>"; ?>
  </select><br>
  <label>Customer:</label>
  <select name="ssn">
    <?php foreach($customers as $c) echo "<option value='{$c['ssn']}'>{$c['customer_name']} ({$c['ssn']})</option>"; ?>
  </select><br>
  <input type="submit" value="Link">
</form>
</body></html>