<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT ca.*, c.customer_name, a.acc_balance
        FROM CustomerAccount ca
        JOIN Customer c ON ca.ssn = c.ssn
        JOIN Account a ON ca.accnt_number = a.accnt_number";
$stmt = $pdo->query($sql);
$customer_accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Customer Accounts</h2>
<a href="../actions/create_customer_account_form.php">Link Customer to Account</a>
<table border="1">
  <tr>
    <th>Account #</th><th>Customer</th><th>Actions</th>
  </tr>
  <?php foreach ($customer_accounts as $ca): ?>
  <tr>
    <td><?=htmlspecialchars($ca['accnt_number']);?> (Balance: <?=htmlspecialchars($ca['acc_balance']);?>)</td>
    <td><?=htmlspecialchars($ca['customer_name']);?> (<?=htmlspecialchars($ca['ssn']);?>)</td>
    <td>
      <a href="../actions/delete_customer_account.php?accnt_number=<?=$ca['accnt_number'];?>&ssn=<?=$ca['ssn'];?>" onclick="return confirm('Remove customer from account?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>