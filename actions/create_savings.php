<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO Savings (accnt_number, fix_interest_rate) VALUES (?,?)");
$stmt->execute([$_POST['accnt_number'], $_POST['fix_interest_rate']]);
$_SESSION['success']="Savings account created.";
header("Location: ../public/savings.php");