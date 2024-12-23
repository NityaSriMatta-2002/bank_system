<?php
session_start();
include '../config/db.php';
$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
$emps = $pdo->query("SELECT emp_ssn, emp_name FROM Employee")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Assistant Manager</title></head><body>
<h2>Create Assistant Manager</h2>
<form method="post" action="create_assistant_manager.php">
  <label>Branch:</label>
  <select name="branch_id">
    <?php foreach($branches as $b) { echo "<option value='{$b['branch_id']}'>{$b['branch_name']} ({$b['branch_id']})</option>"; } ?>
  </select><br>
  <label>Assistant Manager:</label>
  <select name="assistant_manager_ssn">
    <?php foreach($emps as $e) { echo "<option value='{$e['emp_ssn']}'>{$e['emp_name']} ({$e['emp_ssn']})</option>";}?>
  </select><br>
  <input type="submit" value="Create">
</form>
</body></html>