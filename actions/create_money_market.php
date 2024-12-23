<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO MoneyMarket (accnt_number, var_interest_rate) VALUES (?,?)");
$stmt->execute([$_POST['accnt_number'], $_POST['var_interest_rate']]);
$_SESSION['success']="Money Market account created.";
header("Location: ../public/money_market.php");