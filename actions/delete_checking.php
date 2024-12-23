<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Checking WHERE accnt_number=?");
$stmt->execute([$_GET['accnt_number']]);
$_SESSION['success']="Checking account deleted.";
header("Location: ../public/checking.php");