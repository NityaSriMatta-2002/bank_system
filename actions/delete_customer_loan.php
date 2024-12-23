<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM CustomerLoan WHERE loan_number=? AND ssn=?");
$stmt->execute([$_GET['loan_number'], $_GET['ssn']]);
$_SESSION['success']="Customer removed from loan.";
header("Location: ../public/customer_loans.php");