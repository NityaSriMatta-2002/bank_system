<?php
session_start();
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

include '../config/db.php';
include '../includes/header.php';
include '../includes/navbar.php';

$sql = "SELECT a.*, b.branch_name
        FROM Assets a
        JOIN Branch b ON a.branch_id = b.branch_id";
$stmt = $pdo->query($sql);
$assets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Assets</h2>
<a href="../actions/create_asset_form.php">Add Asset</a>
<table border="1">
  <tr>
    <th>Asset ID</th><th>Branch</th><th>Details</th><th>Actions</th>
  </tr>
  <?php foreach ($assets as $asset): ?>
  <tr>
    <td><?=htmlspecialchars($asset['asset_id']);?></td>
    <td><?=htmlspecialchars($asset['branch_name']);?> (<?=htmlspecialchars($asset['branch_id']);?>)</td>
    <td><?=htmlspecialchars($asset['asset_details']);?></td>
    <td>
      <a href="../actions/delete_asset.php?asset_id=<?=$asset['asset_id'];?>&branch_id=<?=$asset['branch_id'];?>" onclick="return confirm('Delete this asset?');">Delete</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<?php include '../includes/footer.php'; ?>