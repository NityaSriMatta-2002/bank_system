<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("UPDATE TransactionType SET transaction_name=? WHERE transaction_code=?");
$stmt->execute([$_POST['transaction_name'], $_POST['original_code']]);
$_SESSION['success']="Transaction Type updated.";
header("Location: ../public/transaction_types.php");