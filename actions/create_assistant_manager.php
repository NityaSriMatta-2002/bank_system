<?php
session_start();
include '../config/db.php';
$stmt = $pdo->prepare("INSERT INTO AssistantManager (branch_id, assistant_manager_ssn) VALUES (?,?)");
$stmt->execute([$_POST['branch_id'], $_POST['assistant_manager_ssn']]);
$_SESSION['success']="Assistant Manager assigned.";
header("Location: ../public/assistant_managers.php");