<?php
session_start();
include '../config/db.php';
$br = empty($_POST['branch_id'])?NULL:$_POST['branch_id'];
$stmt = $pdo->prepare("UPDATE Loan SET fix_interest_rate=?, loan_amt=?, monthly_repay_amt=?, branch_id=? WHERE loan_number=?");
$stmt->execute([$_POST['fix_interest_rate'], $_POST['loan_amt'], $_POST['monthly_repay_amt'], $br, $_POST['original_loan_number']]);
$_SESSION['success']="Loan updated.";
header("Location: ../public/loans.php");