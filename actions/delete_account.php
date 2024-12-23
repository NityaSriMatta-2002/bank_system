<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Account WHERE accnt_number=?");
$stmt->execute([$_GET['accnt_number']]);
$_SESSION['success']="Account deleted.";
header("Location: ../public/accounts.php");