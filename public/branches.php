<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$stmt = $pdo->query("SELECT * FROM Branch");
$branches = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Branches</h2>
<a href="../actions/create_branch_form.php">Add New Branch</a>
<table border="1">
  <tr>
    <th>Branch ID</th><th>Name</th><th>City</th><th>Street</th><th>Assets</th><th>Actions</th>
  </tr>
  <?php foreach ($branches as $b): ?>
  <tr>
    <td><?=htmlspecialchars($b['branch_id']);?></td>
    <td><?=htmlspecialchars($b['branch_name']);?></td>
    <td><?=htmlspecialchars($b['city']);?></td>
    <td><?=htmlspecialchars($b['street']);?></td>
    <td><?=htmlspecialchars($b['assets']);?></td>
    <td>
      <a href="../actions/update_branch_form.php?branch_id=<?=$b['branch_id'];?>">Edit</a> |
      <a href="../actions/delete_branch.php?branch_id=<?=$b['branch_id'];?>" onclick="return confirm('Are you sure?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>