<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT m.branch_id, m.manager_ssn, e.emp_name, b.branch_name
        FROM ManagerBranch m
        JOIN Employee e ON m.manager_ssn = e.emp_ssn
        JOIN Branch b ON m.branch_id = b.branch_id";
$stmt = $pdo->query($sql);
$manager_branches = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Manager Branches</h2>
<a href="../actions/create_manager_branch_form.php">Assign Manager to Branch</a>
<table border="1">
  <tr>
    <th>Branch</th><th>Manager</th><th>Actions</th>
  </tr>
  <?php foreach ($manager_branches as $mb): ?>
  <tr>
    <td><?=htmlspecialchars($mb['branch_name']);?> (<?=htmlspecialchars($mb['branch_id']);?>)</td>
    <td><?=htmlspecialchars($mb['emp_name']);?> (<?=htmlspecialchars($mb['manager_ssn']);?>)</td>
    <td>
      <a href="../actions/delete_manager_branch.php?branch_id=<?=$mb['branch_id'];?>&manager_ssn=<?=$mb['manager_ssn'];?>" onclick="return confirm('Remove manager?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>