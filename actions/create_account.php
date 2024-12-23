<?php
session_start();
include '../config/db.php';

$accnt_number = $_POST['accnt_number'];
$acc_balance = $_POST['acc_balance'];
$branch_id = !empty($_POST['branch_id']) ? $_POST['branch_id'] : NULL;

$stmt = $pdo->prepare("INSERT INTO Account (accnt_number, acc_balance, branch_id) VALUES (?,?,?)");
$stmt->execute([$accnt_number, $acc_balance, $branch_id]);

$_SESSION['success'] = "Account created successfully.";
header("Location: ../public/accounts.php");