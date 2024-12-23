<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Customer WHERE ssn=?");
$stmt->execute([$_GET['ssn']]);
$_SESSION['success']="Customer deleted.";
header("Location: ../public/customers.php");