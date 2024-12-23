<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT a.branch_id, a.assistant_manager_ssn, e.emp_name, b.branch_name
        FROM AssistantManager a
        JOIN Employee e ON a.assistant_manager_ssn = e.emp_ssn
        JOIN Branch b ON a.branch_id = b.branch_id";
$stmt = $pdo->query($sql);
$assistant_managers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Assistant Managers</h2>
<a href="../actions/create_assistant_manager_form.php">Add Assistant Manager</a>
<table border="1">
  <tr>
    <th>Branch</th><th>Assistant Manager</th><th>Actions</th>
  </tr>
  <?php foreach ($assistant_managers as $am): ?>
  <tr>
    <td><?=htmlspecialchars($am['branch_name']);?> (<?=htmlspecialchars($am['branch_id']);?>)</td>
    <td><?=htmlspecialchars($am['emp_name']);?> (<?=htmlspecialchars($am['assistant_manager_ssn']);?>)</td>
    <td>
      <a href="../actions/delete_assistant_manager.php?branch_id=<?=$am['branch_id'];?>&assistant_manager_ssn=<?=$am['assistant_manager_ssn'];?>" onclick="return confirm('Remove assistant manager?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>