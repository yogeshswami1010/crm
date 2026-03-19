<?php include('../config/db.php');

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

  $res = $conn->query("SELECT * FROM users WHERE email='$email'");
$user = $res->fetch_assoc();

if ($user) {

    if ($user['status'] != 'active') {
        $error = "Your account is disabled. Contact admin.";
    }
    elseif (password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;

        // Redirect based on role
        if ($user['role'] == 'admin') {
            header("Location: ../dashboard.php");
        } else {
            header("Location: ../dashboard.php");
        }
    } else {
        $error = "Invalid Password";
    }

} else {
    $error = "User not found";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>CRM Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    height: 100vh;
    background: linear-gradient(135deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Segoe UI', sans-serif;
}

.login-card {
    width: 350px;
    padding: 30px;
    border-radius: 15px;
    backdrop-filter: blur(15px);
    background: rgba(255,255,255,0.1);
    box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    color: #fff;
}

.form-control {
    background: rgba(255,255,255,0.2);
    border: none;
    color: #fff;
}

.form-control::placeholder {
    color: #ddd;
}

.form-control:focus {
    background: rgba(255,255,255,0.3);
    color: #fff;
    box-shadow: none;
}

.btn-login {
    background: #fff;
    color: #333;
    font-weight: bold;
}

.btn-login:hover {
    background: #f1f1f1;
}
</style>

</head>

<body>

<div class="login-card">

    <h3 class="text-center mb-4">CRM Login</h3>

    <?php if(isset($error)) { ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php } ?>

    <form method="POST">

        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button class="btn btn-login w-100">Login</button>

    </form>

</div>

</body>
</html>