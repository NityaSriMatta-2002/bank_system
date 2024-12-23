<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("UPDATE TransactionInstance SET transaction_code=?, accnt_number=?, amount=? WHERE transaction_id=?");
$stmt->execute([$_POST['transaction_code'], $_POST['accnt_number'], $_POST['amount'], $_POST['original_id']]);
$_SESSION['success']="Transaction updated.";
header("Location: ../public/transactions.php");