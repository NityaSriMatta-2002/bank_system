<?php
session_start();
include '../config/db.php';
$ssn = $_GET['emp_ssn'];
$dname = $_GET['dependent_name'];
$stmt = $pdo->prepare("SELECT * FROM Dependent WHERE emp_ssn=? AND dependent_name=?");
$stmt->execute([$ssn, $dname]);
$dep = $stmt->fetch();
?>
<!DOCTYPE html>
<html><head><title>Update Dependent</title></head><body>
<h2>Update Dependent</h2>
<form method="post" action="update_dependent.php">
  <input type="hidden" name="original_emp_ssn" value="<?=htmlspecialchars($dep['emp_ssn']);?>">
  <input type="hidden" name="original_dependent_name" value="<?=htmlspecialchars($dep['dependent_name']);?>">
  <label>Relationship:</label><input type="text" name="relationship" value="<?=htmlspecialchars($dep['relationship']);?>"><br>
  <input type="submit" value="Update">
</form>
</body></html>