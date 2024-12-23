<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("UPDATE Checking SET overdraft_fee=? WHERE accnt_number=?");
$stmt->execute([$_POST['overdraft_fee'], $_POST['original_accnt_number']]);
$_SESSION['success']="Checking account updated.";
header("Location: ../public/checking.php");