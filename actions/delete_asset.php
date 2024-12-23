<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM Assets WHERE asset_id=? AND branch_id=?");
$stmt->execute([$_GET['asset_id'], $_GET['branch_id']]);
$_SESSION['success']="Asset deleted.";
header("Location: ../public/assets.php");