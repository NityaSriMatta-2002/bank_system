<?php
session_start();
include '../config/db.php';
$ssn = $_GET['emp_ssn'];
$stmt = $pdo->prepare("SELECT * FROM Employee WHERE emp_ssn=?");
$stmt->execute([$ssn]);
$emp = $stmt->fetch();

$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
$emps = $pdo->query("SELECT emp_ssn, emp_name FROM Employee")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Update Employee</title></head><body>
<h2>Update Employee</h2>
<form method="post" action="update_employee.php">
  <input type="hidden" name="original_ssn" value="<?=htmlspecialchars($emp['emp_ssn']);?>">
  <label>Name:</label><input type="text" name="emp_name" value="<?=htmlspecialchars($emp['emp_name']);?>" required><br>
  <label>Tel:</label><input type="text" name="tel_number" value="<?=htmlspecialchars($emp['tel_number']);?>"><br>
  <label>Begin Date:</label><input type="date" name="begin_date" value="<?=htmlspecialchars($emp['begin_date']);?>"><br>
  <label>Super SSN:</label>
  <select name="super_ssn">
    <option value="">None</option>
    <?php foreach($emps as $e) {
      $selected = ($e['emp_ssn']==$emp['super_ssn'])?"selected":"";
      echo "<option value='{$e['emp_ssn']}' $selected>{$e['emp_name']} ({$e['emp_ssn']})</option>"; 
    } ?>
  </select><br>
  <label>Branch:</label>
  <select name="branch_id">
    <option value="">None</option>
    <?php foreach($branches as $b) {
      $selected = ($b['branch_id']==$emp['branch_id'])?"selected":"";
      echo "<option value='{$b['branch_id']}' $selected>{$b['branch_name']} ({$b['branch_id']})</option>"; 
    } ?>
  </select><br>
  <input type="submit" value="Update">
</form>
</body></html>