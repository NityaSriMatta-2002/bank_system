<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("DELETE FROM AssistantManager WHERE branch_id=? AND assistant_manager_ssn=?");
$stmt->execute([$_GET['branch_id'], $_GET['assistant_manager_ssn']]);
$_SESSION['success']="Assistant Manager removed.";
header("Location: ../public/assistant_managers.php");