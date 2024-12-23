<?php
session_start();
include '../config/db.php';
$acc = $_GET['accnt_number'];
$stmt = $pdo->prepare("SELECT * FROM Account WHERE accnt_number=?");
$stmt->execute([$acc]);
$a = $stmt->fetch();

$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html><head><title>Update Account</title></head><body>
<h2>Update Account</h2>
<form method="post" action="update_account.php">
  <input type="hidden" name="original_accnt_number" value="<?=htmlspecialchars($a['accnt_number']);?>">
  <label>Balance:</label><input type="number" step="0.01" name="acc_balance" value="<?=htmlspecialchars($a['acc_balance']);?>"><br>
  <label>Branch:</label>
  <select name="branch_id">
    <option value="">None</option>
    <?php foreach($branches as $b) {
      $selected = ($b['branch_id'] == $a['branch_id'])?"selected":"";
      echo "<option value='{$b['branch_id']}' $selected>{$b['branch_name']} ({$b['branch_id']})</option>";
    } ?>
  </select><br>
  <input type="submit" value="Update">
</form>
</body></html>