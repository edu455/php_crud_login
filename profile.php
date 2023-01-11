<?php
include 'includes/header.php';
require_once 'php_scripts/functions.php';
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">YOUR PROFILE</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <th>USERNAME</th>
                        <td>
                            <?php echo $_SESSION['username']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>FIRSTNAME</th>
                        <td>
                            <?php echo $_SESSION['firstname']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>LASTNAME</th>
                        <td>
                            <?php echo $_SESSION['lastname']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>EMAIL</th>
                        <td>
                            <?php echo $_SESSION['email']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>ROLE</th>
                        <td>
                            <?php echo $_SESSION['role']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>IMAGE</th>
                        <td>
                            <img src="assets/images/<?php echo $_SESSION['image']; ?>" alt="image" width="100px" height="100px">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include 'includes/footer.php';
?>