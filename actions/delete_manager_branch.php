<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM ManagerBranch WHERE branch_id=? AND manager_ssn=?");
$stmt->execute([$_GET['branch_id'], $_GET['manager_ssn']]);
$_SESSION['success']="Manager removed from branch.";
header("Location: ../public/manager_branches.php");