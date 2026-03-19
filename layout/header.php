<?php include(__DIR__ . '/../config/db.php');

if (!isset($_SESSION['user'])) {
    header("Location: /crm/auth/login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>CRM</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f5f6fa; }

.sidebar {
    height:100vh;
    background:#2c3e50;
    color:#fff;
    padding:20px;
    position:fixed;
    width:220px;
}

.sidebar a {
    display:block;
    color:#fff;
    padding:10px;
    text-decoration:none;
    border-radius:5px;
    margin-bottom:10px;
}

.sidebar a:hover, .active {
    background:#3498db;
}

.content {
    margin-left:240px;
    padding:20px;
}
</style>

</head>
<body>