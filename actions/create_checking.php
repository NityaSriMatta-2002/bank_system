<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO Checking (accnt_number, overdraft_fee) VALUES (?,?)");
$stmt->execute([$_POST['accnt_number'], $_POST['overdraft_fee']]);
$_SESSION['success']="Checking account created.";
header("Location: ../public/checking.php");