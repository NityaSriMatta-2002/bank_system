<?php
session_start();
include '../config/db.php';

// Since asset_id and branch_id form the primary key, updating either might mean re-inserting or a more complex logic.
// For simplicity, let's just update the asset_details and branch_id. If changing asset_id is needed, you'd DELETE and RE-INSERT.
// This code updates details and branch, but if PK changes are needed, handle carefully.

$stmt = $pdo->prepare("UPDATE Assets SET asset_details=?, branch_id=? WHERE asset_id=? AND branch_id=?");
$stmt->execute([$_POST['asset_details'], $_POST['branch_id'], $_POST['original_asset_id'], $_POST['original_branch_id']]);
$_SESSION['success']="Asset updated.";
header("Location: ../public/assets.php");