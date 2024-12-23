<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT a.*, b.branch_name FROM Account a LEFT JOIN Branch b ON a.branch_id = b.branch_id";
$stmt = $pdo->query($sql);
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Accounts</h2>
<a href="../actions/create_account_form.php">Add Account</a>
<table border="1">
  <tr>
    <th>Account #</th><th>Balance</th><th>Last Access</th><th>Branch</th><th>Actions</th>
  </tr>
  <?php foreach ($accounts as $acc): ?>
  <tr>
    <td><?=htmlspecialchars($acc['accnt_number']);?></td>
    <td><?=htmlspecialchars($acc['acc_balance']);?></td>
    <td><?=htmlspecialchars($acc['last_access']);?></td>
    <td><?=htmlspecialchars($acc['branch_name']);?></td>
    <td>
      <a href="../actions/update_account_form.php?accnt_number=<?=$acc['accnt_number'];?>">Edit</a> |
      <a href="../actions/delete_account.php?accnt_number=<?=$acc['accnt_number'];?>" onclick="return confirm('Delete this account?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>