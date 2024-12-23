<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO Dependent (emp_ssn, dependent_name, relationship) VALUES (?,?,?)");
$stmt->execute([$_POST['emp_ssn'], $_POST['dependent_name'], $_POST['relationship']]);
$_SESSION['success']="Dependent created.";
header("Location: ../public/dependents.php");