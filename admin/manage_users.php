<?php include('../layout/header.php'); ?>
<?php include('../layout/sidebar.php'); ?>

<div class="content">

<h3>Manage Salespersons</h3>

<?php
// Only admin allowed
if ($_SESSION['user']['role'] != 'admin') {
    die("Access Denied");
}

// CREATE USER
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO users (name,email,password,role,status) 
    VALUES ('$name','$email','$password','sales','active')");
}
?>

<!-- Create Salesperson -->
<form method="POST" class="card p-3 mb-4">
<h5>Create Salesperson</h5>

<input class="form-control mb-2" name="name" placeholder="Name" required>
<input class="form-control mb-2" name="email" placeholder="Email" required>
<input class="form-control mb-2" name="password" placeholder="Password" required>

<button class="btn btn-primary">Create</button>
</form>

<!-- List Users -->
<table class="table table-bordered bg-white">
<tr>
<th>Name</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
$res = $conn->query("SELECT * FROM users WHERE role='sales'");
while($u = $res->fetch_assoc()){
?>

<tr>
<td><?php echo $u['name']; ?></td>
<td><?php echo $u['email']; ?></td>
<td><?php echo $u['status']; ?></td>
<td>

<?php if($u['status']=='active'){ ?>
<a href="toggle_user.php?id=<?php echo $u['id']; ?>&status=inactive" class="btn btn-danger btn-sm">Disable</a>
<?php } else { ?>
<a href="toggle_user.php?id=<?php echo $u['id']; ?>&status=active" class="btn btn-success btn-sm">Enable</a>
<?php } ?>

</td>
</tr>

<?php } ?>

</table>

</div>

<?php include('../layout/footer.php'); ?>