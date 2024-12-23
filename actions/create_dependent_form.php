<?php
session_start();
include '../config/db.php';
$emps = $pdo->query("SELECT emp_ssn, emp_name FROM Employee")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Dependent</title></head><body>
<h2>Create Dependent</h2>
<form method="post" action="create_dependent.php">
  <label>Employee:</label>
  <select name="emp_ssn" required>
    <?php foreach($emps as $e) { echo "<option value='{$e['emp_ssn']}'>{$e['emp_name']} ({$e['emp_ssn']})</option>"; } ?>
  </select><br>
  <label>Dependent Name:</label><input type="text" name="dependent_name" required><br>
  <label>Relationship:</label><input type="text" name="relationship"><br>
  <input type="submit" value="Create">
</form>
</body></html>