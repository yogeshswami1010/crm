<?php
include('config/db.php');

$id=$_GET['id'];
$to=$_GET['to'];

$conn->query("UPDATE leads SET status='$to' WHERE id='$id'");

header("Location: dashboard.php");