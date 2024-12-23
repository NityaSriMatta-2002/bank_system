<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Branch WHERE branch_id=?");
$stmt->execute([$_GET['branch_id']]);
$_SESSION['success'] = "Branch deleted.";
header("Location: ../public/branches.php");