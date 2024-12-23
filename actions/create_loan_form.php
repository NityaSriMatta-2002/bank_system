<?php
session_start();
include '../config/db.php';
$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Loan</title></head><body>
<h2>Create Loan</h2>
<form method="post" action="create_loan.php">
  <label>Loan Number:</label><input type="text" name="loan_number" required><br>
  <label>Fix Interest Rate:</label><input type="number" step="0.01" name="fix_interest_rate" required><br>
  <label>Loan Amount:</label><input type="number" step="0.01" name="loan_amt" required><br>
  <label>Monthly Repay Amount:</label><input type="number" step="0.01" name="monthly_repay_amt" required><br>
  <label>Branch:</label>
  <select name="branch_id">
    <option value="">None</option>
    <?php foreach($branches as $b) {echo "<option value='{$b['branch_id']}'>{$b['branch_name']}</option>";}?>
  </select><br>
  <input type="submit" value="Create">
</form>
</body></html>