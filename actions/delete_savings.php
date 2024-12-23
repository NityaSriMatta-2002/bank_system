<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Savings WHERE accnt_number=?");
$stmt->execute([$_GET['accnt_number']]);
$_SESSION['success']="Savings account deleted.";
header("Location: ../public/savings.php");