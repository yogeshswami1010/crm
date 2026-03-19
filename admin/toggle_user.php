<?php
include('../config/db.php');

if ($_SESSION['user']['role'] != 'admin') {
    die("Access Denied");
}

$id = $_GET['id'];
$status = $_GET['status'];

$conn->query("UPDATE users SET status='$status' WHERE id='$id'");

header("Location: manage_users.php");