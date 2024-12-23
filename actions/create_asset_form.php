<?php
session_start();
include '../config/db.php';
$branches = $pdo->query("SELECT branch_id, branch_name FROM Branch")->fetchAll();
?>
<!DOCTYPE html>
<html><head><title>Create Asset</title></head><body>
<h2>Create Asset</h2>
<form method="post" action="create_asset.php">
  <label>Asset ID:</label><input type="text" name="asset_id" required><br>
  <label>Branch:</label>
  <select name="branch_id">
    <?php foreach($branches as $b) echo "<option value='{$b['branch_id']}'>{$b['branch_name']} ({$b['branch_id']})</option>";?>
  </select><br>
  <label>Details:</label><input type="text" name="asset_details"><br>
  <input type="submit" value="Create">
</form>
</body></html>