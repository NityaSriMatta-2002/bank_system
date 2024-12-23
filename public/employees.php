<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$stmt = $pdo->query("SELECT e.emp_ssn, e.emp_name, e.tel_number, e.begin_date, b.branch_name FROM Employee e LEFT JOIN Branch b ON e.branch_id = b.branch_id");
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Employees</h2>
<a href="../actions/create_employee_form.php">Add New Employee</a>
<table border="1">
  <tr>
    <th>SSN</th><th>Name</th><th>Tel</th><th>Begin Date</th><th>Branch</th><th>Actions</th>
  </tr>
  <?php foreach ($employees as $emp): ?>
  <tr>
    <td><?=htmlspecialchars($emp['emp_ssn']);?></td>
    <td><?=htmlspecialchars($emp['emp_name']);?></td>
    <td><?=htmlspecialchars($emp['tel_number']);?></td>
    <td><?=htmlspecialchars($emp['begin_date']);?></td>
    <td><?=htmlspecialchars($emp['branch_name']);?></td>
    <td>
      <a href="../actions/update_employee_form.php?emp_ssn=<?=$emp['emp_ssn'];?>">Edit</a> |
      <a href="../actions/delete_employee.php?emp_ssn=<?=$emp['emp_ssn'];?>" onclick="return confirm('Delete this employee?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>