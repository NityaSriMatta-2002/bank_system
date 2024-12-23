<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM TransactionType WHERE transaction_code=?");
$stmt->execute([$_GET['transaction_code']]);
$_SESSION['success']="Transaction Type deleted.";
header("Location: ../public/transaction_types.php");