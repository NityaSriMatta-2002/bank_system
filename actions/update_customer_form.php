<?php
session_start();
include '../config/db.php';
$ssn = $_GET['ssn'];
$stmt = $pdo->prepare("SELECT * FROM Customer WHERE ssn=?");
$stmt->execute([$ssn]);
$cust = $stmt->fetch();

$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll(PDO::FETCH_ASSOC);
$emps = $pdo->query("SELECT emp_ssn, emp_name FROM Employee")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html><head><title>Update Customer</title></head><body>
<h2>Update Customer</h2>
<form method="post" action="update_customer.php">
  <input type="hidden" name="original_ssn" value="<?=htmlspecialchars($cust['ssn']);?>">
  <label>Name:</label><input type="text" name="customer_name" value="<?=htmlspecialchars($cust['customer_name']);?>" required><br>
  <label>Street Number:</label><input type="text" name="street_number" value="<?=htmlspecialchars($cust['street_number']);?>"><br>
  <label>Apt Number:</label><input type="text" name="apt_number" value="<?=htmlspecialchars($cust['apt_number']);?>"><br>
  <label>City:</label><input type="text" name="city" value="<?=htmlspecialchars($cust['city']);?>"><br>
  <label>State:</label><input type="text" name="state" value="<?=htmlspecialchars($cust['state']);?>"><br>
  <label>Zip Code:</label><input type="text" name="zip_code" value="<?=htmlspecialchars($cust['zip_code']);?>"><br>
  <label>Personal Banker:</label>
  <select name="personal_banker_ssn">
    <option value="">None</option>
    <?php foreach($emps as $e) {
      $selected = ($e['emp_ssn'] == $cust['personal_banker_ssn'])?"selected":"";
      echo "<option value='{$e['emp_ssn']}' $selected>{$e['emp_name']} ({$e['emp_ssn']})</option>";
    } ?>
  </select><br>
  <label>Branch:</label>
  <select name="branch_id">
    <option value="">None</option>
    <?php foreach($branches as $b) {
      $selected = ($b['branch_id'] == $cust['branch_id'])?"selected":"";
      echo "<option value='{$b['branch_id']}' $selected>{$b['branch_name']} ({$b['branch_id']})</option>";
    } ?>
  </select><br>
  <input type="submit" value="Update">
</form>
</body></html>