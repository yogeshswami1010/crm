<?php
session_start();

// If user already logged in → go to dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
} else {
    // Otherwise → go to login
    header("Location: auth/login.php");
}
exit;