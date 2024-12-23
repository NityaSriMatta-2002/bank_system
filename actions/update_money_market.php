<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("UPDATE MoneyMarket SET var_interest_rate=? WHERE accnt_number=?");
$stmt->execute([$_POST['var_interest_rate'], $_POST['original_accnt_number']]);
$_SESSION['success']="Money Market account updated.";
header("Location: ../public/money_market.php");