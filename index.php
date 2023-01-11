<?php
include 'includes/header.php';
require_once 'php_scripts/functions.php';
if(!isset($_SESSION['role'])){
    header('Location: login.php');
    exit();
}
?>

<div class="container mt-5">
    <h1>WELCOME <?php echo $_SESSION['username'] ;?></h1>
    <h2>Your role: <?php echo $_SESSION['role'];?></h2>
</div>

<?php include 'includes/footer.php'; ?>