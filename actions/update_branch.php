<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("UPDATE Branch SET branch_name=?, city=?, street=?, assets=? WHERE branch_id=?");
$stmt->execute([$_POST['branch_name'], $_POST['city'], $_POST['street'], $_POST['assets'], $_POST['original_branch_id']]);
$_SESSION['success'] = "Branch updated.";
header("Location: ../public/branches.php");