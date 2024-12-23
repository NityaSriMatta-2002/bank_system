<?php
session_start();
include '../config/db.php';
$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
$emps = $pdo->query("SELECT emp_ssn, emp_name FROM Employee")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Employee</title></head><body>
<h2>Create Employee</h2>
<form method="post" action="create_employee.php">
  <label>SSN:</label><input type="text" name="emp_ssn" required><br>
  <label>Name:</label><input type="text" name="emp_name" required><br>
  <label>Tel:</label><input type="text" name="tel_number"><br>
  <label>Begin Date:</label><input type="date" name="begin_date"><br>
  <label>Super SSN:</label>
  <select name="super_ssn">
    <option value="">None</option>
    <?php foreach($emps as $e) { echo "<option value='{$e['emp_ssn']}'>{$e['emp_name']} ({$e['emp_ssn']})</option>"; } ?>
  </select><br>
  <label>Branch:</label>
  <select name="branch_id">
    <option value="">None</option>
    <?php foreach($branches as $b) { echo "<option value='{$b['branch_id']}'>{$b['branch_name']} ({$b['branch_id']})</option>"; } ?>
  </select><br>
  <input type="submit" value="Create">
</form>
</body></html>