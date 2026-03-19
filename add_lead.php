<?php include('layout/header.php'); ?>
<?php include('layout/sidebar.php'); ?>

<div class="content">

<h3>Add Lead</h3>

<?php
if ($_POST) {

    $name = $_POST['name'];
    $business = $_POST['business'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $note = $_POST['note'];

    $user_id = $_SESSION['user']['id'];

    $query = "INSERT INTO leads 
    (user_id,name,business_name,address,phone,email) 
    VALUES ('$user_id','$name','$business','$address','$phone','$email')";

    if ($conn->query($query)) {

        $lead_id = $conn->insert_id;

        $conn->query("INSERT INTO notes (lead_id,user_id,note) 
        VALUES ('$lead_id','$user_id','$note')");

        echo "<div class='alert alert-success'>Lead Added Successfully</div>";

    } else {
        echo "<div class='alert alert-danger'>".$conn->error."</div>";
    }
}
?>

<form method="POST" class="card p-4">

<input class="form-control mb-3" name="name" placeholder="Full Name" required>
<input class="form-control mb-3" name="business" placeholder="Business Name" required>
<input class="form-control mb-3" name="address" placeholder="Address">
<input class="form-control mb-3" name="phone" placeholder="Phone" required>
<input class="form-control mb-3" name="email" placeholder="Email">

<textarea class="form-control mb-3" name="note" placeholder="Initial Note"></textarea>

<button class="btn btn-primary">Save</button>

</form>

</div>

<?php include('layout/footer.php'); ?>