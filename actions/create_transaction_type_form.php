<?php session_start(); ?>
<!DOCTYPE html>
<html><head><title>Create Transaction Type</title></head><body>
<h2>Create Transaction Type</h2>
<form method="post" action="create_transaction_type.php">
  <label>Code:</label><input type="text" name="transaction_code" required><br>
  <label>Name:</label><input type="text" name="transaction_name"><br>
  <input type="submit" value="Create">
</form>
</body></html>