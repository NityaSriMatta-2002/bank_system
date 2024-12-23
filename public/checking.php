<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT c.accnt_number, c.overdraft_fee, a.acc_balance 
        FROM Checking c
        JOIN Account a ON c.accnt_number = a.accnt_number";
$stmt = $pdo->query($sql);
$checking = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Checking Accounts</h2>
<a href="../actions/create_checking_form.php">Add Checking Account</a>
<table border="1">
  <tr>
    <th>Account #</th><th>Overdraft Fee</th><th>Balance</th><th>Actions</th>
  </tr>
  <?php foreach ($checking as $chk): ?>
  <tr>
    <td><?=htmlspecialchars($chk['accnt_number']);?></td>
    <td><?=htmlspecialchars($chk['overdraft_fee']);?></td>
    <td><?=htmlspecialchars($chk['acc_balance']);?></td>
    <td>
      <a href="../actions/delete_checking.php?accnt_number=<?=$chk['accnt_number'];?>" onclick="return confirm('Delete this checking account?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>