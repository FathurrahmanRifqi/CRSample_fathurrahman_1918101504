<?php

include 'functions.php';
// BAD LOGIC MITIGATION
session_start();
if (!isset($_SESSION['user'])) {
    header("location: login.php");
} else {
    $pdo = pdo_connect();
    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare('DELETE FROM contacts WHERE id = ?');
        // SQL INJECTION MITIGATION
        $stmt->execute([$_GET['id']]);
        header("location:index.php");
    } else {
        die ('No ID specified!');
    }
}
?>