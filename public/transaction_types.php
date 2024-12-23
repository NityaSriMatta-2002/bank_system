<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$stmt = $pdo->query("SELECT * FROM TransactionType");
$types = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Transaction Types</h2>
<a href="../actions/create_transaction_type_form.php">Add Transaction Type</a>
<table border="1">
  <tr>
    <th>Code</th><th>Name</th><th>Actions</th>
  </tr>
  <?php foreach ($types as $t): ?>
  <tr>
    <td><?=htmlspecialchars($t['transaction_code']);?></td>
    <td><?=htmlspecialchars($t['transaction_name']);?></td>
    <td>
      <a href="../actions/update_transaction_type_form.php?transaction_code=<?=$t['transaction_code'];?>">Edit</a> |
      <a href="../actions/delete_transaction_type.php?transaction_code=<?=$t['transaction_code'];?>" onclick="return confirm('Delete this transaction type?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>