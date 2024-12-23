<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO Branch (branch_id, branch_name, city, street, assets) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$_POST['branch_id'], $_POST['branch_name'], $_POST['city'], $_POST['street'], $_POST['assets']]);
$_SESSION['success'] = "Branch created.";
header("Location: ../public/branches.php");