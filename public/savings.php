<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT s.accnt_number, s.fix_interest_rate, a.acc_balance 
        FROM Savings s
        JOIN Account a ON s.accnt_number = a.accnt_number";
$stmt = $pdo->query($sql);
$savings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Savings Accounts</h2>
<a href="../actions/create_savings_form.php">Add Savings Account</a>
<table border="1">
  <tr>
    <th>Account #</th><th>Interest Rate</th><th>Balance</th><th>Actions</th>
  </tr>
  <?php foreach ($savings as $sav): ?>
  <tr>
    <td><?=htmlspecialchars($sav['accnt_number']);?></td>
    <td><?=htmlspecialchars($sav['fix_interest_rate']);?>%</td>
    <td><?=htmlspecialchars($sav['acc_balance']);?></td>
    <td>
      <a href="../actions/delete_savings.php?accnt_number=<?=$sav['accnt_number'];?>" onclick="return confirm('Delete this savings account?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>