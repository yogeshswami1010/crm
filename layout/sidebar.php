<?php
$current = isset($_GET['status']) ? $_GET['status'] : 'lead';
?>

<div class="sidebar">
    <h4>CRM</h4>

    <a href="/crm/dashboard.php?status=lead" class="<?php if($current=='lead') echo 'active'; ?>">Leads</a>

    <a href="/crm/dashboard.php?status=prospect" class="<?php if($current=='prospect') echo 'active'; ?>">Prospects</a>

    <a href="/crm/dashboard.php?status=client" class="<?php if($current=='client') echo 'active'; ?>">Clients</a>
    <?php if($_SESSION['user']['role']=='admin'){ ?>
    <a href="/crm/admin/manage_users.php">👨‍💼 Manage Users</a>
<?php } ?>

    <hr>

    <a href="/crm/add_lead.php">➕ Add Lead</a>
    <a href="/crm/auth/logout.php">🚪 Logout</a>
</div>