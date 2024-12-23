<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO Assets (asset_id, branch_id, asset_details) VALUES (?,?,?)");
$stmt->execute([$_POST['asset_id'], $_POST['branch_id'], $_POST['asset_details']]);
$_SESSION['success']="Asset created.";
header("Location: ../public/assets.php");