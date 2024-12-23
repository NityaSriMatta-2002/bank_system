<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Loan WHERE loan_number=?");
$stmt->execute([$_GET['loan_number']]);
$_SESSION['success']="Loan deleted.";
header("Location: ../public/loans.php");