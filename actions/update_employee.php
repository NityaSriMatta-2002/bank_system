<?php
session_start();
include '../config/db.php';
$super_ssn = empty($_POST['super_ssn']) ? NULL : $_POST['super_ssn'];
$branch_id = empty($_POST['branch_id']) ? NULL : $_POST['branch_id'];

$stmt = $pdo->prepare("UPDATE Employee SET emp_name=?, tel_number=?, begin_date=?, super_ssn=?, branch_id=? WHERE emp_ssn=?");
$stmt->execute([$_POST['emp_name'], $_POST['tel_number'], $_POST['begin_date'], $super_ssn, $branch_id, $_POST['original_ssn']]);

$_SESSION['success']="Employee updated.";
header("Location: ../public/employees.php");