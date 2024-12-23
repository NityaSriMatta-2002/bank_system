<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO CustomerLoan (loan_number, ssn) VALUES (?,?)");
$stmt->execute([$_POST['loan_number'], $_POST['ssn']]);
$_SESSION['success']="Customer linked to loan.";
header("Location: ../public/customer_loans.php");