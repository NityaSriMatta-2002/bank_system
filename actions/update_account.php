<?php
session_start();
include '../config/db.php';
$branch_id = empty($_POST['branch_id'])?NULL:$_POST['branch_id'];
$stmt = $pdo->prepare("UPDATE Account SET acc_balance=?, branch_id=? WHERE accnt_number=?");
$stmt->execute([$_POST['acc_balance'], $branch_id, $_POST['original_accnt_number']]);
$_SESSION['success']="Account updated.";
header("Location: ../public/accounts.php");