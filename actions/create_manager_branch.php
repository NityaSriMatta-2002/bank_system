<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO ManagerBranch (branch_id, manager_ssn) VALUES (?,?)");
$stmt->execute([$_POST['branch_id'], $_POST['manager_ssn']]);
$_SESSION['success']="Manager assigned to branch.";
header("Location: ../public/manager_branches.php");