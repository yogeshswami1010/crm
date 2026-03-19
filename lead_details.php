<?php include('layout/header.php'); ?>
<?php include('layout/sidebar.php'); ?>

<div class="content">

<h3>Lead Notes</h3>

<?php
$id = $_GET['id'];

// ADD NOTE
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $note = $_POST['note'];
    $user_id = $_SESSION['user']['id'];

    $conn->query("INSERT INTO notes (lead_id,user_id,note)
    VALUES ('$id','$user_id','$note')");

    // 🔥 IMPORTANT: Redirect to refresh data
    header("Location: lead_details.php?id=".$id);
    exit;
}
?>

<!-- SHOW NOTES -->
<?php
$res = $conn->query("SELECT * FROM notes WHERE lead_id='$id' ORDER BY id DESC");

while($n = $res->fetch_assoc()){
?>
    <div class="card mb-2 p-2">
        <?php echo $n['note']; ?><br>
        <small><?php echo $n['created_at']; ?></small>
    </div>
<?php } ?>

<!-- ADD NOTE FORM -->
<form method="POST" class="mt-3">
    <textarea class="form-control mb-2" name="note" required></textarea>
    <button class="btn btn-success">Add Note</button>
</form>

</div>

<?php include('layout/footer.php'); ?>