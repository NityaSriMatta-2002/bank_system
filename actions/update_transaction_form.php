<?php
session_start();
include '../config/db.php';
$id = $_GET['transaction_id'];
$stmt = $pdo->prepare("SELECT * FROM TransactionInstance WHERE transaction_id=?");
$stmt->execute([$id]);
$tran = $stmt->fetch();

$types = $pdo->query("SELECT transaction_code, transaction_name FROM TransactionType")->fetchAll();
$accounts = $pdo->query("SELECT accnt_number FROM Account")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Update Transaction</title></head><body>
<h2>Update Transaction</h2>
<form method="post" action="update_transaction.php">
  <input type="hidden" name="original_id" value="<?=htmlspecialchars($tran['transaction_id']);?>">
  <label>Type:</label>
  <select name="transaction_code">
    <?php foreach($types as $t){
      $selected = ($t['transaction_code']==$tran['transaction_code'])?"selected":"";
      echo "<option value='{$t['transaction_code']}' $selected>{$t['transaction_name']} ({$t['transaction_code']})</option>";
    } ?>
  </select><br>
  <label>Account:</label>
  <select name="accnt_number">
    <?php foreach($accounts as $a) {
      $selected = ($a['accnt_number']==$tran['accnt_number'])?"selected":"";
      echo "<option value='{$a['accnt_number']}' $selected>{$a['accnt_number']}</option>";
    } ?>
  </select><br>
  <label>Amount:</label><input type="number" step="0.01" name="amount" value="<?=htmlspecialchars($tran['amount']);?>"><br>
  <input type="submit" value="Update">
</form>
</body></html>