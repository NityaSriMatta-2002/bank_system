<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT c.*, b.branch_name, e.emp_name as banker_name
        FROM Customer c
        LEFT JOIN Branch b ON c.branch_id = b.branch_id
        LEFT JOIN Employee e ON c.personal_banker_ssn = e.emp_ssn";
$stmt = $pdo->query($sql);
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Customers</h2>
<a href="../actions/create_customer_form.php">Add Customer</a>
<table border="1">
  <tr>
    <th>SSN</th><th>Name</th><th>Address</th><th>Personal Banker</th><th>Branch</th><th>Actions</th>
  </tr>
  <?php foreach ($customers as $cust): ?>
  <tr>
    <td><?=htmlspecialchars($cust['ssn']);?></td>
    <td><?=htmlspecialchars($cust['customer_name']);?></td>
    <td><?=htmlspecialchars($cust['street_number'].' '.$cust['apt_number'].' '.$cust['city'].' '.$cust['state'].' '.$cust['zip_code']);?></td>
    <td><?=htmlspecialchars($cust['banker_name']);?></td>
    <td><?=htmlspecialchars($cust['branch_name']);?></td>
    <td>
      <a href="../actions/update_customer_form.php?ssn=<?=$cust['ssn'];?>">Edit</a> |
      <a href="../actions/delete_customer.php?ssn=<?=$cust['ssn'];?>" onclick="return confirm('Delete this customer?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>