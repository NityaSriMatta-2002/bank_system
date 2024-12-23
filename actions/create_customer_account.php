<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO CustomerAccount (accnt_number, ssn) VALUES (?,?)");
$stmt->execute([$_POST['accnt_number'], $_POST['ssn']]);
$_SESSION['success']="Customer linked to account.";
header("Location: ../public/customer_accounts.php");