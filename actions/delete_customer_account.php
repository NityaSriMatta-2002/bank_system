<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM CustomerAccount WHERE accnt_number=? AND ssn=?");
$stmt->execute([$_GET['accnt_number'], $_GET['ssn']]);
$_SESSION['success']="Customer removed from account.";
header("Location: ../public/customer_accounts.php");