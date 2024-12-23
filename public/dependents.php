<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$stmt = $pdo->query("SELECT d.emp_ssn, d.dependent_name, d.relationship, e.emp_name FROM Dependent d JOIN Employee e ON d.emp_ssn = e.emp_ssn");
$dependents = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Dependents</h2>
<a href="../actions/create_dependent_form.php">Add New Dependent</a>
<table border="1">
  <tr>
    <th>Employee</th><th>Dependent Name</th><th>Relationship</th><th>Actions</th>
  </tr>
  <?php foreach ($dependents as $dep): ?>
  <tr>
    <td><?=htmlspecialchars($dep['emp_name']);?> (<?=htmlspecialchars($dep['emp_ssn']);?>)</td>
    <td><?=htmlspecialchars($dep['dependent_name']);?></td>
    <td><?=htmlspecialchars($dep['relationship']);?></td>
    <td>
      <a href="../actions/update_dependent_form.php?emp_ssn=<?=$dep['emp_ssn'];?>&dependent_name=<?=urlencode($dep['dependent_name']);?>">Edit</a> |
      <a href="../actions/delete_dependent.php?emp_ssn=<?=$dep['emp_ssn'];?>&dependent_name=<?=urlencode($dep['dependent_name']);?>" onclick="return confirm('Delete this dependent?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>