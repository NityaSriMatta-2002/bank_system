<?php session_start(); ?>
<!DOCTYPE html>
<html><head><title>Create Branch</title></head><body>
<h2>Create Branch</h2>
<form method="post" action="create_branch.php">
  <label>Branch ID:</label><input type="text" name="branch_id" required><br>
  <label>Branch Name:</label><input type="text" name="branch_name" required><br>
  <label>City:</label><input type="text" name="city"><br>
  <label>Street:</label><input type="text" name="street"><br>
  <label>Assets:</label><input type="number" step="0.01" name="assets"><br>
  <input type="submit" value="Create">
</form>
</body></html>