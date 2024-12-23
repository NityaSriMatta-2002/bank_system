<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("UPDATE Dependent SET relationship=? WHERE emp_ssn=? AND dependent_name=?");
$stmt->execute([$_POST['relationship'], $_POST['original_emp_ssn'], $_POST['original_dependent_name']]);
$_SESSION['success']="Dependent updated.";
header("Location: ../public/dependents.php");