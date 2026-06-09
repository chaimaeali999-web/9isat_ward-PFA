<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

require "../db.php";

$id = $_GET['id'] ?? 0;

if($id){

    $stmt = $pdo->prepare(
        "DELETE FROM fleurs WHERE id=?"
    );

    $stmt->execute([$id]);
}

header("Location: dashboard.php");
exit();