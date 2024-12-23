<?php
session_start();
include '../config/db.php';
$ln = $_GET['loan_number'];
$stmt = $pdo->prepare("SELECT * FROM Loan WHERE loan_number=?");
$stmt->execute([$ln]);
$l = $stmt->fetch();
$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Update Loan</title></head><body>
<h2>Update Loan</h2>
<form method="post" action="update_loan.php">
  <input type="hidden" name="original_loan_number" value="<?=htmlspecialchars($l['loan_number']);?>">
  <label>Fix Interest Rate:</label><input type="number" step="0.01" name="fix_interest_rate" value="<?=htmlspecialchars($l['fix_interest_rate']);?>"><br>
  <label>Loan Amount:</label><input type="number" step="0.01" name="loan_amt" value="<?=htmlspecialchars($l['loan_amt']);?>"><br>
  <label>Monthly Repay Amount:</label><input type="number" step="0.01" name="monthly_repay_amt" value="<?=htmlspecialchars($l['monthly_repay_amt']);?>"><br>
  <label>Branch:</label>
  <select name="branch_id">
    <option value="">None</option>
    <?php foreach($branches as $b) {
      $selected = ($b['branch_id'] == $l['branch_id'])?"selected":"";
      echo "<option value='{$b['branch_id']}' $selected>{$b['branch_name']}</option>";
    } ?>
  </select><br>
  <input type="submit" value="Update">
</form>
</body></html>