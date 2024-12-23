<?php
session_start();
include '../config/db.php';
$pb = empty($_POST['personal_banker_ssn'])?NULL:$_POST['personal_banker_ssn'];
$br = empty($_POST['branch_id'])?NULL:$_POST['branch_id'];

$stmt = $pdo->prepare("UPDATE Customer SET customer_name=?, street_number=?, apt_number=?, city=?, state=?, zip_code=?, personal_banker_ssn=?, branch_id=? WHERE ssn=?");
$stmt->execute([$_POST['customer_name'], $_POST['street_number'], $_POST['apt_number'], $_POST['city'], $_POST['state'], $_POST['zip_code'], $pb, $br, $_POST['original_ssn']]);
$_SESSION['success']="Customer updated.";
header("Location: ../public/customers.php");