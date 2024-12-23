<?php
session_start();
include '../config/db.php';
$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
$emps = $pdo->query("SELECT emp_ssn, emp_name FROM Employee")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Customer</title></head><body>
<h2>Create Customer</h2>
<form method="post" action="create_customer.php">
  <label>SSN:</label><input type="text" name="ssn" required><br>
  <label>Name:</label><input type="text" name="customer_name" required><br>
  <label>Street Number:</label><input type="text" name="street_number"><br>
  <label>Apt Number:</label><input type="text" name="apt_number"><br>
  <label>City:</label><input type="text" name="city"><br>
  <label>State:</label><input type="text" name="state"><br>
  <label>Zip:</label><input type="text" name="zip_code"><br>
  <label>Personal Banker:</label>
  <select name="personal_banker_ssn">
    <option value="">None</option>
    <?php foreach($emps as $e) echo "<option value='{$e['emp_ssn']}'>{$e['emp_name']} ({$e['emp_ssn']})</option>"; ?>
  </select><br>
  <label>Branch:</label>
  <select name="branch_id">
    <option value="">None</option>
    <?php foreach($branches as $b) echo "<option value='{$b['branch_id']}'>{$b['branch_name']}</option>"; ?>
  </select><br>
  <input type="submit" value="Create">
</form>
</body></html>