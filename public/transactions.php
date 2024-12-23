<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT t.*, tt.transaction_name, a.acc_balance
        FROM TransactionInstance t
        JOIN TransactionType tt ON t.transaction_code = tt.transaction_code
        JOIN Account a ON t.accnt_number = a.accnt_number";
$stmt = $pdo->query($sql);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Transactions</h2>
<a href="../actions/create_transaction_form.php">Add Transaction</a>
<table border="1">
  <tr>
    <th>ID</th><th>Type</th><th>Account #</th><th>Amount</th><th>Date</th><th>Actions</th>
  </tr>
  <?php foreach ($transactions as $tran): ?>
  <tr>
    <td><?=htmlspecialchars($tran['transaction_id']);?></td>
    <td><?=htmlspecialchars($tran['transaction_name']);?></td>
    <td><?=htmlspecialchars($tran['accnt_number']);?></td>
    <td><?=htmlspecialchars($tran['amount']);?></td>
    <td><?=htmlspecialchars($tran['transaction_date']);?></td>
    <td>
      <a href="../actions/delete_transaction.php?transaction_id=<?=$tran['transaction_id'];?>" onclick="return confirm('Delete this transaction?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>