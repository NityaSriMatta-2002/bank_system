<?php
session_start();
include '../config/db.php';
$br = empty($_POST['branch_id'])?NULL:$_POST['branch_id'];
$stmt = $pdo->prepare("INSERT INTO Loan (loan_number, fix_interest_rate, loan_amt, monthly_repay_amt, branch_id) VALUES (?,?,?,?,?)");
$stmt->execute([$_POST['loan_number'], $_POST['fix_interest_rate'], $_POST['loan_amt'], $_POST['monthly_repay_amt'], $br]);
$_SESSION['success']="Loan created.";
header("Location: ../public/loans.php");