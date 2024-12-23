<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT l.*, b.branch_name
        FROM Loan l
        LEFT JOIN Branch b ON l.branch_id = b.branch_id";
$stmt = $pdo->query($sql);
$loans = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Loans</h2>
<a href="../actions/create_loan_form.php">Add Loan</a>
<table border="1">
  <tr>
    <th>Loan #</th><th>Amount</th><th>Interest</th><th>Monthly Repay</th><th>Branch</th><th>Actions</th>
  </tr>
  <?php foreach ($loans as $loan): ?>
  <tr>
    <td><?=htmlspecialchars($loan['loan_number']);?></td>
    <td><?=htmlspecialchars($loan['loan_amt']);?></td>
    <td><?=htmlspecialchars($loan['fix_interest_rate']);?>%</td>
    <td><?=htmlspecialchars($loan['monthly_repay_amt']);?></td>
    <td><?=htmlspecialchars($loan['branch_name']);?></td>
    <td>
      <a href="../actions/update_loan_form.php?loan_number=<?=$loan['loan_number'];?>">Edit</a> |
      <a href="../actions/delete_loan.php?loan_number=<?=$loan['loan_number'];?>" onclick="return confirm('Delete this loan?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>