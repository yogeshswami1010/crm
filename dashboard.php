<?php include('layout/header.php'); ?>
<?php include('layout/sidebar.php'); ?>

<div class="content">

<?php
$status = isset($_GET['status']) ? $_GET['status'] : 'lead';
?>

<h3 class="mb-4 text-capitalize"><?php echo $status; ?> List</h3>

<table class="table table-bordered bg-white">
<thead>
<tr>
<th>Name</th>
<th>Business</th>
<th>Phone</th>
<th>Email</th>
<th>Action</th>
<th>Latest Note</th>
</tr>
</thead>

<tbody>

<?php
$res = $conn->query("
SELECT leads.*, notes.note, notes.created_at 
FROM leads 
LEFT JOIN notes ON notes.id = (
    SELECT id FROM notes 
    WHERE lead_id = leads.id 
    ORDER BY id DESC LIMIT 1
)
WHERE leads.status='$status'
");
while($row = $res->fetch_assoc()){
?>

<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['business_name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['email']; ?></td>
<td>

<a href="lead_details.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">View</a>

<?php if($status == 'lead'){ ?>
<a href="move_stage.php?id=<?php echo $row['id']; ?>&to=prospect" class="btn btn-warning btn-sm">→ Prospect</a>
<?php } ?>

<?php if($status == 'prospect'){ ?>
<a href="move_stage.php?id=<?php echo $row['id']; ?>&to=client" class="btn btn-success btn-sm">→ Client</a>
<?php } ?>

</td>
<td>
<?php 
echo $row['note'] ? $row['note'] : 'No Notes'; 
?>
<br>
<small><?php echo $row['created_at']; ?></small>
</td>
</tr>

<?php } ?>

</tbody>
</table>

</div>

<?php include('layout/footer.php'); ?>