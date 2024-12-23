<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT m.accnt_number, m.var_interest_rate, a.acc_balance
        FROM MoneyMarket m
        JOIN Account a ON m.accnt_number = a.accnt_number";
$stmt = $pdo->query($sql);
$moneymarkets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Money Market Accounts</h2>
<a href="../actions/create_money_market_form.php">Add Money Market Account</a>
<table border="1">
  <tr>
    <th>Account #</th><th>Variable Interest Rate</th><th>Balance</th><th>Actions</th>
  </tr>
  <?php foreach ($moneymarkets as $mm): ?>
  <tr>
    <td><?=htmlspecialchars($mm['accnt_number']);?></td>
    <td><?=htmlspecialchars($mm['var_interest_rate']);?>%</td>
    <td><?=htmlspecialchars($mm['acc_balance']);?></td>
    <td>
      <a href="../actions/delete_money_market.php?accnt_number=<?=$mm['accnt_number'];?>" onclick="return confirm('Delete this money market account?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>