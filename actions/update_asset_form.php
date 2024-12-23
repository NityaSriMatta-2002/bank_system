<?php
session_start();
include '../config/db.php';
$aid = $_GET['asset_id'];
$bid = $_GET['branch_id'];

$stmt = $pdo->prepare("SELECT * FROM Assets WHERE asset_id=? AND branch_id=?");
$stmt->execute([$aid, $bid]);
$asset = $stmt->fetch();

$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Update Asset</title></head><body>
<h2>Update Asset</h2>
<form method="post" action="update_asset.php">
  <input type="hidden" name="original_asset_id" value="<?=htmlspecialchars($asset['asset_id']);?>">
  <input type="hidden" name="original_branch_id" value="<?=htmlspecialchars($asset['branch_id']);?>">
  <label>Asset Details:</label><input type="text" name="asset_details" value="<?=htmlspecialchars($asset['asset_details']);?>"><br>
  <label>Branch:</label>
  <select name="branch_id">
    <?php foreach($branches as $b) {
      $selected = ($b['branch_id'] == $asset['branch_id'])?"selected":"";
      echo "<option value='{$b['branch_id']}' $selected>{$b['branch_name']} ({$b['branch_id']})</option>";
    } ?>
  </select><br>
  <input type="submit" value="Update">
</form>
</body></html>