<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM MoneyMarket WHERE accnt_number=?");
$stmt->execute([$_GET['accnt_number']]);
$_SESSION['success']="Money Market account deleted.";
header("Location: ../public/money_market.php");