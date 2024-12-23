<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Employee WHERE emp_ssn=?");
$stmt->execute([$_GET['emp_ssn']]);
$_SESSION['success']="Employee deleted.";
header("Location: ../public/employees.php");