<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT cl.*, c.customer_name, l.loan_amt
        FROM CustomerLoan cl
        JOIN Customer c ON cl.ssn = c.ssn
        JOIN Loan l ON cl.loan_number = l.loan_number";
$stmt = $pdo->query($sql);
$customer_loans = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Customer Loans</h2>
<a href="../actions/create_customer_loan_form.php">Link Customer to Loan</a>
<table border="1">
  <tr>
    <th>Loan #</th><th>Customer</th><th>Actions</th>
  </tr>
  <?php foreach ($customer_loans as $cl): ?>
  <tr>
    <td><?=htmlspecialchars($cl['loan_number']);?> (Amount: <?=htmlspecialchars($cl['loan_amt']);?>)</td>
    <td><?=htmlspecialchars($cl['customer_name']);?> (<?=htmlspecialchars($cl['ssn']);?>)</td>
    <td>
      <a href="../actions/delete_customer_loan.php?loan_number=<?=$cl['loan_number'];?>&ssn=<?=$cl['ssn'];?>" onclick="return confirm('Remove customer from loan?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>