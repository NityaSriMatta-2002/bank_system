<?php
session_start();
include '../config/db.php';
$acc = $_GET['accnt_number'];
$stmt = $pdo->prepare("SELECT * FROM MoneyMarket WHERE accnt_number=?");
$stmt->execute([$acc]);
$m = $stmt->fetch();
?>
<!DOCTYPE html>
<html><head><title>Update Money Market</title></head><body>
<h2>Update Money Market Account</h2>
<form method="post" action="update_money_market.php">
  <input type="hidden" name="original_accnt_number" value="<?=htmlspecialchars($m['accnt_number']);?>">
  <label>Var Interest Rate:</label><input type="number" step="0.01" name="var_interest_rate" value="<?=htmlspecialchars($m['var_interest_rate']);?>"><br>
  <input type="submit" value="Update">
</form>
</body></html>