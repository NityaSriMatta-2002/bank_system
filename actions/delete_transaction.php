<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM TransactionInstance WHERE transaction_id=?");
$stmt->execute([$_GET['transaction_id']]);
$_SESSION['success']="Transaction deleted.";
header("Location: ../public/transactions.php");