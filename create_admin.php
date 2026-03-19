<?php
include('config/db.php');

$password = password_hash('123456', PASSWORD_DEFAULT);

$conn->query("INSERT INTO users (name,email,password,role) 
VALUES ('Admin','admin@gmail.com','$password','admin')");

echo "Admin Created!";
?>