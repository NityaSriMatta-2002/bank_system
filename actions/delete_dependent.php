<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Dependent WHERE emp_ssn=? AND dependent_name=?");
$stmt->execute([$_GET['emp_ssn'], $_GET['dependent_name']]);
$_SESSION['success']="Dependent deleted.";
header("Location: ../public/dependents.php");